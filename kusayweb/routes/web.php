<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/desarrollo-software', 'pages.software')->name('software');
Route::view('/marketing-digital', 'pages.marketing')->name('marketing');
Route::view('/equipos-software', 'pages.equipos')->name('equipos');

Route::view('/nosotros', 'pages.nosotros')->name('nosotros');
Route::view('/trabaja-con-nosotros', 'pages.trabaja')->name('trabaja');

Route::view('/catalogo', 'pages.catalogo')->name('catalogo');
Route::view('/ofertas', 'pages.ofertas')->name('ofertas');
Route::view('/soporte', 'pages.soporte')->name('soporte');

Route::view('/registro', 'auth.register')->name('registro');
Route::view('/erp', 'pages.erp')->name('erp');
