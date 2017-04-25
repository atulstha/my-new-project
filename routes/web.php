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

Route::get('/', function () {
    return view('welcome');
});





//bootstrap
Route::group(['middleware'=>['login']],function(){

Route::get('edit/{id}', 'RecipeController@edit');
Route::post('update', 'RecipeController@update');
Route::get('delete/{id}', 'RecipeController@delete');
Route::post('add', 'RecipeController@add');
Route::get('main', 'RecipeController@main');
Route::get('detail', 'RecipeController@detail');




Route::get('front', 'RecipeController@front');
Route::get('view', 'RecipeController@recipeall');
Route::get('view/{id}', 'RecipeController@view');

/*RECIPE*/
Route::get('recipe', 'RecipeController@rec');
Route::post('recipe/add', 'RecipeController@addrec');
Route::get('recipe/add/ing', 'RecipeController@selectrecing');
Route::post('recipe/add/ing', 'RecipeController@addrecing');
Route::get('recipe/edit/{id}', 'RecipeController@editrec');
Route::post('recipe/update', 'RecipeController@updaterec');
Route::get('recipe/delete/{id}', 'RecipeController@deleterec');
Route::get('alluserrecipe', 'RecipeController@alluserrecipe');



/*Ingredients*/
Route::get('ing', 'RecipeController@ing');
Route::post('adding', 'RecipeController@adding');
Route::get('ing/edit/{id}', 'RecipeController@editing');
Route::post('ing/updateing', 'RecipeController@updateing');
Route::post('ing/delete/{id}', 'RecipeController@deleteing');

Route::get('userprof', 'RecipeController@userprof');

});
Route::get('like/{id}', 'RecipeController@likerec');
Route::get('save/{id}', 'RecipeController@saverec');


Route::get('trial', 'RecipeController@trial');
Route::get('try', 'RecipeController@eg');
Route::get('form', 'RecipeController@form');
Route::get('logout', 'RecipeController@logout');
 

Route::get('auth/github', 'AuthController@redirectToProvider');
Route::get('auth/github/callback', 'AuthController@handleProviderCallback');
 
/*

Route::group(['middleware'=>['login']],function(){
Route::get('view', 'RegisterController@view') ;
Route::get('main', 'RegisterController@main');
Route::get('edit/{id}', 'RegisterController@edit');
Route::get('delete/{id}', 'RegisterController@delete');
Route::post('update', 'RegisterController@update');
Route::get('admin', function(){
	echo 'access Granted';
});
});
*/
Route::post('registeruser', 'RecipeController@reguser');

 



Auth::routes();

Route::get('/home', 'HomeController@index');
