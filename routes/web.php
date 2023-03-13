<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;




Route::get('/den_ciu', function () {
    return view('den_ciu');
})->name('den_ciu');



Route::view('/','front.pages.home')->name('home');

Route::get('/den_ciu/{any}',[BlogController::class,'den_ciu'])->name('den_ciu');

Route::get('/article/{any}',[BlogController::class,'readPost'])->name('read_post');
Route::get('/category/{any}',[BlogController::class,'categoryPosts'])->name('category_posts');
Route::get('/posts/tag/{any}',[BlogController::class,'tagPosts'])->name('tag_posts');
Route::get('/search',[BlogController::class,'searchBlog'])->name('search_posts');


