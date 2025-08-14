<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['slug','title','content_json','seo_json','published_at'];

    protected $casts = [
        'content_json' => 'array',
        'seo_json'     => 'array',
        'published_at' => 'datetime',
    ];

    public function scopePublished($q)
    {
        return $q->whereNotNull('published_at');
    }
}
