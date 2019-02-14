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


// Affiche toutes les vignettes
Route::get('/', 'ThumbnailController@index');

//Affiche les détails d'une vignette
Route::get('/show/{thumbnailId}', 'ThumbnailController@show');

Route::group(['prefix'=>'admin'], function(){
    Route::get('/', 'AdminController@index');
    Route::get('/vignettes/create', 'AdminController@create');
    Route::get('/vignettes/{thumbnailId}', 'AdminController@show');
    Route::get('/vignettes/{thumbnailId}/edit', 'AdminController@edit');

    Route::post('/vignettes/create', 'ThumbnailController@create');
    Route::put('/vignettes/{thumbnailId}/edit/', 'ThumbnailController@edit');
    Route::delete('/vignettes/{thumbnailId}/delete', 'ThumbnailController@delete');


});

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
