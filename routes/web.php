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

Route::get('/', function () {
    return view('welcome');
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
Route::get('/posts', 'PostController@index');

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
