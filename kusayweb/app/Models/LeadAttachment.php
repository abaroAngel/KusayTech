<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeadAttachment extends Model
{
    use HasFactory;

    protected $fillable = ['lead_id','path','original_name','mime','size'];

    public function lead(){ return $this->belongsTo(Lead::class); }
}
