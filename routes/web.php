<?php

use Illuminate\Notifications\Mail;
use App\Mail\NewUserWelcomeMail;
use Illuminate\Support\Facades\Input;
use App\User;
use Illuminate\Http\Request;




Auth::routes();


Route::get('/email',function (){

  return new NewUserWelcomeMail();
});




Route::post( '/sql', function () {
    $q = Request( 'q' );
    $user = User::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->get ();
    if (count ( $user ) > 0)
        return view ( 'xss.sql' )->withDetails ( $user )->withQuery ( $q );
    else
        return view ( 'xss.sql' )->withMessage ( 'No Details found. Try to search again !' );
} );


Route::get('/profile/{}','XssController@index');
Route::get('/xss','XssController@index');
Route::get('/sql','SqlController@index');


Route::get ( '/v/e/c/t/o/r/c/t/f', 'VectorController@index');

Route::post('follow/{user}', 'FollowsController@store');
Route::get('/', );

Route::get('/p/create', 'PostsController@create');
Route::post('/p', 'PostsController@store');
Route::get('/', 'PostsController@index');
Route::get('/p/{post}', 'PostsController@show');

Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');
