<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\login\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShowController;

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

// user
Route::get('/', [HomeController::class, 'index'])->name('user.home');
Route::get('/chitiet/{id}', [ShowController::class, 'show'])->name('user.chitiet');
Route::get('/shop', [ShopController::class, 'shop'])->name('user.shop');
Route::get('/categories', [ShowController::class, 'category']);
Route::get('/search', [ShopController::class, 'search'])->name('user.search');
Route::get('/showuser/{id}', [LoginController::class, 'showuser'])->name('user.showuser');
Route::put('/updateuser/{id}', [LoginController::class, 'updateuser'])->name('user.updateuser');


// login 

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'postLogin'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [LoginController::class, 'register'])->name('register');
Route::post('register', [LoginController::class, 'userRegister'])->name('register');


// admin 

Route::get('/admin', [AdminController::class, 'admin'])->name('admin.viewadmin')->middleware(['auth', 'isAdmin']);
// Route::get('logout', [LoginController::class, 'logout'])->name('logout');



// category
Route::get('/admin/category', [AdminController::class, 'category'])->name('admin.category');
Route::get('/admin/category/add', [AdminController::class, 'addCategory'])->name('admin.addcate');
Route::post('/admin/category/add', [AdminController::class, 'addCate'])->name('admin.addcate');
Route::delete('/admin/category/delete/{id}', [AdminController::class, 'deleteCate'])->name('admin.delete');

// product
Route::get('/admin/product', [AdminController::class, 'product'])->name('admin.product');
Route::get('/admin/product/add', [AdminController::class, 'addProduct'])->name('admin.addproduct');
Route::post('/admin/product/add', [AdminController::class, 'addPro'])->name('admin.addproduct');
Route::delete('/admin/product/delete/{id}', [AdminController::class, 'deletePro'])->name('admin.delete');
Route::get('/admin/product/edit/{id}', [AdminController::class, 'editPro'])->name('admin.editproduct');
Route::put('/admin/product/edit/{id}', [AdminController::class, 'updatePro'])->name('admin.updateproduct');


// user
Route::get('admin/user', [AdminController::class, 'user'])->name('admin.user');
Route::get('/admin/user/add', [AdminController::class, 'addUser'])->name('admin.adduser');
Route::post('/admin/user/add', [AdminController::class, 'addNewUser'])->name('admin.adduser');
Route::delete('/admin/user/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteuser');
Route::get('/admin/user/edit/{id}', [AdminController::class, 'editUser'])->name('admin.edituser');
Route::put('/admin/user/edit/{id}', [AdminController::class, 'updateUser'])->name('admin.updateuser');


