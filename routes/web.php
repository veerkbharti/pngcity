<?php

use Illuminate\Support\Facades\Route;

/* Admin Controller
--------------------------------------*/
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\UserController;
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

Route::get('/superadmin', [DashboardController::class, 'index'])->middleware('guard');

Route::group(['prefix' => '/superadmin/post', 'middleware' => ['guard']], function () {
    Route::get('/', [PostController::class, 'posts']);
    Route::get('add', [PostController::class, 'addPost']);
    Route::post('add', [PostController::class, 'createPost']);
    Route::get('edit/{id}', [PostController::class, 'editPost'])->name('post.edit');
    Route::post('update/{id}', [PostController::class, 'updatePost'])->name('post.update');
});


Route::get('/superadmin/category', [CategoryController::class, 'index'])->middleware('guard');


Route::group(['prefix' => '/superadmin/user', 'middleware' => ['guard']], function () {
    Route::get('password/change', [UserController::class, 'changePassword'])->name('password.change');
    Route::post('password/update', [UserController::class, 'updatePassword'])->name('password.update');
    Route::get('password/forgot', [UserController::class, 'forgotPassword'])->name('password.forgot');
    Route::get('logout', [UserController::class, 'logout'])->name('user.logout');
});


Route::get('/superadmin/login', [UserController::class, 'login']);
Route::post('/superadmin/login', [UserController::class, 'loginUser'])->name('user.login');



/*  Frontend Routes
--------------------------------------*/

// Route::get('/', [HomeController::class, 'index']);
// Route::get('/about', [AboutController::class, 'index']);
// Route::get('/contact', [ContactController::class, 'index']);
// Route::get('/services', [ServicesController::class, 'index']);
