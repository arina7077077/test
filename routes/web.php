<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'auth',
], function() {
    Route::get('/', [MessageController::class, 'index'])->name('index');
    Route::get('create', [MessageController::class, 'create'])->name('create');
    Route::post('store', [MessageController::class, 'store'])->name('store');
    Route::get('/{message}', [MessageController::class, 'destroy'])->name('destroy');
});
