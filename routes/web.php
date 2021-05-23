<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

// Admin routes
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

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

// User All routes
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard', compact("user"));
})->name('dashboard');

Route::get("/", [IndexController::class, "index"]);
/* User logout */
Route::get("/user/logout", [IndexController::class, "userLogout"])->name("user.logout");
/* User profile edit */
Route::get("/user/profile", [IndexController::class, "userProfile"])->name("user.profile");
Route::post("/user/profile/store", [IndexController::class, "userProfileStore"])->name("user.profile.store");
