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
//Admin Login
Route::get('/admin-login',[App\Http\Controllers\Admin\LoginController::class, 'index'])->name('admin.login.get');
Route::Post('/admin-login',[App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login.post');
Route::get('logout',[App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin.logout');
Route::prefix('admin')->group(function(){
    
    Route::middleware(['auth:admin'])->group(function(){

        //Dashboard
        Route::get('/dashboard',[App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
        
        //User
        Route::get('/add-user',[App\Http\Controllers\Admin\AdminUserController::class,'addUser'])->name('add_user');

        // Route::get('/user-list',[App\Http\Controllers\Admin\AdminUserController::class,'addUserData'])->name('   users_list');
        Route::get('/user-list',[App\Http\Controllers\Admin\AdminUserController::class,'UserData'])->name('users_list');

        //Event
        Route::get('/event-type',[App\Http\Controllers\Admin\EventController::class,'eventType'])->name('event_type');
        Route::get('/manage-event',[App\Http\Controllers\Admin\EventController::class,'event'])->name('event');
        
        //Roles
        Route::get('/roles',[App\Http\Controllers\Admin\RoleController::class,'manageRole'])->name('manage_role');
        Route::get('/add-role',[App\Http\Controllers\Admin\RoleController::class,'addRole'])->name('add_role');
        Route::post('/add-role',[App\Http\Controllers\Admin\RoleController::class,'addRoleData'])->name('admin.addRole.post');

        // Update Role
        Route::get('/update-role',[App\Http\Controllers\Admin\RoleController::class,'UpdateRole'])->name('update_role');
        Route::post('/update-role',[App\Http\Controllers\Admin\RoleController::class,'UpdateRoleData'])->name('admin.UpdateRole.post');
        // Delete Role
        Route::get('/delete-role', [App\Http\Controllers\Admin\RoleController::class,'DeleteRoleData'])->name('admin.deleteRole');


        //Prasad
        Route::get('/manage-prasad',[App\Http\Controllers\Admin\PrasadController::class,'index'])->name('prshad_type');

        //Donation
        Route::get('/donation',[App\Http\Controllers\Admin\DonationController::class,'index'])->name('donation_type');

        //Order
        Route::get('/order-status',[App\Http\Controllers\Admin\OrderController::class,'index'])->name('order_status');

        //Gallery
        Route::get('/image-gallery',[App\Http\Controllers\Admin\GalleryController::class,'imageGallery'])->name('images_gallery');
        Route::get('/video-gallery',[App\Http\Controllers\Admin\GalleryController::class,'videoGallery'])->name('videos_gallery');

    });
});
