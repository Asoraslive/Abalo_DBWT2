<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ShoppingcartController;
use Bloatless\WebSocket\web_client;
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
Route::get('article',[ArticleController::class,'index']);
Route::get('lastarticles', [ArticleController::class,'lastArticle']);
Route::post('createArticle', [ArticleController::class,'store']);
Route::resource('shoppingkart',ShoppingcartController::class);
Route::post('articles/{id}/sold',[ArticleController::class,'sold']);
Route::post('discountItem',[ArticleController::class,'discount']);
