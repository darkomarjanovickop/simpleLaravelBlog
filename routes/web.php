<?php

use App\Http\Controllers\FallbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
 GET - request a resource
 POST - create a new resource
 PUT - update a resource
 PATCH - motify a resource (patch modifies certain values, post changes all)
 DELETE - deletes a resource
 OPTIONS - Ask the servers which verbs are allowed
|
*/


Route::prefix('/blog')->group(function () {
    Route::get('/create', [PostsController::class, 'create'])->name('blog.create');
    Route::get('/', [PostsController::class, 'index'])->name('blog.index');
    Route::get('/{id}', [PostsController::class, 'show'])->name('blog.show');
    Route::post('', [PostsController::class, 'store'])->name('blog.store');
    Route::get('/edit/{id}', [PostsController::class, 'edit'])->name('blog.edit');
    Route::patch('/{id}', [PostsController::class, 'update'])->name('blog.update');
    Route::delete('/{id}', [PostsController::class, 'destroy'])->name('blog.destroy');
});

//Route::resource('blog', PostsController::class);
Route::get('/', HomeController::class);


//MULTIPLE

//Route::match(['GET', 'POST'], '/blog', [PostsController::class, 'index']);
//Route::any('/blog',[PostsController::class, 'index']);

//Return view

//Route::view('/blog', 'blog.index', ['name' => 'Code with Darko']);

//fallback route

Route::fallback(FallbackController::class);