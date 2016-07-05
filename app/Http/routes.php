<?php

Use App\Plant;
Use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\InviteController;


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Open Web routes
Route::auth();
Route::get('/','UserController@welcome');
Route::get('/invite/open','InviteController@inviteOpen');

// Protected Web routes
Route::get('/home', 'HomeController@index');

/*
|--------------------------------------------------------------------------
| API endpoint Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the API endpoint routes for an application.
|
*/

// Open API routes

Route::group(['prefix' => 'api'],function(){

    //Registration & login related requests
    Route::post('register','RegistrationController@register');
    Route::get('login','UserController@login');

    //Search user info by GL code

    //Open invite request


});

// Protected API routes

Route::group(['prefix' => 'api', 'middleware' => 'auth:api'], function () {

    // User related requests
    Route::get('user/profile/{id}','UserController@show');
    Route::put('user/profile/edit','UserController@edit');
    Route::get('user/trees','UserController@allplants');

    // Plant related requests
    Route::post('plant/create','PlantController@create');
    Route::get('plant/profile/{id}','PlantController@show');
    Route::put('plant/profile/{id}','PlantController@edit');

});
