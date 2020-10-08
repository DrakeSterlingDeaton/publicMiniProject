<?php

use App\Http\Controllers\MessagesController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});



Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/page', [PageController::class, 'index']);

    Route::post('/messages', [MessagesController::class, 'store'])->name('messages.store');

    Route::post('messages/update', [MessagesController::class, 'update'])->name('messages.update');

    Route::post('messages/destroy', [MessagesController::class, 'destroy'])->name('messages.destroy');

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
