<?php

use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\PostController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/facebook/redirect', function () {
  return Socialite::driver('facebook')->redirect();
})->name('facebook.login') ;

Route::get('/facebook/callback', [PostController::class, 'callBack']);



Route::get('/', function () {
  return view('welcome');
});
Route::middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified'
])->group(function () {
  Route::get(
    '/dashboard',
    function () {
      return view('dashboard');
    }
  )->name('dashboard');

  Route::get('/Post', [PostController::class, 'index'])
    ->name('Post.index');

  Route::get('/Post/show/{id}', [PostController::class, 'show'])
    ->name('Post.show');

  Route::get('/Post/edit/{id}', [PostController::class, 'edit'])
    ->name('Post.edit');

  Route::put('/Post/update/{id}', [PostController::class, 'update'])
    ->name('Post.update');

  Route::delete('/Post/destroy/{id}', [PostController::class, 'destroy'])
    ->name('Post.destroy');

  Route::get('/Post/create', [PostController::class, 'create'])
    ->name('Post.create');

  Route::post('/Post/store', [PostController::class, 'store'])
    ->name('Post.store');
});
