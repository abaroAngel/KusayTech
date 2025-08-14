<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','code','status','customer_json','billing_json','shipping_json',
        'subtotal','discount_total','tax_total','total','currency','notes',
    ];

    protected $casts = [
        'customer_json'  => 'array',
        'billing_json'   => 'array',
        'shipping_json'  => 'array',
        'subtotal'       => 'decimal:2',
        'discount_total' => 'decimal:2',
        'tax_total'      => 'decimal:2',
        'total'          => 'decimal:2',
    ];

    public function user(){ return $this->belongsTo(User::class); }
    public function items(){ return $this->hasMany(OrderItem::class); }
    public function payments(){ return $this->hasMany(Payment::class); }
}
