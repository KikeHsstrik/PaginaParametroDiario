<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\denunciasController;





Route::get('/denuncia_ciudadana', function () {
    return view('denuncia_ciudadana');
})->name('denuncia_ciudadana');



Route::view('/','front.pages.home')->name('home');

;

Route::get('/article/{any}',[BlogController::class,'readPost'])->name('read_post');
Route::get('/category/{any}',[BlogController::class,'categoryPosts'])->name('category_posts');
Route::get('/posts/tag/{any}',[BlogController::class,'tagPosts'])->name('tag_posts');
Route::get('/search',[BlogController::class,'searchBlog'])->name('search_posts');


Route::post('/denuncia_ciudadana', [denunciasController::class, 'storeAnonima'])->name('addDenuncia');
Route::get('/denuncia_ciudadana', [denunciasController::class, 'denuncia_ciudadana'])->name('denuncia_ciudadana');


Route::post('/denuncia__ciudadana', [denunciasController::class, 'storeNoAnonima'])->name('addDenunciano');
Route::get('/denuncia__ciudadana', [denunciasController::class, 'denuncia__ciudadana'])->name('denuncia__ciudadana');