<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\VehiculoController;
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

    Route::controller(TurnoController::class)->group(function (){
        Route::get('/turno','index')->name('turno.index');
        Route::get('/turno/create/','create')->name('turno.create');
        Route::post('/turno/store/','store')->name('turno.store');
        Route::get('/turno/edit/{turno}','edit')->name('turno.edit');
        Route::post('/turno/update/{turno}','update')->name('turno.update');
        Route::get('/turno/destroy/{turno}','destroy')->name('turno.destroy');
    });
    Route::controller(ProveedorController::class)->group(function (){
        Route::get('/proveedor','index')->name('proveedor.index');
        Route::get('/proveedor/create/','create')->name('proveedor.create');
        Route::post('/proveedor/store/','store')->name('proveedor.store');
        Route::get('/proveedor/edit/{proveedor}','edit')->name('proveedor.edit');
        Route::post('/proveedor/update/{proveedor}','update')->name('proveedor.update');
        Route::get('/proveedor/destroy/{proveedor}','destroy')->name('proveedor.destroy');
    });

    Route::controller(RegisteredUserController::class)->group(function (){
        Route::get('/user','index')->name('user.index');
        Route::get('/user/create/','create')->name('user.create');
        Route::post('/user/store/','store')->name('user.store');
        Route::get('/user/edit/{user}','edit')->name('user.edit');
        Route::post('/user/update/{user}','update')->name('user.update');
        Route::get('/user/destroy/{user}','destroy')->name('user.destroy');
    });
    
    Route::controller(VehiculoController::class)->group(function (){
        Route::get('/vehiculo','index')->name('vehiculo.index');
        Route::get('/vehiculo/create/','create')->name('vehiculo.create');
        Route::post('/vehiculo/store/','store')->name('vehiculo.store');
        Route::get('/vehiculo/edit/{vehiculo}','edit')->name('vehiculo.edit');
        Route::post('/vehiculo/update/{vehiculo}','update')->name('vehiculo.update');
        Route::get('/vehiculo/destroy/{vehiculo}','destroy')->name('vehiculo.destroy');
    });

});



require __DIR__.'/auth.php';
