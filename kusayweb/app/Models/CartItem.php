<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = ['cart_id','product_id','qty','unit_price','total'];

    protected $casts = [
        'qty'        => 'integer',
        'unit_price' => 'decimal:2',
        'total'      => 'decimal:2',
    ];

    public function cart(){ return $this->belongsTo(Cart::class); }
    public function product(){ return $this->belongsTo(Product::class); }
}
