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

Route::get('/', function () {
    return view('welcome', [
        'videos' => \App\Video::all()
            ->where('published', true)
            ->sortBy('public'),
        'courses' => \App\Course::all(),
        'notes' => \App\Note::all()
    ]);
})->name('welcome');

Route::get('about', function () {
    return view('about');
})->name('about');

Auth::routes();

Route::prefix('home')->middleware(['auth'])->group(function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('contact/edit', 'HomeController@editContact')->name('home.contact.edit');

    Route::put('contact/update', 'HomeController@updateContact')->name('home.contact.update');

});

Route::resource('teacher', 'TeacherController')->only(['index', 'show']);

Route::prefix('video/{video}')->middleware(['auth'])->group(function () {

    Route::get('order', 'VideoController@order')->name('video.order');

});

Route::prefix('course/{course}')->middleware(['auth'])->group(function () {

    Route::get('order', 'CourseController@order')->name('course.order');

});

Route::resource('video', 'VideoController')->only(['index', 'show']);

Route::resource('course', 'CourseController')->only(['index', 'show']);

Route::resource('note', 'NoteController')->only(['show']);

Route::prefix('subscription')->middleware(['auth'])->group(function () {

    Route::get('process/{id}', 'SubscriptionController@process')->name('subscription.process');

    Route::get('confirm/{id}', 'SubscriptionController@confirm')->name('subscription.confirm');

    Route::get('abandon/{id}', 'SubscriptionController@abandon')->name('subscription.abandon');

});

Route::resource('tag', 'TagController')->only(['show']);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
