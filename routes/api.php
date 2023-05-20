<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductoController;
use App\Http\Controllers\API\FacturaController;
use App\Http\Controllers\API\UsuarioController;
use App\Http\Controllers\API\ClienteController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [UsuarioController::class, 'loginUser']);

Route::get('/productos', [ProductoController::class, 'index']);
Route::post('/productos', [ProductoController::class, 'store']);
Route::get('/productos/{id}', [ProductoController::class, 'show']);
Route::put('/productos/{id}', [ProductoController::class, 'update']);
Route::delete('/productos/{id}', [ProductoController::class, 'destroy']);
Route::post('/productos/descuento/{id}', [ProductoController::class, 'applyDiscount']);

Route::get('/clientes', [ClienteController::class, 'index']);
Route::post('/clientes', [ClienteController::class,'store']);
Route::put('/clientes/{cliente}', [ClienteController::class,'update']);
Route::delete('/clientes/{cliente}', [ClienteController::class,'destroy']);


Route::get('/facturas', [FacturaController::class, 'indexWithRelations']);
Route::post('/facturas', [FacturaController::class, 'store']);

