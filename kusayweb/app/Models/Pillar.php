<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pillar extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title','description','icon','order','active'];

    protected $casts = [
        'active' => 'boolean',
        'order'  => 'integer',
    ];
}
