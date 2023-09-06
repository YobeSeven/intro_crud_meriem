<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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
//* ROUTE FOR VIEWS
Route::get('/', [HomeController::class , "index"])->name("home");

Route::get('/paniers' , [PanierController::class , "index"])->name("paniers.index");

Route::get("/products" , [ProductController::class , "index"])->name("products.index");
Route::get("/products/create" , [ProductController::class , "create"])->name("products.create");
Route::get("/products/{product}/edit" , [ProductController::class , "edit"])->name("products.edit");
Route::get("/products/{product}/show" , [ProductController::class , "show"])->name("products.show");

//* ROUTE FOR DATABASE 
Route::post("/products/store" , [ProductController::class , "store"])->name("products.store");
Route::put("/products/{product}/update" , [ProductController::class , "update"])->name("products.update");
Route::delete("/products/{product}/destroy" , [ProductController::class , "destroy"])->name("products.destroy");

Route::put("/products/{product}/panier/add" , [PanierController::class , "addFromProduct"])->name("paniers.addFromProduct");
Route::put("/products/{panier}/panier/remove" , [PanierController::class , "removeFromPanier"])->name("paniers.removeFromPanier");