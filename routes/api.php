
<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
  Route::post('/logout', [AuthController::class, 'logout']);

  // Posts endpoints
  Route::get('/posts', [PostController::class, 'index']);
  Route::get('/posts/{id}', [PostController::class, 'show']);
  Route::post('/posts', [PostController::class, 'store']);
  Route::put('/posts/{id}', [PostController::class, 'update']);
  Route::delete('/posts/{id}', [PostController::class, 'destroy']);

  // Comments endpoints
  Route::get('/posts/{post_id}/comments', [CommentController::class, 'index']);
  Route::post('/posts/{post_id}/comments', [CommentController::class, 'store']);
  Route::put('/comments/{id}', [CommentController::class, 'update']);
  Route::delete('/comments/{id}', [CommentController::class, 'destroy']);

  // Like enpoints
  Route::post('/posts/{post_id}/like', [LikeController::class, 'likePost']);
  Route::delete('/posts/{post_id}/like', [LikeController::class, 'unlikePost']);
  Route::post('/comments/{comment_id}/like', [LikeController::class, 'likeComment']);
  Route::delete('/comments/{comment_id}/like', [LikeController::class, 'unlikePost']);
});
