<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api', 'middleware' => 'auth:api'], function () {

    /*
     * ---------------
     * Organisers
     * ---------------
     */


    /*
     * ---------------
     * Events
     * ---------------
     */
    Route::resource('events', API\EventsApiController::class);


    /*
     * ---------------
     * Attendees
     * ---------------
     */
    Route::resource('attendees', API\AttendeesApiController::class);


    /*
     * ---------------
     * Orders
     * ---------------
     */

    /*
     * ---------------
     * Users
     * ---------------
     */

    /*
     * ---------------
     * Check-In / Check-Out
     * ---------------
     */


    Route::get('/', function () {
        return response()->json([
            'Hello' => Auth::guard('api')->user()->full_name . '!'
        ]);
    });


});