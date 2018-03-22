<?php
use App\Post;
use App\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
  return view('welcome');
});

Route::get('/home', function () {
  return view('welcome');
})->name('home');

Route::get('/aboutme', function () {
  return view('aboutme');
})->name('aboutme');

Route::get('/admin', function () {
  return view('admin');
});

Route::get('/show',function () {
  //$posts = Post::all();
  //return view('posts', ['posts' => $posts]);
  $posts = Post::with('user')->paginate();
  return view('posts.index',compact('posts'));
})->name('show');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::resource('/posts', 'PostsController');
Auth::routes();
