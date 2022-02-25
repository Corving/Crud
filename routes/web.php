<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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


Route::get('/', function () {
    return view('welcome');
})->name("accueil");

Route::get('/posts',[PostController::class,'index'])->name('posts');
Route::get("/posts/create", [PostController::class,"create"])->name("posts.create");
Route::post("/posts/create", [PostController::class,"store"])->name("posts.ajouter");
Route::get("/posts/{id}/edit",[PostController::class,"edit"])->name("posts.edit");
Route::put('/posts/{id}/edit',[PostController::class,'update'])->name("posts.update");
Route::delete("/posts/{posts}", [PostController::class,"delete"])->name("posts.supprimer");

