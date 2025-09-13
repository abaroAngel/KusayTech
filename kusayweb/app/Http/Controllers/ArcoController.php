<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArcoController extends Controller
{
    public function store(Request $request)
    {
        // Validación
        $data = $request->validate([
            'tipo'    => 'required|in:acceso,rectificacion,cancelacion,oposicion',
            'detalle' => 'required|string|min:10|max:3000',
            'dni'     => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120', // 5MB
        ], [
            'tipo.required' => 'Selecciona el tipo de solicitud.',
            'detalle.required' => 'Describe tu solicitud.',
            'dni.required' => 'Adjunta tu DNI.',
            'dni.mimes' => 'Formato no permitido (PDF/JPG/PNG).',
            'dni.max' => 'El archivo no debe superar 5 MB.',
        ]);

        // Guardar archivo en storage/app/arco (si usas "public", crea el symlink)
        $path = $request->file('dni')->store('arco', 'local'); // o 'public'

        // Aquí podrías guardar en BD o disparar un correo
        // DB::table('arco_requests')->insert([...]);
        // Mail::to(config('mail.from.address'))->send(new ArcoSolicitudMail(...));

        // Respuesta
        return back()->with('status', 'Solicitud ARCO registrada correctamente. Código: '.basename($path));
    }
}
