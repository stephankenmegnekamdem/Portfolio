<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/education', [PageController::class, 'education'])->name('education');
Route::get('/work', [PageController::class, 'work'])->name('work');
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::get('/certifications', [PageController::class, 'certifications'])->name('certifications');
Route::get('/cv', [PageController::class, 'cv'])->name('cv');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
