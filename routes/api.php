<?php

use Illuminate\Http\Request;

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register','RegisterController@register');

Route::group(['prefix'=>'students'], function(){
    Route::get('/', 'StudentController@index');
    Route::get('/{student}', 'StudentController@show');
    Route::post('/','StudentController@store')->middleware('auth:api');
    Route::put('/{student}','StudentController@update')->middleware('auth:api');
    Route::delete('/{student}','StudentController@destroy')->middleware('auth:api');
});

Route::group(['prefix'=>'courses'], function(){
    Route::get('/','CourseController@index');
    Route::get('{course}','CourseController@show');
    Route::post('/','CourseController@store')->middleware('auth:api');
    Route::put('/{course}','CourseController@update')->middleware('auth:api');
    Route::delete('/{course}','CourseController@destroy')->middleware('auth:api');
});

Route::group(['prefix'=>'students_courses'], function(){
    Route::get('/','Students_CoursesController@index');
    Route::post('/','Students_CoursesController@store')->middleware('auth:api');
});