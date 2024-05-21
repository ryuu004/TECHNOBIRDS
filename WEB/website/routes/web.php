<?php

use Illuminate\Support\Facades\Route;

// Route for the homepage
Route::get('/home', function () {
    return view('ecommerce-homepage');
});

// Route for the shopnow page
Route::get('/shopnow', function () {
    return view('shopnow');
})->name('shopnow');

// Route for the processor page
Route::get('/processor', function () {
    return view('processor');
})->name('processor');

// Route for the newsletter page
Route::get('/newsletter', function () {
    return view('newsletter');
})->name('newsletter');

// Route for the productreviews page
Route::get('/productreviews', function () {
    return view('productreviews');
})->name('productreviews');

// Route for the support page
Route::get('/support', function () {
    return view('support');
})->name('support');