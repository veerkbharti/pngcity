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
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\FrontendPostController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\PrivacyController;
use App\Http\Controllers\frontend\SearchController;


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
    Route::get('add', [PostController::class, 'addPost'])->name('post.add');
    Route::post('add', [PostController::class, 'createPost'])->name('post.create');
    Route::get('edit/{id}', [PostController::class, 'editPost'])->name('post.edit');
    Route::post('update/{id}', [PostController::class, 'updatePost'])->name('post.update');
    Route::get('delete/{id}', [PostController::class, 'deletePost'])->name('post.delete');
});


// Route::get('/superadmin/category', [CategoryController::class, 'index'])->middleware('guard');

Route::group(['prefix' => '/superadmin/category', 'middleware' => ['guard']], function () {
    Route::get('/', [CategoryController::class, 'index']);
    // Route::get('add', [CategoryController::class, 'addCategory']);
    // Route::post('load-category', [CategoryController::class, 'loadCategory']);
    Route::get('delete/{id}', [CategoryController::class, 'deleteCategory'])->name('category.delete');
    // Route::get('update/{id}/{status}', [CategoryController::class, 'updateCategory'])->name('category.update');
});


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
Route::get('/', [HomeController::class, 'index']);
Route::get('/search', [SearchController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/privacy', [PrivacyController::class, 'index']);
Route::get('/post/{slug}', [FrontendPostController::class, 'index'])->name('post.slug');
