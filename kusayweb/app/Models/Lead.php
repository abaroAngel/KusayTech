<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'full_name','ruc','company','role','phone','email',
        'interest','message','status','source','meta',
        'consent','consent_at','assigned_to',
    ];

    protected $casts = [
        'meta'       => 'array',
        'consent'    => 'boolean',
        'consent_at' => 'datetime',
    ];

    // Relaciones
    public function assignedTo(){ return $this->belongsTo(User::class, 'assigned_to'); }
    public function attachments(){ return $this->hasMany(LeadAttachment::class); }

    // Scopes
    public function scopeFilter($q, array $f){
        $q->when($f['interest'] ?? null, fn($q,$v)=>$q->where('interest',$v))
          ->when($f['status'] ?? null, fn($q,$v)=>$q->where('status',$v))
          ->when($f['assigned_to'] ?? null, fn($q,$v)=>$q->where('assigned_to',$v))
          ->when($f['from'] ?? null, fn($q,$v)=>$q->whereDate('created_at','>=',$v))
          ->when($f['to'] ?? null, fn($q,$v)=>$q->whereDate('created_at','<=',$v))
          ->when($f['q'] ?? null, function($q,$v){
              $q->where(function($qq) use ($v){
                  $qq->where('full_name','like',"%$v%")
                     ->orWhere('company','like',"%$v%")
                     ->orWhere('email','like',"%$v%");
              });
          });
    }
}
