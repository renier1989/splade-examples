<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TreesController;
use App\Http\Controllers\SpladeController;
use App\Http\Controllers\ProfileController;

Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    // Ruta para vista de splade
    Route::get('/', fn()=> view('home'))->name('home');
    Route::get('/docs', fn()=> view('docs'))->name('docs');

    // Rutas para el proceso de login y registro de usuarios
    Route::middleware('auth')->group(function () {

        Route::get('/dashboard', fn()=>view('auth/dashboard'))->name('dashboard');
        
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // RUTAS PARA POSTS
        Route::get('/posts', [PostController::class, 'index'])->name('post.index');
        Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');
        Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
        Route::post('/post/{post}',[PostController::class, 'update'])->name('post.update');
        
        Route::get('/postsv2', [PostController::class, 'indexv2'])->name('post.indexv2');
        Route::get('/postsv2/add', [PostController::class, 'add'])->name('post.add');
        Route::post('/postsv2/store', [PostController::class, 'storev2'])->name('post.storev2');
        Route::get('/postsv2/{post}/edit', [PostController::class, 'editv2'])->name('post.editv2');
        Route::patch('/postsv2/{post}/update', [PostController::class, 'updatev2'])->name('post.updatev2');

        //ejemplo de trees
        Route::get('/trees', [TreesController::class, 'index'])->name('trees.index');
    });


    /**  PRACTICANDO ALGUNAS FUNCIONALIDADES CON EL CONTROLADOR */
    Route::get('practicando', [SpladeController::class, 'index'])->name('practicando');
    Route::get('practicando/files', [SpladeController::class, 'index_files'])->name('practicando.files');
    Route::post('upload-file', [SpladeController::class, 'uploadFile'])->name('upload-file');

    require __DIR__.'/auth.php';
});
