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

Route::get('/', 'PagesController@index');
Route::get('/about',  'PagesController@about');
Route::get('/service', 'PagesController@service' );
Route::get('/zin/{id}/{name}/{taklu}',  'PagesController@zin');

Route::get('/admin', 'BlogsController@index');
Route::get('/create', 'BlogsController@create');
Route::post('/store', 'BlogsController@store');
Route::get('edit/{id}','BlogsController@edit');
Route::post('update/{id}', 'BlogsController@update')->name('blog.update');
Route::get('show/{id}','BlogsController@show');
Route::get('destroy/{id}', 'BlogsController@destroy')->name('blog.destroy');


//-------------------------------
Route::get('/contact_display', 'ContactsController@index');

Route::get('/contact', 'ContactsController@create');
Route::post('/contact_store', 'ContactsController@store');
Route::get('contact_destroy/{id}', 'ContactsController@destroy')->name('contact.destroy');
Route::get('/contact_show/{id}','ContactsController@show');

//------------------------------

Route::get('/aboutus_display', 'PagesController@aboutus_display');

Route::post('aboutus_update/{id}', 'PagesController@aboutus_update')->name('post.update');

//--------------------------------------
Route::get('/content_display', 'PagesController@content_display');

//----------------------------------------
Route::get('/pages_details/{id}','PagesController@details');
Route::post('/details_store', 'PagesController@details_store');
//----------------------------------------
Route::get('/comment_display', 'PagesController@comment_display');

Route::get('comment_edit/{id}','PagesController@comment_edit');

Route::post('comment_update/{id}', 'PagesController@comment_update')->name('blog.comment_update');

Route::get('comment_destroy/{id}', 'PagesController@comment_destroy')->name('comment.destroy');

//--------------search-------------------------
Route::get('/search_rs','BlogsController@search_rs');
Route::get('/search_rs_front','PagesController@search_rs_front');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//-----------------------------------------------

Route::get('/user_display', 'BlogsController@user_display');
Route::get('/user_edit/{id}','BlogsController@user_edit');
Route::post('/user_update/{id}', 'BlogsController@user_update')->name('blog.user_update');
//-----------------------------------------------
Route::get('/cat_display', 'BlogsController@cat_display');
Route::get('/cat_create', 'BlogsController@cat_create');

Route::post('/cat_store', 'BlogsController@cat_store');

Route::get('cat_show/{id}','PagesController@cat_show');



//---------------Nilu-----------------------------


Route::get('/parents', 'ParentsController@index');
Route::get('/parents_create', 'ParentsController@parents_create');
Route::post('/parents_store', 'ParentsController@parents_store');
Route::get('/parents_edit/{id}','ParentsController@parents_edit');
Route::post('/parents_update/{id}', 'ParentsController@parents_update');
Route::get('/parents_show/{id}','ParentsController@parents_show');
Route::get('/parents_destroy/{id}', 'ParentsController@parents_destroy');

//..................teacher..........................................
Route::get('/teacher_create','TeacherController@create');
Route::post('/teacher_store', 'TeacherController@store');
Route::get('/teacher_show/{id}','TeacherController@show');







