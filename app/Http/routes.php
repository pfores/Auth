<?php

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

Route::get('/login',
    ['as' => 'auth.login', 'uses' =>  'LoginController@getLogin']);
Route::post('/postLogin', ['as' => 'auth.postLogin', 'uses' => 'LoginController@postLogin']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',['as' => 'auth.home',function () {
    return view('home');
}]);

Route::get('/resource', function () {
    $authenticated = false;
    Session::set('authenticated',false);
    //dd(Session::all());
    if (Session::has('authenticated')) {
        if (Session::get('authenticated') == true ) {
            $authenticated = true;
        }
    }

    if ($authenticated) {
        return view('resource');
    } else {
        return redirect()->route('auth.login');
    }

});


Route::get('/flushSession',
    ['as' => 'session.flush',
        function() {
            Session::flush();
        }]
);

Route::get('/register',
    ['as' => 'auth.register', 'uses' =>  'RegisterController@getRegister']
);

Route::post('/register',
    ['as' => 'register.postRegister', 'uses' =>  'RegisterController@postRegister']
);