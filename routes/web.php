<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserPostController;
use Illuminate\Support\Facades\Route;

use App\Models\Post;

 
Route::get('/', function () {
    $posts = Post::paginate(10); // Use the Post model and paginate the posts
    return view('home', ['posts' => $posts]);
});

// Resource route for posts (only index and show)
Route::resource('posts', PostController::class)->only(['index', 'show']);

// Resource route for user posts, under the 'auth' middleware group
Route::get('/dashboard', [UserPostController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Group for authenticated user profile routes
Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
 

// Include authentication routes (login, register, etc.)
require __DIR__.'/auth.php';
