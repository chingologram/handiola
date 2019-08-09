<?php


Route::get('/', 'HomeController@inicio')->name('/');
Route::get('registro', 'HomeController@registro')->name('registro');
Route::get('login', 'HomeController@login')->name('login');
Route::get('calcularReserva', 'HomeController@calcularReserva')->name('calcularReserva');
Route::get('contacto', 'HomeController@contacto')->name('contacto');
Route::post('get_locationsCSV','HomeController@get_locationsCSV')->name('get_locationsCSV');
Route::post('get_price','HomeController@get_price')->name('get_price');
Route::post('save_reserva','HomeController@save_reserva')->name('save_reserva');
Route::post('get_reserva','HomeController@get_reserva')->name('get_reserva');
//route for get locations from google maps AppendIterator
Route::post('get_locations','HomeController@get_locations')->name('get_locations');
Route::get('Reserva','HomeController@Reserva')->name('Reserva');
Route::get('Reservas','HomeController@Reservas')->name('Reservas');
Route::post('logininit','Auth\LoginController@login')->name('logininit');
Route::get('logout','Auth\LoginController@logout')->name('logout');
Route::get('redirectgo', 'Auth\LoginController@redirectToProvider');
Route::get('logdas', 'Auth\LoginController@handleProviderCallback');
//callbackFacebook
Route::get('facebook', 'facecontroller@redirectToProvider');
Route::get('callbackFacebook', 'facecontroller@handleProviderCallback')->name('callbackFacebook');
Route::post('agregar_usuario','HomeController@agregar_usuario')->name('agregar_usuario');
//contacts
Route::post('enviar_formulario','HomeController@enviar_formulario')->name('enviar_formulario');
Route::get('terminos_y_condiciones','HomeController@terminos_y_condiciones')->name('terminos_y_condiciones');
//
Route::post('GuardarCambios','HomeController@GuardarCambios')->name('GuardarCambios');

//dolaro
Route::post('setDolar','HomeController@setDolar')->name('setDolar');
//status
Route::post('setStatus','HomeController@setStatus')->name('setStatus');

Route::post('get_status','HomeController@get_status')->name('get_status');
// Mercado pago

Route::get('status_success','HomeController@status_success')->name('status_success');
Route::get('set_telefono','HomeController@set_telefono')->name('set_telefono');
