<?php
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthorController;
use \App\Http\Controllers\denunciasController;

Route::prefix('author')->name('author.')->group(function(){

    Route::middleware(['guest:web'])->group(function(){
        Route::view('/login','back.pages.auth.login')->name('login');
        Route::view('/forgot-password','back.pages.auth.forgot')->name('forgot-password');
        Route::get('/password/reset/{token}',[AuthorController::class,'ResetForm'])->name('reset-form');
    });

    Route::middleware(['auth:web'])->group(function(){
       Route::get('/home',[AuthorController::class,'index'])->name('home');
       Route::post('/logout',[AuthorController::class, 'logout'])->name('logout');
       Route::view('/profile','back.pages.profile')->name('profile');
       Route::post('/change-profile-picture',[AuthorController::class,'changeProfilePicture'])->name('change-profile-picture'); 
      
       //Only Admin can access the following routes
       Route::middleware(['isAdmin'])->group(function(){
        Route::view('/settings','back.pages.settings')->name('settings');
        Route::post('/change-blog-logo',[AuthorController::class,'changeBlogLogo'])->name('change-blog-logo');
        Route::post('/change-blog-favicon',[AuthorController::class,'changeBlogFavicon'])->name('change-blog-favicon');
        Route::view('/authors','back.pages.authors')->name('authors');
        Route::view('/categories','back.pages.categories')->name('categories');
        Route::view('/denunciasAnonimas','back.pages.denunciasAnonimas')->name('denunciasAnonimas');
        Route::view('/anuncios','back.pages.anuncios')->name('anuncios');
        Route::view('/denunciasNoAnonimas','back.pages.denunciasNoAnonimas')->name('denunciasNoAnonimas');
        Route::get('/denunciasAnonimas', [denunciasController::class, 'mostrarDenunciasAnonimas'])->name('denunciasAnonimas');
        Route::get('/denunciaNoAnonimas', [denunciasController::class, 'mostrarDenunciasNoAnonimas'])->name('denunciasNoAnonimas');
        Route::delete('/denuncias-anonimas/eliminar/{id}', [denunciasController::class, 'eliminarDenunciaAnonima'])->name('denunciasAnonimas.eliminar');
        Route::delete('/denuncias-no-anonimas/eliminar/{id}', [denunciasController::class, 'eliminarDenunciaNoAnonima'])->name('denunciasNoAnonimas.eliminar');
           
       });

       Route::prefix('posts')->name('posts.')->group(function(){
        
           Route::view('/add-post','back.pages.add-post')->name('add-post');
           Route::post('/create',[AuthorController::class,'createPost'])->name('create');
           Route::post('/createanuncio',[AuthorController::class,'createanuncio'])->name('createanuncio');
           Route::view('/all','back.pages.all_posts')->name('all_posts');
           Route::get('/edit-post',[AuthorController::class,'editPost'])->name('edit-post');
           Route::post('/update-post',[AuthorController::class,'updatePost'])->name('update-post');
          
       });

       Route::prefix('anuncios')->name('posts.')->group(function(){
        
        Route::view('/add-anuncios','back.pages.add-post')->name('add-post');
        Route::post('/create',[AuthorController::class,'createPost'])->name('create');
        Route::post('/createanuncio',[AuthorController::class,'createanuncio'])->name('createanuncio');
        Route::view('/all','back.pages.all_posts')->name('all_posts');
        Route::get('/edit-post',[AuthorController::class,'editPost'])->name('edit-post');
        Route::post('/update-post',[AuthorController::class,'updatePost'])->name('update-post');
       
    });
    });
});