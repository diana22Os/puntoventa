<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
})->name('inicio');

Route::resource("productos", \App\Http\Controllers\ProductosController::class);

Route::resource("usuarios", \App\Http\Controllers\UserController::class)->parameters(["usuarios" => "user"]);

Route::get("/acerca-de", function () {
    return view("misc.acerca_de");
})->name("acerca_de.index");
Route::get("/soporte", function(){
    return redirect("https://");
})->name("soporte.index");

Auth::routes([
    "reset" => false,// no pueden olvidar contraseña
]);

Route::get('/home',[\App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Permitir logout con petición get
Route::get("/logout", function () {
    Auth::logout();
    return redirect()->route("home");
})->name("logout");


Route::middleware("auth")
    ->group(function () {
        Route::resource("clientes", \App\Http\Controllers\ClientesController::class);
        Route::resource("usuarios", \App\Http\Controllers\UserController::class)->parameters(["usuarios" => "user"]);

        Route::get("/ventas/ticket", [\App\Http\Controllers\VentasController::class, 'ticket'])->name("ventas.ticket");
        Route::resource("ventas", \App\Http\Controllers\VentasController::class);
        Route::get("/vender", [\App\Http\Controllers\VenderController::class, 'index'])->name("vender.index");
        Route::post("/productoDeVenta", [\App\Http\Controllers\VenderController::class, 'agregarProductoVenta'])->name("agregarProductoVenta");
        Route::delete("/productoDeVenta", [\App\Http\Controllers\VenderController::class, 'quitarProductoDeVenta'])->name("quitarProductoDeVenta");
        Route::post("/terminarOCancelarVenta", [\App\Http\Controllers\VenderController::class, 'terminarOCancelarVenta'])->name("terminarOCancelarVenta");
    });
