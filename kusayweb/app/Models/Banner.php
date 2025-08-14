<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title','subtitle','cta_text','cta_url','image_path','order','active'];

    protected $casts = [
        'active' => 'boolean',
        'order'  => 'integer',
    ];

    public function scopeActive($q){ return $q->where('active', true); }
}
