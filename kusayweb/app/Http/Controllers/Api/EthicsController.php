<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EthicsReport;
use App\Models\EthicsAttachment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class EthicsController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'is_anonymous'      => ['required','boolean'],
            'subject'           => ['required','string','max:200'],
            'detail'            => ['required','string','max:5000'],
            'visibility_scope'  => ['nullable', Rule::in(['compliance_only','restricted'])],

            // Datos del reportante si NO es anónimo
            'reporter.name'     => ['required_if:is_anonymous,false','string','max:150'],
            'reporter.email'    => ['required_if:is_anonymous,false','email:rfc,dns','max:150'],
            'reporter.phone'    => ['nullable','string','max:20'],

            'attachments.*'     => ['file','mimes:pdf,jpg,jpeg,png','max:4096'],
        ]);

        $code = 'ET-' . now()->format('Ymd') . '-' . Str::upper(Str::random(6));

        $report = EthicsReport::create([
            'code'            => $code,
            'is_anonymous'    => (bool) $data['is_anonymous'],
            'reporter_json'   => $request->boolean('is_anonymous') ? null : $request->input('reporter'),
            'subject'         => $data['subject'],
            'detail'          => $data['detail'],
            'status'          => 'nuevo',
            'visibility_scope'=> $data['visibility_scope'] ?? 'compliance_only',
        ]);

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $path = Storage::putFile("ethics/{$code}", $file);
                EthicsAttachment::create([
                    'ethics_report_id' => $report->id,
                    'path'             => $path,
                    'original_name'    => $file->getClientOriginalName(),
                    'mime'             => $file->getClientMimeType(),
                    'size'             => $file->getSize(),
                ]);
            }
        }

        return response()->json([
            'message' => 'Reporte registrado correctamente.',
            'code'    => $report->code,
            'id'      => $report->id,
        ], 201);
    }
}
