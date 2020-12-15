<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductsController;
use App\Http\Controllers\Frontend\CategoriesController;
use App\Http\Controllers\Backend\PagesController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BrandController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'home']);
// Route::get('/cake',[Frontend\HomeController::class,'cake']);

// Product Route
// All the route for our product for Frontend

Route::group(['prefix'=>'products'],function(){

Route::get('/',[ProductsController::class,'index'])->name('products');
Route::get('/{slug}',[ProductsController::class,'show'])->name('products.show');
Route::get('/new/search',[HomeController::class,'search'])->name('search');

//Category Route
Route::get('/categories',[CategoriesController::class,'index'])->name('categories.index');
Route::get('/category/{id}',[CategoriesController::class,'show'])->name('categories.show');
});

// Amdin Route
Route::group(['prefix'=>'admin'],function(){
    Route::get('/',[PagesController::class,'index']);

    // Product Route
    Route::group(['prefix'=>'/products'],function(){
        Route::get('/',[ProductController::class,'index'])->name('admin.products');
        Route::get('/create',[ProductController::class,'create'])->name('admin.product.create');
        Route::get('/edit/{id}',[ProductController::class,'edit'])->name('admin.product.edit');
    
        Route::post('/store',[ProductController::class,'store'])->name('admin.product.store');
        Route::post('/update/{id}',[ProductController::class,'update'])->name('admin.product.update');
        Route::post('/delete/{id}',[ProductController::class,'delete'])->name('admin.product.delete');
    });

     // Category Route
     Route::group(['prefix'=>'/categories'],function(){
        Route::get('/',[CategoryController::class,'index'])->name('admin.categories');
        Route::get('/create',[CategoryController::class,'create'])->name('admin.category.create');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('admin.category.edit');
    
        Route::post('/store',[CategoryController::class,'store'])->name('admin.category.store');
        Route::post('/update/{id}',[CategoryController::class,'update'])->name('admin.category.update');
        Route::post('/delete/{id}',[CategoryController::class,'delete'])->name('admin.category.delete');
    });

     // Brand Route
     Route::group(['prefix'=>'/brands'],function(){
        Route::get('/',[BrandController::class,'index'])->name('admin.brands');
        Route::get('/create',[BrandController::class,'create'])->name('admin.brand.create');
        Route::get('/edit/{id}',[BrandController::class,'edit'])->name('admin.brand.edit');
    
        Route::post('/store',[BrandController::class,'store'])->name('admin.brand.store');
        Route::post('/update/{id}',[BrandController::class,'update'])->name('admin.brand.update');
        Route::post('/delete/{id}',[BrandController::class,'delete'])->name('admin.brand.delete');
    });

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
