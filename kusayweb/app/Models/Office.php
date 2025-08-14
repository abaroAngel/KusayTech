<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Office extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','city','address','lat','lng','phones_json','emails_json','map_embed',
    ];

    protected $casts = [
        'lat'         => 'float',
        'lng'         => 'float',
        'phones_json' => 'array',
        'emails_json' => 'array',
    ];

    public function hours(){ return $this->hasMany(OfficeHour::class); }
}
