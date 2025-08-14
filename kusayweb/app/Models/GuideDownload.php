<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GuideDownload extends Model
{
    use HasFactory;

    protected $fillable = [
        'ruc','company','email','token','downloaded_at',
        'consent','privacy_version','guide_version','ip','user_agent','utm',
    ];

    protected $casts = [
        'downloaded_at' => 'datetime',
        'consent'       => 'boolean',
        'utm'           => 'array',
    ];
}
