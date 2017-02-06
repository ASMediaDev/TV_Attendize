<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/redirect', function () {
    $query = http_build_query([
        'client_id' => 'client-id',
        'redirect_uri' => 'http://example.com/callback',
        'response_type' => 'code',
        'scope' => '',
    ]);

    return redirect('http://laravel.ticketval.de/oauth/authorize?'.$query);
});

Route::get('/secured', 'TicketValAPIController@test')->middleware('auth:api');

Route::get('/getEvents', 'TicketValAPIController@getEvents')->middleware('auth:api');

Route::get('/validateToken', 'TokenValidationController@validateToken')->middleware('auth:api');

Route::get('/getAttendees/{eventid}', 'TicketValAPIController@getAttendees')->middleware('auth:api');

Route::get('/test', function(){

   return "unsecure";
});

Route::post('/login', 'LoginController@login');