<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'brand_id','category_id','sku','name','slug','description',
        'price','compare_price','stock','weight','specs_json','is_active',
    ];

    protected $casts = [
        'price'         => 'decimal:2',
        'compare_price' => 'decimal:2',
        'weight'        => 'decimal:3',
        'stock'         => 'integer',
        'specs_json'    => 'array',
        'is_active'     => 'boolean',
    ];

    public function brand(){ return $this->belongsTo(Brand::class); }
    public function category(){ return $this->belongsTo(Category::class); }
    public function images(){ return $this->hasMany(ProductImage::class); }

    public function scopeFilter($q, array $f){
        $q->when($f['q'] ?? null, fn($q,$v)=>$q->whereFullText(['name','description','specs_json'],$v))
          ->when($f['category_id'] ?? null, fn($q,$v)=>$q->where('category_id',$v))
          ->when($f['brand_id'] ?? null, fn($q,$v)=>$q->where('brand_id',$v))
          ->when($f['min'] ?? null, fn($q,$v)=>$q->where('price','>=',$v))
          ->when($f['max'] ?? null, fn($q,$v)=>$q->where('price','<=',$v))
          ->when(isset($f['active']), fn($q)=>$q->where('is_active',$f['active']));
    }
}
