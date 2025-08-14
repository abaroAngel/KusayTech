<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClaimAttachment extends Model
{
    use HasFactory;

    protected $fillable = ['claim_id','path','original_name','mime','size'];

    public function claim(){ return $this->belongsTo(Claim::class); }
}
