<?php

use App\Http\Controllers\AbArticlecategoryController;
use App\Http\Controllers\AbTestDataController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleTableController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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
//
//Route::get('/', function () {
//    return view('welcome');
//});
////optional assignment
//Route::get('/testdata',[AbTestDataController::class,'index'])->name('testdata');
//Route::view('/testdataraw','testdataview');
//
////given
//Route::get('/login', [AuthController::class,'login'])->name('login');
//Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
//Route::get('/isloggedin', [AuthController::class, 'isloggedin'])->name('haslogin');
//
////Abalo Homepage
//Route::get('/articles',[ArticleTableController::class,'index'])->name('articles.index');
//Route::get('/articles/',[ArticleTableController::class,'show'])->name('articles.show');
//Route::post('/articles',[ArticleTableController::class,'store'])->name('articles.store');
//
//Route::get('/categories',[AbArticlecategoryController::class,'index'])->name('categories.index');
//Route::get('/categories/',[AbArticlecategoryController::class,'show'])->name('categories.show');
//
//Route::get('/newarticle',function (){
//   return view('Random_assignments/newarticle');
//});
//Route::post('/newarticle',[ArticleTableController::class,'store'])->name('articles.store');
//

Route::get('/newsite',function () {
    return view("Vue_Version/Vue_template/table");
});
