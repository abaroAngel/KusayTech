<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Claim extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code','type','consumer_json','product_json',
        'detail','request_text','status','notified_at','responded_at','response_json',
    ];

    protected $casts = [
        'consumer_json' => 'array',
        'product_json'  => 'array',
        'response_json' => 'array',
        'notified_at'   => 'datetime',
        'responded_at'  => 'datetime',
    ];

    public function attachments(){ return $this->hasMany(ClaimAttachment::class); }
}
