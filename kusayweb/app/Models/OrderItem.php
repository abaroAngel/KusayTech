<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id','product_id','name','sku','qty','unit_price','total',
    ];

    protected $casts = [
        'qty'        => 'integer',
        'unit_price' => 'decimal:2',
        'total'      => 'decimal:2',
    ];

    public function order(){ return $this->belongsTo(Order::class); }
    public function product(){ return $this->belongsTo(Product::class)->withDefault(); }
}
