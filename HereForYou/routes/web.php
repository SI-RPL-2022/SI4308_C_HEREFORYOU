<?php

use App\Mail\SendNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::middleware(['auth','isadmin'])->group(function () {
    Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
        Route::get('/','DashboardController')->name('dashboard');
        Route::resource('users',UserController::class);
        Route::resource('banks',BankController::class)->except('show');
        Route::get('banks/{id}/set','BankController@setStatus')->name('banks.set-status');
        Route::resource('bookings',BookingController::class)->except('show');
        Route::get('bookings/{id}/set','BookingController@setStatus')->name('bookings.set-status');
        Route::resource('psychologists',PsychologistController::class);
        Route::get('psychologist/{id}/schedule/create','PsychologistScheduleController@create')->name('schedules.create');
        Route::post('psychologist/{id}/schedule/create','PsychologistScheduleController@store')->name('schedules.store');
        Route::get('psychologist/{psycholofist_id}/schedule/{id}/edit','PsychologistScheduleController@edit')->name('schedules.edit');
        Route::patch('psychologist/schedule/{id}/edit','PsychologistScheduleController@update')->name('schedules.update');
        Route::delete('psychologist/schedule/{id}/delete','PsychologistScheduleController@destroy')->name('schedules.destroy');
        Route::get('profile','ProfileController@show')->name('profile');
        Route::post('profile','ProfileController@update')->name('profile.update');

    });
});
Route::get('/','HomeController@index')->name('home');
Route::get('/consultations', 'ConsultationController@index')->name('consultations.index');
Route::get('/consultations/{id}', 'ConsultationController@show')->name('consultations.show');
Route::get('/booking/{id}/process','BookingController@create')->name('booking.create');
Route::middleware('auth')->group(function(){
    Route::get('/history', 'HistoryController@index')->name('history.index');
    Route::post('/consultation/rating', 'ConsultationController@rating')->name('consultation.rating');
    Route::post('/booking/process','BookingController@store')->name('booking.store');
    Route::get('/booking/{number}/success','BookingController@success')->name('booking.success');

    // profile
    Route::get('my-profile','ProfileController@index')->name('profile.index');
    Route::post('my-profile','ProfileController@update')->name('profile.update');

    // notification
    Route::get('notifications','NotificationController@index')->name('notifications.index');
    Route::post('notifications','NotificationController@update')->name('notifications.update');

    // download invoice
    Route::get('invoice/{id}','HistoryController@invoice')->name('invoice');
});

Route::get('/test',function(){
    return view('admin.pages.email.notification');
});
