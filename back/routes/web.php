<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NameappController;

Route::get('/nameapp',[NameappController::class,'index']);
Route::get('/nameapp/login',[NameappController::class,'login'])->name('login');
Route::post('/nameapp/login',[NameappController::class,'loginPost']);
Route::get('/nameapp/registro',[NameappController::class,'registro']);
Route::post('/nameapp/registro',[NameappController::class,'registroPost']);
Route::get('/nameapp/juego',[NameappController::class,'juego'])->middleware('auth');

Route::post('/nameapp/solitario',[NameappController::class,'solitario'])->middleware('auth');
Route::get('/nameapp/pedido',[NameappController::class,'pedido'])->middleware('auth');
Route::post('/nameapp/sacar',[NameappController::class,'sacar'])->middleware('auth');
Route::post('/nameapp/restar',[NameappController::class,'restar'])->middleware('auth');
Route::post('/nameapp/terminar',[NameappController::class,'terminar'])->middleware('auth');
Route::post('/nameapp/solitario-guardar',[NameappController::class,'solitarioGuardar'])->middleware('auth');

Route::post('/nameapp/logout',[NameappController::class,'logout'])->middleware('auth');



