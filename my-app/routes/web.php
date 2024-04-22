<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\CompanyCRUD;

Route::resource('companies', CompanyCRUD::class);

Route::get('/', function () {
    return view('welcome');
});
