<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OfficeHour extends Model
{
    use HasFactory;

    protected $fillable = ['office_id','day_of_week','start_time','end_time','label'];

    public function office(){ return $this->belongsTo(Office::class); }
}
