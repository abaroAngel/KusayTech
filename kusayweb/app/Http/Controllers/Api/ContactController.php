<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => ['required','string','max:120'],
            'ruc'       => ['required','regex:/^[0-9]{11}$/'],
            'company'   => ['required','string','max:180'],
            'role'      => ['nullable','string','max:80'],
            'phone'     => ['nullable','string','max:20'],
            'email'     => ['required','email:rfc,dns','max:150'],
            'interest'  => ['required', Rule::in(['ERP','Software','Marketing','Tienda','Soporte'])],
            'message'   => ['required','string','max:2000'],
            'consent'   => ['accepted'],
        ]);

        $lead = Lead::create([
            'full_name'  => $data['full_name'],
            'ruc'        => $data['ruc'],
            'company'    => $data['company'],
            'role'       => $data['role'] ?? null,
            'phone'      => $data['phone'] ?? null,
            'email'      => $data['email'],
            'interest'   => $data['interest'],
            'message'    => $data['message'],
            'status'     => 'new',
            'source'     => 'web',
            'consent'    => true,
            'consent_at' => now(),
        ]);

        // Notificación simple por email (sin Mailable)
        try {
            $to = config('mail.from.address'); // cámbialo a correos de cada área si quieres
            $subject = 'Nuevo lead - ' . $lead->interest;
            Mail::raw("Nuevo lead:\n\n{$lead->full_name}\n{$lead->company}\n{$lead->email}\nInteresado en: {$lead->interest}\n\nMensaje:\n{$lead->message}", function ($m) use ($to, $subject) {
                if ($to) $m->to($to)->subject($subject);
            });
        } catch (\Throwable $e) {
            // loguea si falla el correo, pero no rompas la API
            report($e);
        }

        return response()->json([
            'message' => 'Consulta registrada correctamente.',
            'lead_id' => $lead->id,
        ], 201);
    }
}
