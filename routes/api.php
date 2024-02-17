<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CrebitoController;

Route::get('/clientes/{customer}/extrato', [CrebitoController::class,'extract']);
Route::post('/clientes/{customer}/transacoes', [CrebitoController::class,'createTransaction']);
