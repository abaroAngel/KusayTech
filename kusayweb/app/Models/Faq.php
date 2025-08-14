<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['question','answer','order','active'];

    protected $casts = [
        'active' => 'boolean',
        'order'  => 'integer',
    ];

    public function scopeActive($q){ return $q->where('active', true); }
}
