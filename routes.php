<?php

use Illuminate\Support\Facades\Route;

Route::prefix('laravel-translations')->group(function (){

    $controllersPath = 'Aegued\LaravelTranslations\Controllers';

    Route::get('', $controllersPath . '\AdminController@index');
    Route::get('translations/{model}', $controllersPath . '\AdminController@showTranslations')
        ->name('translations.show');
    Route::post('translations/{model}/{id}/{attribute}', $controllersPath . '\AdminController@saveTranslations')
        ->name('translations.store');

});

