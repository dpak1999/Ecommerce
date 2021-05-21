<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// Admin routes

/* admin Logout */
Route::get("/admin/logout", [AdminController::class, "destroy"])->name("admin.logout");
/* admin Profile */
Route::get("/admin/profile", [AdminProfileController::class, "adminProfile"])->name("admin.profile");
/* admin Profile edit */
Route::get("/admin/profile/edit", [AdminProfileController::class, "adminProfileEdit"])->name("admin.profile.edit");
Route::post("/admin/profile/store", [AdminProfileController::class, "adminProfileStore"])->name("admin.profile.store");
/* chnage password */
Route::get("/admin/change/password", [AdminProfileController::class, "adminChangePassword"])->name("admin.change.password");
Route::post("/update/change/password", [AdminProfileController::class, "updateChangePassword"])->name("update.change.password");


// Middlewares
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
