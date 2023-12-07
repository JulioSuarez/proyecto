<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\Business\AvatarController;
use App\Http\Controllers\Business\MetodoPagoController;
use App\Http\Controllers\Business\ProgramController;
use App\Http\Controllers\ProfileController;
use App\Models\Suscripcion;
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
    Route::post('/new/store',[ProgramController::class, 'new_store']);
    Route::post('/new/update',[ProgramController::class, 'new_update']);

   Route::resource('avatars', AvatarController::class)->only('index');


    //suscripciones
    Route::get('/suscripcion/RealizarPago/',[MetodoPagoController::class, 'pago_suscripcion'])->name('suscripcion.pago_suscripcion');
    Route::get('/store',[MetodoPagoController::class, 'store_index'])->name('store.index');
    // Route::get('/store/realizar-pago',[MetodoPagoController::class, 'store_pago'])->name('store.pago');
    
    Route::get('/hola',function(){
        Suscripcion::create([
            'nombre' => 'Plan Basico',
            'precio' => 1,
            'stripe_id' => 'price_1OJTfHJrLfX1VoDJWE4uOVib',
            'foto' => 'https://scontent.fsrz1-2.fna.fbcdn.net/v/t39.30808-6/306696242_2022526374615946_5961266096114267716_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=c83dfd&_nc_ohc=8-mbKNO71pcAX8DFHZg&_nc_ht=scontent.fsrz1-2.fna&oh=00_AfBwDsCf03J0TZbTFD27CTsGhQjDH1K8IA-lHykmsCXqAw&oe=6572BB51',
        ]);

        return 'hola';
    });
   

    //julico
    Route::get('/dashboard/admin',[AdministradorController::class, 'dashboard'])->name('admin.dashboard');
   
});

// Route::get('/suscripcion/RealizarPago/',[MetodoPagoController::class, 'pago_suscripcion'])->name('suscripcion.pago_suscripcion');
   

require __DIR__.'/auth.php';
