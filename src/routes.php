<?php
Route::group(['middleware' => 'web'], function () {
    Route::post('/form-submit', "Kris\LaravelFormBuilder\FormController@send")->name('kris.form-submit');
});