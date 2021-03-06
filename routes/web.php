<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SubCategoryController;
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

// Admin Brand Routes
Route::prefix("brand")->group(function () {
    Route::get("/view", [BrandController::class, "brandView"])->name("all.brand");
    Route::post("/store", [BrandController::class, "brandStore"])->name("brand.store");
    Route::get("/edit/{id}", [BrandController::class, "brandEdit"])->name("brand.edit");
    Route::post("/update", [BrandController::class, "brandUpdate"])->name("brand.update");
    Route::get("/delete/{id}", [BrandController::class, "brandDelete"])->name("brand.delete");
});

// Admin Category Routes
Route::prefix("category")->group(function () {
    Route::get("/view", [CategoryController::class, "categoryView"])->name("all.category");
    Route::post("/store", [CategoryController::class, "categoryStore"])->name("category.store");
    Route::get("/edit/{id}", [CategoryController::class, "categoryEdit"])->name("category.edit");
    Route::post("/update", [CategoryController::class, "categoryUpdate"])->name("category.update");
    Route::get("/delete/{id}", [CategoryController::class, "categoryDelete"])->name("category.delete");

    // Admin Subcategory Routes
    Route::get("/sub/view", [SubCategoryController::class, "subcategoryView"])->name("all.subcategory");
    Route::post("/sub/store", [SubCategoryController::class, "subcategoryStore"])->name("subcategory.store");
    Route::get("/sub/edit/{id}", [SubCategoryController::class, "subcategoryEdit"])->name("subcategory.edit");
    Route::post("/sub/update", [SubCategoryController::class, "subcategoryUpdate"])->name("subcategory.update");
    Route::get("/sub/delete/{id}", [SubCategoryController::class, "subcategoryDelete"])->name("subcategory.delete");

    // Admin Sub Subcategory routes
    Route::get("/sub/sub/view", [SubCategoryController::class, "subsubcategoryView"])->name("all.subsubcategory");
    Route::get("/subcategory/ajax/{category_id}", [SubCategoryController::class, "getSubCategory"]);
    Route::get("/sub-subcategory/ajax/{subcategory_id}", [SubCategoryController::class, "getSubSubCategory"]);
    Route::post("/sub/sub/store", [SubCategoryController::class, "subsubcategoryStore"])->name("subsubcategory.store");
    Route::get("/sub/sub/edit/{id}", [SubCategoryController::class, "subsubcategoryEdit"])->name("subsubcategory.edit");
    Route::post("/sub/sub/update", [SubCategoryController::class, "subsubcategoryUpdate"])->name("subsubcategory.update");
    Route::get("/sub/sub/delete/{id}", [SubCategoryController::class, "subsubcategoryDelete"])->name("subsubcategory.delete");
});

// Admin Product routes
Route::prefix("product")->group(function () {
    Route::get("/add", [ProductController::class, "addProduct"])->name("add-product");
    Route::post("/store", [ProductController::class, "storeProduct"])->name("product-store");
    Route::get("/manage", [ProductController::class, "manageProduct"])->name("manage-product");
    Route::get("/edit/{id}", [ProductController::class, "editProduct"])->name("product.edit");
    Route::post("/data/update", [ProductController::class, "ProductDataUpdate"])->name("product-update");
    Route::post("/image/update", [ProductController::class, "multiImageUpdate"])->name("update-product-image");
    Route::post("/thumbnail/update", [ProductController::class, "thumbnailImageUpdate"])->name("update-product-thumbnail");
});

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
/* User password change */
Route::get("/user/change/password", [IndexController::class, "userChangePassword"])->name("change.password");
Route::post("/user/password/update", [IndexController::class, "userPasswordUpdate"])->name("user.password.update");
