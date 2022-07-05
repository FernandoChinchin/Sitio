<?php

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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        Route::get('/medico', 'PersonController@index')->name('medico.index');
        Route::get('/medico/cargarDatos', 'PersonController@cargarDatos')->name('data');
        Route::get('/medico/{id}/edit', 'PersonController@edit')->name('medico.edit');
        Route::Delete('/medico/eliminar/{id}', 'PersonController@eliminar')->name('medico.eliminar');
        Route::post('/medico/actulizar', 'PersonController@actulizar')->name('company.actulizar');
        Route::resource('persona', PersonController::class);
    
    //Especialidad
    Route::get('/especialidad', 'EspecialidadController@index')->name('especialidad.index');
    Route::get('/especialidad/cargarDatos', 'EspecialidadController@cargarDatos')->name('data');
    Route::get('/especialidad/{id}/edit', 'EspecialidadController@edit')->name('especialidad.edit');
    Route::Delete('/especialidad/eliminar/{id}', 'EspecialidadController@eliminar')->name('especialidad.eliminar');
    Route::post('/especialidad/actulizar', 'EspecialidadController@actulizar')->name('especialidad.actulizar');
    Route::resource('especialidad', EspecialidadController::class);
    
    });
});
