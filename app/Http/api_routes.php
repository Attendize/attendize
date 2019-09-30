<?php

Route::group(['prefix' => 'api'], function () {

    Route::get('category/{parent_id?}','API\PublicController@getCategories');
    Route::get('events/{cat_id?}','API\PublicController@getEvents');

    Route::group(['prefix' =>'admin', 'middleware' => 'auth:api'], function (){
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
    Route::resource('events', 'API\EventsApiController');


    /*
     * ---------------
     * Attendees
     * ---------------
     */
    Route::resource('attendees', 'API\AttendeesApiController');


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


    //    Route::get('/', function () {
    //        return response()->json([
    //            'Hello' => Auth::guard('api')->user()->full_name . '!'
    //        ]);
    //    });
    });

});