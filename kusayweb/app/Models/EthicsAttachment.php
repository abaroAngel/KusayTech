<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EthicsAttachment extends Model
{
    use HasFactory;

    protected $fillable = ['ethics_report_id','path','original_name','mime','size'];

    public function report(){ return $this->belongsTo(EthicsReport::class, 'ethics_report_id'); }
}
