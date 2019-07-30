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

Route::get('/', 'HomeController@index');

Route::get('/town/{town}', 'HomeController@main');

//Jobs
Route::get('{town}/jobs', 'JobController@index');
Route::get('jobs/create', 'JobController@create')->name('job.create');
Route::post('jobs/create', 'JobController@store')->name('job.store');
Route::get('jobs/{id}/edit', 'JobController@edit')->name('job.edit');
Route::post('jobs/{id}/edit', 'JobController@update')->name('job.update');
Route::get('jobs/my-jobs', 'JobController@myjob')->name('my.job');
Route::get('jobs/applications', 'JobController@applicant')->name('applicant');
Route::get('{town}/jobs/alljobs', 'JobController@allJobs')->name('alljobs');

//Events
Route::get('{town}/events', 'EventController@index');
Route::get('events/create', 'EventController@create')->name('event.create');
Route::post('events/create', 'EventController@store')->name('event.store');
Route::get('events/{id}/edit', 'EventController@edit')->name('event.edit');
Route::post('events/{id}/edit', 'EventController@update')->name('event.update');
Route::get('events/my-events', 'EventController@myevent')->name('my.event');
Route::get('{town}/events/allevents', 'EventController@allEvents')->name('allevents');

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


Route::get('manager/register/{venue}', 'ManagerRegisterController@managerRegister1')->name('man.register');
Route::post('manager/register/{venue}', 'ManagerRegisterController@managerRegister1Post')->name('man.register.post');


//Applications and interests
Route::post('applications/{id}', 'JobController@apply')->name('apply');
Route::post('interest/{id}', 'EventController@showInterest')->name('showInterest');
Route::post('attending/{id}', 'EventController@checkAttending')->name('checkAttending');


//Save unsave jobs
Route::post('/savejob/{id}', 'FavouritejobController@saveJob');
Route::post('/unsavejob/{id}', 'FavouritejobController@unSaveJob');

//Save unsave events
Route::post('/saveevent/{id}', 'FavouriteeventController@saveEvent');
Route::post('/unsaveevent/{id}', 'FavouriteeventController@unSaveEvent');


//ADMIN
Route::get('dashboard','DashboardController@index')->middleware('admin');
Route::get('dashboard/create','DashboardController@create')->middleware('admin');
Route::post('dashboard/create','DashboardController@store')->name('post.store')->middleware('admin');
Route::post('dashboard/destroy','DashboardController@destroy')->name('post.delete')->middleware('admin');
Route::get('dashboard/{id}/edit','DashboardController@edit')->name('post.edit')->middleware('admin');
Route::post('dashboard/{id}/update','DashboardController@update')->name('post.update')->middleware('admin');
Route::get('dashboard/trash','DashboardController@trash')->middleware('admin');
Route::get('dashboard/{id}/trash','DashboardController@restore')->name('post.restore')->middleware('admin');
Route::get('dashboard/{id}/toggle','DashboardController@toggle')->name('post.toggle')->middleware('admin');
Route::get('/posts/{id}/{slug}','DashboardController@show')->name('post.show');
