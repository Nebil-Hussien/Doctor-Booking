<?php
use Illuminate\Support\Facades\Route;

Route::get('/' , function (){

    return view('web.pages.index');

})->name('home');
