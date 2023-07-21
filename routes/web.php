<?php

use App\Http\Controllers\OrderController;
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

Route::get('/',function (){
    return redirect()->route('login');
});

Route::group(['prefix' => 'orders', 'middleware' => 'auth'],function(){

    Route::get('',[OrderController::class, 'index'])
        ->name('order.index');

    Route::get('create',[OrderController::class, 'create'])
        ->name('order.create');

    Route::post('store',[OrderController::class, 'store'])
        ->name('order.store');

    Route::get('{order}/edit',[OrderController::class,'edit'])
        ->name('order.edit');

    Route::put('{order}/update',[OrderController::class,'update'])
        ->name('order.update');

    Route::delete('{order}/delete', [OrderController::class, 'destroy'])
        ->name('order.delete');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
