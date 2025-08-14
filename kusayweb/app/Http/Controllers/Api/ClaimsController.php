<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Claim;
use App\Models\ClaimAttachment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ClaimsController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            // tipo
            'type' => ['required', Rule::in(['reclamo','queja'])],

            // consumidor
            'consumer.name'       => ['required','string','max:150'],
            'consumer.document'   => ['nullable','string','max:20'],
            'consumer.email'      => ['required','email:rfc,dns','max:150'],
            'consumer.phone'      => ['nullable','string','max:20'],
            'consumer.address'    => ['nullable','string','max:200'],

            // producto/servicio
            'product.description' => ['required','string','max:500'],
            'product.amount'      => ['nullable','numeric','min:0'],
            'product.date'        => ['nullable','date'],

            // detalle y pedido
            'detail'              => ['required','string','max:3000'],
            'request_text'        => ['required','string','max:1000'],

            // adjuntos
            'attachments.*'       => ['file','mimes:pdf,jpg,jpeg,png','max:4096'],
        ]);

        $code = 'CLM-' . now()->format('Ymd') . '-' . Str::upper(Str::random(6));

        $claim = Claim::create([
            'code'         => $code,
            'type'         => $data['type'],
            'consumer_json'=> $request->input('consumer'),
            'product_json' => $request->input('product'),
            'detail'       => $data['detail'],
            'request_text' => $data['request_text'],
            'status'       => 'recibido',
        ]);

        // Guardar adjuntos (si vienen)
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $path = Storage::putFile("claims/{$code}", $file);
                ClaimAttachment::create([
                    'claim_id'      => $claim->id,
                    'path'          => $path,
                    'original_name' => $file->getClientOriginalName(),
                    'mime'          => $file->getClientMimeType(),
                    'size'          => $file->getSize(),
                ]);
            }
        }

        return response()->json([
            'message' => 'Reclamo/Queja registrado correctamente.',
            'code'    => $claim->code,
            'id'      => $claim->id,
        ], 201);
    }
}
