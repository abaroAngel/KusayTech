<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voucher;
use Illuminate\Support\Facades\Storage;

class VoucherController extends Controller
{
    public function search(Request $request)
    {
        $data = $request->validate([
            'ruc_emisor'  => ['nullable','regex:/^[0-9]{11}$/'],
            'ruc_cliente' => ['nullable','regex:/^[0-9]{11}$/'],
            'tipo'        => ['nullable','string','max:2'],
            'serie'       => ['nullable','string','max:6'],
            'numero'      => ['nullable','string','max:10'],
            'fecha'       => ['nullable','date'],
            'total'       => ['nullable','numeric'],
            'monto'       => ['nullable','numeric'], // alias de total (por conveniencia)
        ]);

        $filters = $request->only(['ruc_emisor','ruc_cliente','serie','numero','fecha']);
        $filters['total'] = $data['total'] ?? $data['monto'] ?? null;

        $q = Voucher::query()
            ->when($data['tipo'] ?? null, fn($q,$v)=>$q->where('tipo',$v))
            ->filter($filters)
            ->orderByDesc('fecha_emision');

        $vouchers = $q->limit(50)->get()->map(function ($v) {
            return [
                'id'            => $v->id,
                'ruc_emisor'    => $v->ruc_emisor,
                'tipo'          => $v->tipo,
                'serie'         => $v->serie,
                'numero'        => $v->numero,
                'ruc_cliente'   => $v->ruc_cliente,
                'razon_social'  => $v->razon_social,
                'fecha_emision' => optional($v->fecha_emision)->format('Y-m-d'),
                'total'         => (float) $v->total,
                'status'        => $v->status,
                'pdf_url'       => $this->tempUrl($v->pdf_path),
                'xml_url'       => $this->tempUrl($v->xml_path),
            ];
        });

        return response()->json([
            'count'    => $vouchers->count(),
            'results'  => $vouchers,
        ]);
    }

    protected function tempUrl(?string $path): ?string
    {
        if (!$path) return null;
        $disk = config('filesystems.default', 'public');
        if ($disk === 's3') {
            return Storage::disk('s3')->temporaryUrl($path, now()->addMinutes(5));
        }
        return Storage::disk($disk)->url($path);
    }
}
