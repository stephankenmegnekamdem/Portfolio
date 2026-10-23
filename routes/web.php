<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::get('/cv', [PageController::class, 'cv'])->name('cv');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])
    ->middleware('throttle:2,1')
    ->name('contact.send');
