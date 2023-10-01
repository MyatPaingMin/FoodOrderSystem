<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(["prefix"=>"/get"],function(){
    Route::get('/product',[ProductController::class,'allProduct']);
    Route::get('/category',[CategoryController::class,'categoryRetrieve']);
});

Route::post('/category',[CategoryController::class,'categoryAdd']);

Route::post('/category/delete',[CategoryController::class,'deleteCategoryAPI']);

Route::get('/category/insert/{name}/{email}',[CategoryController::class,'seeCategory']);


Route::post('/category/update',[CategoryController::class,'categoryUpdate']);
Route::get('/category/view/{id}',[CategoryController::class,'categoryView']);




