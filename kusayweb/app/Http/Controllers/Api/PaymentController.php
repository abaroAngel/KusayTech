<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Order, Payment};
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    // POST /api/orders/{code}/payments  {provider: Culqi|MercadoPago|Stripe}
    public function create(Request $request, string $code)
    {
        $data = $request->validate([
            'provider' => ['required','in:Culqi,MercadoPago,Stripe,Otro'],
        ]);

        $order = Order::where('code', $code)->firstOrFail();

        // Aquí iría la creación real con SDK del proveedor.
        // Por ahora generamos una referencia de prueba:
        $providerRef = strtoupper(substr($data['provider'],0,3)) . '-' . Str::upper(Str::random(10));

        $payment = Payment::create([
            'order_id'     => $order->id,
            'provider'     => $data['provider'],
            'provider_ref' => $providerRef,
            'amount'       => $order->total,
            'currency'     => $order->currency,
            'status'       => 'pending',
            'payload'      => ['note' => 'fake-intent'],
        ]);

        return response()->json([
            'message'      => 'Intento de pago creado.',
            'payment_id'   => $payment->id,
            'provider_ref' => $payment->provider_ref,
            'status'       => $payment->status,
        ], 201);
    }

    // POST /api/payments/webhook/{provider}
    public function webhook(Request $request, string $provider)
    {
        // Procesar webhook real según el proveedor, validar firma, etc.
        // Actualiza Payment y Order. Por ahora, solo 200 OK.
        return response()->json(['ok' => true, 'provider' => $provider]);
    }
}
