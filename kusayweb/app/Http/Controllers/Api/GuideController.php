<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GuideDownload;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class GuideController extends Controller
{
    // Solicitud de descarga (genera token y envía correo con link)
    public function requestDownload(Request $request)
    {
        $data = $request->validate([
            'ruc'     => ['required','regex:/^[0-9]{11}$/'],
            'company' => ['required','string','max:180'],
            'email'   => ['required','email:rfc,dns','max:150'],
            'consent' => ['accepted'],
        ]);

        $download = GuideDownload::create([
            'ruc'            => $data['ruc'],
            'company'        => $data['company'],
            'email'          => $data['email'],
            'token'          => (string) Str::uuid(),
            'consent'        => true,
            'privacy_version'=> 'v1',
            'guide_version'  => 'v1',
            'ip'             => $request->ip(),
            'user_agent'     => (string) $request->userAgent(),
            'utm'            => $request->only(['utm_source','utm_medium','utm_campaign']),
        ]);

        $link = url("/api/guide/{$download->token}");

        try {
            Mail::raw("Gracias por solicitar la guía. Descárgala aquí: {$link} (válido por tiempo limitado).", function ($m) use ($download) {
                $m->to($download->email)->subject('Tu guía gratuita');
            });
        } catch (\Throwable $e) {
            report($e);
        }

        return response()->json([
            'message' => 'Te enviamos un correo con el enlace de descarga.',
            'token'   => $download->token,
            'link'    => $link,
        ], 201);
    }

    // Devuelve URL temporal del archivo para descarga
    public function download(string $token)
    {
        $record = GuideDownload::where('token', $token)->firstOrFail();

        // Define la ruta del PDF en tu storage
        $file = 'guides/guia_digitaliza_tu_negocio.pdf';

        // Genera URL temporal (S3) o pública (local)
        $disk = config('filesystems.default', 'public');

        if ($disk === 's3') {
            $url = Storage::disk('s3')->temporaryUrl($file, now()->addMinutes(10));
        } else {
            // asegúrate de tener un symlink a storage o servir public/guides
            $url = Storage::disk($disk)->url($file);
        }

        if (is_null($record->downloaded_at)) {
            $record->update(['downloaded_at' => now()]);
        }

        return response()->json([
            'url' => $url,
            'expires_in_minutes' => ($disk === 's3') ? 10 : null,
        ]);
    }
}
