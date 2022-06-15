<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/superadmin/category/list', [CategoryController::class, 'categoryList']);
Route::get('/superadmin/category/add', [CategoryController::class, 'addCategory']);
Route::get('/superadmin/category/delete', [CategoryController::class, 'deleteCategory']);
Route::get('/superadmin/post/delete', [PostController::class, 'deletePost']);
