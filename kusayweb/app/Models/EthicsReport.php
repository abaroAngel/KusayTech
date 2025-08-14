<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class EthicsReport extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code','is_anonymous','reporter_json','subject','detail','status','visibility_scope',
    ];

    protected $casts = [
        'is_anonymous'  => 'boolean',
        'reporter_json' => 'array',
    ];

    public function attachments(){ return $this->hasMany(EthicsAttachment::class); }
}
