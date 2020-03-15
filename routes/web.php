<?php

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
use App\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test_hello/{name}/{age}', 'HomeController@test_hello')->name('test_hello');

//user
Route::get('/users', 'UserController@index')->name('users.index');

Route::get('/user', 'TaskController@index');

Route::get('/user/{usr}', 'TaskController@create')->name('jobs.create');

Route::get('/create', 'TaskController@create')->name('jobs.create');
Route::post('/create', 'TaskController@store')->name('jobs.store');

//post
Route::get('/posts', 'PostController@index')->name('posts.index');

Route::get('/post-tag', function(){
    $post = Post::find(1);
    //attach + нэмэх
    //detach - Устгах
    $post->tags()->attach(2);
});

Route::get('/posts-tag', 'PostController@indexTag');
//Route::get('/tag', 'TagController@index');

//contact
Route::get('/contact', 'ContactController@index')->name('contact.index');
Route::get('/contact/create', 'ContactController@create')->name('contact.create');
Route::post('/contact/create', 'ContactController@store')->name('contact.store');
Route::get('/contact/{contact}/edit', 'ContactController@edit')->name('contact.edit');
Route::post('/contact/{contact}/update', 'ContactController@update')->name('contact.update');
Route::get('/contact/{contact}/show', 'ContactController@show')->name('contact.show');
Route::post('/contact/{contact}/destroy', 'ContactController@destroy')->name('contact.destroy');

//Album
Route::get('/album', 'ImageController@index')->name('album.index');
Route::get('/album/create', 'ImageController@create')->name('album.create')->middleware('admin');
Route::post('/album/create', 'ImageController@store')->name('album.store')->middleware('admin');
Route::post('/album/image', 'ImageController@image')->name('album.image');
Route::get('/album/{id}', 'ImageController@show')->name('album.show');
Route::post('/album/destroy/{id}', 'ImageController@destroy')->name('album.destroy');
Route::post('/album/add/image', 'ImageController@albumImage')->name('album.add.image');
