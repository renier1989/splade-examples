<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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
    });

    require __DIR__.'/auth.php';
});
