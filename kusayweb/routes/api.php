<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    ContactController, GuideController, ClaimsController, EthicsController,
    VoucherController, FaqController, PageController, OfficeController,ProductController, CategoryController, BrandController,
    CartController, OrderController, PaymentController,
    SubscriberController,
    UserController
};

Route::post('/contact', [ContactController::class, 'store']);

Route::post('/guide/download', [GuideController::class, 'requestDownload']);
Route::get('/guide/{token}', [GuideController::class, 'download']);

Route::get('/vouchers/search', [VoucherController::class, 'search']);

Route::post('/claims', [ClaimsController::class, 'store']);
Route::post('/ethics', [EthicsController::class, 'store']);

Route::get('/faqs', [FaqController::class, 'index']);
Route::get('/pages/{slug}', [PageController::class, 'show']);

Route::get('/offices', [OfficeController::class, 'index']);

/* Catálogo */
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{idOrSlug}', [ProductController::class, 'show']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{idOrSlug}', [CategoryController::class, 'show']);
Route::get('/brands', [BrandController::class, 'index']);
Route::get('/brands/{idOrSlug}', [BrandController::class, 'show']);

/* Carrito */
Route::get('/cart', [CartController::class, 'show']);
Route::post('/cart/items', [CartController::class, 'addItem']);
Route::patch('/cart/items/{id}', [CartController::class, 'updateItem']);
Route::delete('/cart/items/{id}', [CartController::class, 'removeItem']);
Route::delete('/cart', [CartController::class, 'clear']);

/* Ordenes y pagos */
Route::post('/orders/checkout', [OrderController::class, 'checkout']);
Route::get('/orders/{code}', [OrderController::class, 'show']);
Route::post('/orders/{code}/payments', [PaymentController::class, 'create']);
Route::post('/payments/webhook/{provider}', [PaymentController::class, 'webhook']);

/* Newsletter */
Route::post('/subscribe', [SubscriberController::class, 'subscribe']);
Route::get('/subscribe/confirm/{token}', [SubscriberController::class, 'confirm']);
Route::get('/subscribe/unsubscribe/{token}', [SubscriberController::class, 'unsubscribe']);

// Login
Route::middleware(['auth:sanctum','role:Admin'])
    ->prefix('admin')
    ->group(function () {
        Route::get('users',        [UserController::class,'index']);
        Route::post('users',       [UserController::class,'store']);
        Route::get('users/{user}', [UserController::class,'show']);
        Route::match(['put','patch'],'users/{user}', [UserController::class,'update']);
        Route::delete('users/{user}', [UserController::class,'destroy']);

        Route::post('users/{id}/restore', [UserController::class,'restore']);
        Route::delete('users/{id}/force', [UserController::class,'forceDelete']);
        Route::patch('users/{user}/toggle-active', [UserController::class,'toggleActive']);
    });
