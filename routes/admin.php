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
Route::get('/admin-login', [App\Http\Controllers\Admin\LoginController::class, 'index'])->name('admin.login.get');
Route::Post('/admin-login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login.post');
Route::get('logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin.logout');
Route::prefix('admin')->group(function () {

    Route::middleware(['auth:admin'])->group(function () {

        //Dashboard
        Route::get('/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');


        //User
        Route::middleware(['check.permissions:2'])->group(function () {
            Route::get('/add-user', [App\Http\Controllers\Admin\AdminUserController::class, 'addUser'])->name('add_user');
            Route::get('/edit-user', [App\Http\Controllers\Admin\AdminUserController::class, 'EditUser'])->name('edit_user');
            Route::get('/user-list', [App\Http\Controllers\Admin\AdminUserController::class, 'UserData'])->name('users_list');
            Route::post('/edit-data', [App\Http\Controllers\Admin\AdminUserController::class, 'EditData'])->name('admin.edit_data');
            Route::post('/add-user-data', [App\Http\Controllers\Admin\AdminUserController::class, 'addUserData'])->name('addUserData');
        });


        //Prasad
        Route::middleware(['check.permissions:3'])->group(function () {
            Route::get('/manage-prasad', [App\Http\Controllers\Admin\PrasadController::class, 'index'])->name('prshad_type');
            Route::post('/manage-prasad', [App\Http\Controllers\Admin\PrasadController::class, 'addPrasadType'])->name('prshad_type_post');
            Route::get('/delete-prasad', [App\Http\Controllers\Admin\PrasadController::class, 'DeletePrasadData'])->name('admin.deletePrasad');
            Route::post('/update-prasad', [App\Http\Controllers\Admin\PrasadController::class, 'UpdatePrasadData'])->name('update_prashad_type');
        });


        //Event
        Route::middleware(['check.permissions:4'])->group(function () {
            Route::get('/event-type', [App\Http\Controllers\Admin\EventController::class, 'eventType'])->name('event_type');
            Route::get('/manage-event', [App\Http\Controllers\Admin\EventController::class, 'event'])->name('event');
            Route::get('/event_list', [App\Http\Controllers\Admin\EventController::class, 'EventList'])->name('event_list');
            Route::get('/edit-event', [App\Http\Controllers\Admin\EventController::class, 'EditEvent'])->name('edit_event');

            Route::get('/delete-event', [App\Http\Controllers\Admin\EventController::class, 'DeleteEvent'])->name('delete_event');
            Route::post('/add-event-type', [App\Http\Controllers\Admin\EventController::class, 'addEventType'])->name('addEventType');
            Route::post('/manage-event', [App\Http\Controllers\Admin\EventController::class, 'manageEvent'])->name('manage_event');
            Route::post('/edit-event', [App\Http\Controllers\Admin\EventController::class, 'EditEventData'])->name('edit_event.post');
        });


        //Roles
        Route::middleware(['check.permissions:11'])->group(function () {
            Route::get('/roles', [App\Http\Controllers\Admin\RoleController::class, 'manageRole'])->name('manage_role');
            Route::get('/add-role', [App\Http\Controllers\Admin\RoleController::class, 'addRole'])->name('add_role');
            Route::post('/add-role', [App\Http\Controllers\Admin\RoleController::class, 'addRoleData'])->name('admin.addRole.post');
            Route::get('/update-role', [App\Http\Controllers\Admin\RoleController::class, 'UpdateRole'])->name('update_role');
            Route::post('/update-role', [App\Http\Controllers\Admin\RoleController::class, 'UpdateRoleData'])->name('admin.UpdateRole.post');
            Route::get('/delete-role', [App\Http\Controllers\Admin\RoleController::class, 'DeleteRoleData'])->name('admin.deleteRole');
        });


        //Donation
        Route::middleware(['check.permissions:5'])->group(function () {
            Route::get('/donation', [App\Http\Controllers\Admin\DonationController::class, 'index'])->name('donation_type');
        });


        //Order
        Route::middleware(['check.permissions:6'])->group(function () {
            Route::get('/order-status', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('order_status');
        });


        //Image Gallery
        Route::middleware(['check.permissions:7'])->group(function () {
            Route::get('/image-gallery', [App\Http\Controllers\Admin\GalleryController::class, 'imageGallery'])->name('images_gallery');
        });


        //Video Gallery
        Route::middleware(['check.permissions:8'])->group(function () {
            Route::get('/video-gallery', [App\Http\Controllers\Admin\GalleryController::class, 'videoGallery'])->name('videos_gallery');
        });

        // Settings
        Route::middleware(['check.permissions:14'])->group(function () {
            Route::get('/settings',[App\Http\Controllers\Admin\SettingsController::class, 'settingsIndex'])->name('settings');
            Route::post('/settings-update',[App\Http\Controllers\Admin\SettingsController::class, 'settingUpdate'])->name('settingsUpdate');
        });
    });
});
