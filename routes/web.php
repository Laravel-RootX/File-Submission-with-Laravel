<?php

use Illuminate\Support\Facades\Route;


Route::get('/','DashboardController@index');

Route::resource('/files', 'FilesController')->except(['show']);
