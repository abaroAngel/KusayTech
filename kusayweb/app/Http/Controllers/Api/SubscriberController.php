<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use Illuminate\Support\Str;

class SubscriberController extends Controller
{
    // POST /api/subscribe {email, name?}
    public function subscribe(Request $request)
    {
        $data = $request->validate([
            'email' => ['required','email:rfc,dns','max:150'],
            'name'  => ['nullable','string','max:120'],
        ]);

        $sub = Subscriber::firstOrCreate(
            ['email' => $data['email']],
            ['name' => $data['name'] ?? null, 'status' => 'pending', 'token' => (string) Str::uuid(), 'source' => 'web']
        );

        // Si ya estaba, refresca token si estaba unsubscribed
        if ($sub->status === 'unsubscribed') {
            $sub->update(['status' => 'pending', 'token' => (string) Str::uuid()]);
        }

        $link = url("/api/subscribe/confirm/{$sub->token}");

        return response()->json([
            'message' => 'Suscripción registrada. Confirma desde tu correo (o usa el enlace).',
            'token'   => $sub->token,
            'link'    => $link,
        ], 201);
    }

    // GET /api/subscribe/confirm/{token}
    public function confirm(string $token)
    {
        $sub = Subscriber::where('token', $token)->firstOrFail();
        $sub->update(['status' => 'active']);
        return response()->json(['message' => 'Suscripción confirmada.', 'status' => $sub->status]);
    }

    // GET /api/subscribe/unsubscribe/{token}
    public function unsubscribe(string $token)
    {
        $sub = Subscriber::where('token', $token)->firstOrFail();
        $sub->update(['status' => 'unsubscribed']);
        return response()->json(['message' => 'Baja realizada.', 'status' => $sub->status]);
    }
}
