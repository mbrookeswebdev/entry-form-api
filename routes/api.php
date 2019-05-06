<?php

use Illuminate\Support\Facades\Route;

//route to store form data using cors middleware
Route::apiResource('/store', 'Api\DataController')->middleware('cors');
