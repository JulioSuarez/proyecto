<?php

use App\Http\Controllers\Business\ProgramController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MetodoPagoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StreamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/hola', function () {
    return 'hola xd';
});

Route::get('/', [HomeController::class,'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

   Route::resource('programs', ProgramController::class);

    //streams en vivo
    Route::get('/stream',[StreamController::class, 'en_vivo'])->name('stream.en_vivo');
    Route::get('/control',[StreamController::class, 'control'])->name('stream.control');


    //suscripciones
    Route::get('/suscripciones',[MetodoPagoController::class, 'suscripciones_index'])->name('suscripciones.index');
    Route::get('/suscripciones/{suscripcion}/RealizarPago/',[MetodoPagoController::class, 'realizar_pago'])->name('suscripciones.realizar_pago');

});

require __DIR__.'/auth.php';
