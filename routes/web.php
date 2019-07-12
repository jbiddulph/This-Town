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

//Jobs
Route::get('/', 'JobController@index');
Route::get('jobs/create', 'JobController@create')->name('job.create');
Route::post('jobs/create', 'JobController@store')->name('job.store');
Route::get('jobs/{id}/edit', 'JobController@edit')->name('job.edit');
Route::post('jobs/{id}/edit', 'JobController@update')->name('job.update');
Route::get('jobs/my-jobs', 'JobController@myjob')->name('my.job');
Route::get('jobs/applications', 'JobController@applicant')->name('applicant');
Route::get('jobs/alljobs', 'JobController@allJobs')->name('alljobs');

//Events
Route::get('events', 'EventController@index');
Route::get('events/create', 'EventController@create')->name('event.create');
Route::post('events/create', 'EventController@store')->name('event.store');
Route::get('events/{id}/edit', 'EventController@edit')->name('event.edit');
Route::post('events/{id}/edit', 'EventController@update')->name('event.update');
Route::get('events/my-events', 'EventController@myevent')->name('my.event');
Route::get('events/allevents', 'EventController@allEvents')->name('allevents');

Route::get('events/interest-attending', 'EventController@interestsAttending')->name('intatt');
Route::get('events/interests', 'EventController@showInterests')->name('interests');
Route::get('events/attending', 'EventController@showAttending')->name('attending');



Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::get('jobs/{id}/{job}','JobController@show')->name('jobs.show');
Route::get('events/{id}/{event}','EventController@show')->name('events.show');

//Company
Route::get('company/{id}/{company}','CompanyController@index')->name('company.index');
Route::get('company/create','CompanyController@create')->name('company.view');
Route::post('company/create','CompanyController@store')->name('company.store');
Route::post('company/coverphoto','CompanyController@coverPhoto')->name('ccover.photo');
Route::post('company/logo','CompanyController@companyLogo')->name('company.logo');

//Venue
Route::get('venue/{id}/{venue}','VenueController@index')->name('venue.index');
Route::get('venue/create','VenueController@create')->name('venue.view');
Route::post('venue/create','VenueController@store')->name('venue.store');
Route::post('venue/coverphoto','VenueController@coverPhoto')->name('vcover.photo');
Route::post('venue/logo','VenueController@venueLogo')->name('venue.logo');

//User Profile
Route::get('user/profile', 'UserprofileController@index')->name('profile.view');
Route::post('user/profile/create', 'UserprofileController@store')->name('profile.create');
Route::post('user/coverletter', 'UserprofileController@coverletter')->name('cover.letter');
Route::post('user/resume', 'UserprofileController@resume')->name('resume');
Route::post('user/avatar', 'UserprofileController@avatar')->name('avatar');

//Employer view
Route::view('employer/register', 'auth.employer-register')->name('employer.register');
Route::post('employer/register', 'EmployerRegisterController@employerRegister')->name('emp.register');

//Venue view
Route::view('manager/register', 'auth.manager-register')->name('manager.register');
Route::post('manager/register', 'ManagerRegisterController@managerRegister')->name('man.register');

//Applications and interests
Route::post('applications/{id}', 'JobController@apply')->name('apply');
Route::post('interest/{id}', 'EventController@showInterest')->name('showInterest');
Route::post('attending/{id}', 'EventController@checkAttending')->name('checkAttending');