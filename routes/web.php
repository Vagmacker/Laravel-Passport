<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use GuzzleHttp\Client;
use Illuminate\Http\Request;

Route::get('/', function () {
    $query = http_build_query([
        'client_id' => 3,
        'redirect_uri' => 'http://localhost:8087/callback',
        'response_type' => "code",
        'scope'=> ''
    ]);

    return redirect("http://localhost:8000/oauth/authorize?$query");
});

Route::get('callback', function(Request $request) {
    $code = $request->get('code');

    $http = new Client(); /* \GuzzleHttp\Client */

    $response = $http->post('http://localhost:8000/oauth/token', [
        'form_params' => [
            'client_id' => 3,
            'client_secret' => 'hEP3weXYiYbKeTydEkzmm8Wso5R283nuz1bZa4q9',
            'redirect_uri' => 'http://localhost:8087/callback',
            'code' => $code,
            'grant_type' => 'authorization_code'
        ]
    ]);

    dd(json_decode($response->getBody(), true));
});

Auth::routes();

Route::get('/home', 'HomeController@index');
