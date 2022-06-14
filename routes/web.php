<?php

use Illuminate\Support\Facades\Route;

/* Admin Controller
--------------------------------------*/
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CategoryController;

use App\Models\Post;

/*  Frontend Controller
--------------------------------------*/
// use App\Http\Controllers\frontend\HomeController;
// use App\Http\Controllers\frontend\AboutController;
// use App\Http\Controllers\frontend\ContactController;
// use App\Http\Controllers\frontend\ServicesController;
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

/*  Admin Routes
--------------------------------------*/
Route::get('/superadmin', [DashboardController::class, 'index']);

Route::get('/superadmin/posts', [PostController::class, 'index']);
Route::get('/superadmin/post/add', [PostController::class, 'addPost']);
Route::post('/superadmin/post/add', [PostController::class, 'createPost']);
Route::get('/superadmin/post/edit', [PostController::class, 'editPost']);
Route::get('/superadmin/post/update', [PostController::class, 'updatePost']);
Route::get('/superadmin/post/delete', [PostController::class, 'deletePost']);

Route::get('/superadmin/category', [CategoryController::class, 'index']);
Route::get('/superadmin/category/add', [CategoryController::class, 'addPost']);
Route::get('/superadmin/category/edit', [CategoryController::class, 'editPost']);
Route::get('/superadmin/category/update', [CategoryController::class, 'updatePost']);
Route::get('/superadmin/category/delete', [CategoryController::class, 'deletePost']);

Route::get('superadmin/user/login',[AuthController::class, 'index']);
Route::get('superadmin/user/change-password',[AuthController::class, 'changePassword']);


/*  Frontend Routes
--------------------------------------*/

// Route::get('/', [HomeController::class, 'index']);
// Route::get('/about', [AboutController::class, 'index']);
// Route::get('/contact', [ContactController::class, 'index']);
// Route::get('/services', [ServicesController::class, 'index']);



