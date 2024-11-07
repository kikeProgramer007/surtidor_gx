<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(ClienteController::class)->group(function (){
        Route::get('/cliente','index')->name('cliente.index');
        Route::get('/cliente/create/','create')->name('cliente.create');
        Route::post('/cliente/store/','store')->name('cliente.store');
        Route::get('/cliente/edit/{cliente}','edit')->name('cliente.edit');
        Route::post('/cliente/update/{cliente}','update')->name('cliente.update');
        Route::get('/cliente/destroy/{cliente}','destroy')->name('cliente.destroy');
    });
    Route::controller(EmpleadoController::class)->group(function (){
        Route::get('/empleado','index')->name('empleado.index');
        Route::get('/empleado/create/','create')->name('empleado.create');
        Route::post('/empleado/store/','store')->name('empleado.store');
        Route::get('/empleado/edit/{empleado}','edit')->name('empleado.edit');
        Route::post('/empleado/update/{empleado}','update')->name('empleado.update');
        Route::get('/empleado/destroy/{empleado}','destroy')->name('empleado.destroy');
    });
});



require __DIR__.'/auth.php';
