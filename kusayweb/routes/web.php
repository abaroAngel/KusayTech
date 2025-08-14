<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\{
    HomeController,
    CmsController,
    SolutionController,
    StoreController,
    FormController,
    OfficeWebController,
    AuthController,
    DashboardController
};
use Spatie\Permission\Middleware\RoleMiddleware;

/*
|--------------------------------------------------------------------------
| Público (sitio web)
|--------------------------------------------------------------------------
*/

/* Home */
Route::get('/', [HomeController::class, 'index'])->name('home');

/* CMS genérico (por slug) */
Route::get('/pages/{slug}', [CmsController::class, 'show'])->name('page.show');

/* Soluciones */
Route::prefix('soluciones')->group(function(){
  Route::get('/erp', [SolutionController::class, 'erp'])->name('solutions.erp');
  Route::get('/software-personalizado', [SolutionController::class, 'software'])->name('solutions.software');
  Route::get('/marketing-digital', [SolutionController::class, 'marketing'])->name('solutions.marketing');
});

/* Tienda (catálogo) */
Route::prefix('tienda')->group(function(){
  Route::get('/', [StoreController::class, 'index'])->name('store.index');
  Route::get('/producto/{idOrSlug}', [StoreController::class, 'show'])->name('store.show');
  Route::get('/carrito', [StoreController::class, 'cart'])->name('store.cart');
  Route::get('/checkout', [StoreController::class, 'checkout'])->name('store.checkout');
});

/* Formularios */
Route::get('/contacto', [FormController::class, 'contact'])->name('form.contact');
Route::get('/guia', [FormController::class, 'guide'])->name('form.guide');
Route::get('/busca-tu-comprobante', [FormController::class, 'voucher'])->name('form.voucher');
Route::get('/libro-de-reclamaciones', [FormController::class, 'claim'])->name('form.claim');
Route::get('/conducta-antietica', [FormController::class, 'ethics'])->name('form.ethics');

/* Oficinas */
Route::get('/oficinas', [OfficeWebController::class, 'index'])->name('offices.index');

/* Sobre nosotros (si no usas pages) */
Route::prefix('sobre-nosotros')->group(function(){
  Route::view('/mision-vision','about.mission')->name('about.mission');
  Route::view('/historia','about.history')->name('about.history');
  Route::view('/organigrama','about.organization')->name('about.organization');
  Route::view('/principios','about.principles')->name('about.principles');
  Route::view('/valores','about.values')->name('about.values');
});

/*
|--------------------------------------------------------------------------
| Autenticación (frontend simple)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    // Vista de login
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

    // Intento de login (con throttle anti fuerza bruta)
    Route::post('/login', [AuthController::class, 'login'])
        ->middleware('throttle:6,1')
        ->name('login.attempt');
});

// Logout (POST)
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Dashboard frontend (ligero, fuera de Filament)
|--------------------------------------------------------------------------
|
| Usamos el middleware de rol en línea (sin tocar Kernel):
| \Spatie\Permission\Middlewares\RoleMiddleware::class . ':Admin'
|
*/
Route::get('/panel', [DashboardController::class, 'index'])
    ->middleware([
        'auth',
        RoleMiddleware::class . ':Admin',
    ])
    ->name('panel');
