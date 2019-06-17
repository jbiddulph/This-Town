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

Route::get('/', 'JobController@index');
Route::get('/events', 'EventController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/jobs/{id}/{job}','JobController@show')->name('jobs.show');
Route::get('/events/{id}/{event}','EventController@show')->name('events.show');

//Company
Route::get('/company/{id}/{company}','CompanyController@index')->name('company.index');

//Venue
Route::get('/venue/{id}/{venue}','VenueController@index')->name('venue.index');

//User Profile
Route::get('user/profile', 'UserprofileController@index');
Route::post('user/profile/create', 'UserprofileController@store')->name('profile.create');
Route::post('user/coverletter', 'UserprofileController@coverletter')->name('cover.letter');
Route::post('user/resume', 'UserprofileController@resume')->name('resume');
Route::post('user/avatar', 'UserprofileController@avatar')->name('avatar');
