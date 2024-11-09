<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollewerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Follewer;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/',HomeController::class)->name('home')->middleware('auth');;


//Editar perfil
Route::get('{/editar-perfil',[PerfilController::class,'index'])->name('perfil.index')->middleware('auth');
Route::post('{/editar-perfil',[PerfilController::class,'store'])->name('perfil.store')->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);
Route::post('/logout',[LogoutController::class,'store'])->name('logout');
//Editar perfil
Route::get('{/editar-perfil',[PerfilController::class,'index'])->name('perfil.index')->middleware('auth');
Route::post('{/editar-perfil',[PerfilController::class,'store'])->name('perfil.store')->middleware('auth');

Route::get('/{user:username}',[PostController::class, 'index'])->name('post.index');
Route::get('/posts/create',[PostController::class,'create'])->name('post.create')->middleware('auth');

Route::post('/post',[PostController::class,'store'])->name('posts.store')->middleware('auth');
Route::get('{user:username}/posts/{post}',[PostController::class,'show'])->name('posts.show');
Route::post('{user:username}/posts/{post}',[ComentarioController::class,'store'])->name('comentario.store');
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');
Route::post('/imagenes',[ImagenController::class,'store'])->name('imagenes.store');
//Likes a las fotos
Route::post('/posts/{post}/likes',[LikeController::class,'store'])->name('posts.likes.store');
Route::delete('/posts/{post}/likes',[LikeController::class,'destroy'])->name('posts.likes.destroy');
//Siguiendo a USuarios
Route::post('/{user:username}/follow',[FollewerController::class,'store'])->name('users.follow');
Route::delete('/{user:username}/follow',[FollewerController::class,'destroy'])->name('users.unfollow');

