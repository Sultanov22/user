<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function(){
    Route::get('/abror', [\App\Http\Controllers\PostController::class,'index'])->name('abror');

});

Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
Route::get('create', [\App\Http\Controllers\PostController::class, 'create'])->name('create');
Route::post('post', [\App\Http\Controllers\PostController::class, 'store'])->name('store');
});


Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
    Route::get('user', [\App\Http\Controllers\UserController::class, 'index'])->name('index');
    Route::get('create', [\App\Http\Controllers\UserController::class, 'create'])->name('create');
    Route::post('', [\App\Http\Controllers\UserController::class, 'store'])->name('store');
    Route::get('/{id}/edit/', [\App\Http\Controllers\UserController::class, 'edit'])->name('edit');
    Route::put('/{id}/update/', [\App\Http\Controllers\UserController::class, 'update'])->name('update');
    Route::get('/search', [\App\Http\Controllers\UserController::class, 'search'])->name('search');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
