<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'ruc_emisor','tipo','serie','numero',
        'ruc_cliente','razon_social','fecha_emision','total',
        'pdf_path','xml_path','hash','status','extra_json',
    ];

    protected $casts = [
        'fecha_emision' => 'date',
        'total'         => 'decimal:2',
        'extra_json'    => 'array',
    ];

    public function scopeFilter($q, array $f){
        $q->when($f['ruc_emisor'] ?? null, fn($q,$v)=>$q->where('ruc_emisor',$v))
          ->when(($f['serie'] ?? null) && ($f['numero'] ?? null),
                 fn($q)=>$q->where('serie',$f['serie'])->where('numero',$f['numero']))
          ->when($f['ruc_cliente'] ?? null, fn($q,$v)=>$q->where('ruc_cliente',$v))
          ->when($f['fecha'] ?? null, fn($q,$v)=>$q->whereDate('fecha_emision',$v))
          ->when($f['total'] ?? null, fn($q,$v)=>$q->where('total',$v));
    }
}
