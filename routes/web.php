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
    return redirect('dashboard');
});

Route::get('dashboard', function () {
    return view('dashboard');
});

Route::prefix('projects')->group(function() {

    Route::get('', 'Web\ProjectsController@index')->name('index');
    Route::get('create', 'Web\ProjectsController@create')->name('create-project');
    Route::post('store', 'Web\ProjectsController@store')->name('store-project');

    Route::prefix('{project}')->group(function() {

        Route::get('', 'Web\ProjectsController@show')->name('show-project');

        Route::prefix('tests')->group(function() {

            Route::get('', 'Web\TestsController@index')->name('project');
            Route::get('create', 'Web\TestsController@create')->name('create');
            Route::post('store', 'Web\TestsController@store')->name('store');

            Route::prefix('{test}')->group(function() {

                Route::get('', 'Web\TestsController@show')->name('tests');
                Route::post('store', 'Web\TestsController@storeTestData')->name('store-test-data');
            });
        });

    });
    Route::get('{project}/create', 'Web\TestsController@create')->name('create-test');

});

Route::prefix('tests')->group(function() {

    Route::get('', 'Web\TestsController@index')->name('index');
    Route::get('create', 'Web\TestsController@create')->name('create');
    Route::post('store', 'Web\TestsController@store')->name('store');
});
