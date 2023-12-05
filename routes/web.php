<?php

use App\Http\Controllers\Business\AvatarController;
use App\Http\Controllers\Business\MetodoPagoController;
use App\Http\Controllers\Business\ProgramController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Route::get('/', [HomeController::class,'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

   Route::resource('programs', ProgramController::class)->only(['index', 'show']);
   Route::resource('avatars', AvatarController::class)->only('index');


    //suscripciones
    Route::get('/suscripcion/RealizarPago/',[MetodoPagoController::class, 'pago_suscripcion'])->name('suscripcion.pago_suscripcion');
   
});

// Route::get('/suscripcion/RealizarPago/',[MetodoPagoController::class, 'pago_suscripcion'])->name('suscripcion.pago_suscripcion');
   

require __DIR__.'/auth.php';
