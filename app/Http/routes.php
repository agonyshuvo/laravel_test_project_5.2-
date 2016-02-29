<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/all_user',function(){
	return view('all_user');
});

Route::get('all_user/{id}/{name}',function($id,$name){      // Here we pass the peremeter in url all_user
	return 'User '.$id." ".$name;                         // with the parameter id and name
});

Route::get('home','basicController@index'); // Here Home is the URL and it 
                                            //execute the basiccontroller index page
Route::get('about','basicController@about');

Route::resource('course','courseController');


Route::group(['middleware' => ['web']], function () {
Route::get('auth/login', 'Auth\AuthController@getLogin');
//Route::post('auth/login', array('as'=>'auth.login','uses'=>'Auth\AuthController@postLogin'));
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', array('as'=>'auth.register','uses'=>'Auth\AuthController@postRegister'));
Route::post('auth/register', 'Auth\AuthController@postRegister');
});


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
