<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\{Lead, Order, Product, GuideDownload, Claim};
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        // KPIs
        $stats = [
            'leadsToday'     => Lead::whereDate('created_at', today())->count(),
            'ordersPending'  => Order::where('status', 'pending')->count(),
            'products'       => Product::count(),
            'guideDownloads' => GuideDownload::count(),
            'claimsOpen'     => Claim::whereIn('status', ['recibido', 'en_revision'])->count(),
        ];

        // Leads recientes (esto ya estaba ok)
        $recentLeads = Lead::query()
            ->latest()
            ->limit(5)
            ->get(['full_name','company','interest','status','created_at']);

        // ====== PARCHE ROBUSTO PARA ORDERS ======
        // Detectar columna de cliente (email/nombre/teléfono) y de monto
        $customerCandidates = [
            'customer_email','email','contact_email','billing_email',
            'customer_name','name','customer_phone','phone'
        ];
        $amountCandidates = ['total','grand_total','amount','total_amount','subtotal'];

        $customerField = collect($customerCandidates)->first(fn($c) => Schema::hasColumn('orders', $c));
        $amountField   = collect($amountCandidates)->first(fn($c) => Schema::hasColumn('orders', $c));

        // Columnas base que sí deberían existir
        $select = ['id','status','created_at'];
        if ($customerField) $select[] = $customerField;
        if ($amountField)   $select[] = $amountField;

        $recentOrders = Order::query()
            ->select($select)
            ->latest('created_at')
            ->limit(5)
            ->get()
            ->map(function ($o) use ($customerField, $amountField) {
                // Atributos "seguros" para la vista
                $o->customer_label = $customerField ? ($o->{$customerField} ?? null) : null;
                $o->amount_value   = $amountField   ? (float) ($o->{$amountField} ?? 0) : 0.0;
                return $o;
            });

        return view('panel.index', compact('stats','recentLeads','recentOrders'));
    }
}
