<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id','provider','provider_ref','amount','currency','status','payload','paid_at',
    ];

    protected $casts = [
        'amount'  => 'decimal:2',
        'payload' => 'array',
        'paid_at' => 'datetime',
    ];

    public function order(){ return $this->belongsTo(Order::class); }
}
