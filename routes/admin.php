<?php

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
Route::get('/admin-login',[App\Http\Controllers\Admin\LoginController::class, 'index'])->name('admin.login');
Route::Post('/admin-login',[App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login.post');
Route::prefix('admin')->group(function(){

    Route::middleware(['auth:admin'])->group(function(){
        Route::get('/dashboard',[App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
    });
});
