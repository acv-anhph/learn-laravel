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

Route::get('khoahoc', function () {
    return 'khoahoc';
})->middleware('checkage');

Route::get('/hello-world/{year}/{yourname?}', function($year, $yourname = null){
    $hello_string = '';
    if($yourname == null){
        $hello_string = 'Hello world, ' . $year;
    }else{
        $hello_string = 'Hello world, ' . $year . '. My name is ' . $yourname;
    }
    return view('hello-world')->with('hello_str', $hello_string);
});

Route::get('/role',[
    'middleware' => 'role:superadmin',
    'uses' => 'MainController@checkRole',
]);

Route::get('/tintuc/{news_id_string}', 'MainController@shownews');

Route::resource('/photos', 'PhotoController');

Route::get('category/laravel-nang-cao', 'MainController@uriTest');

Route::get('contact', 'ContactController@showContactForm');

Route::post('contact', 'ContactController@insertMessage');