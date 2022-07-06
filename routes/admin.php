<?php

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;



Route::resource('events', EventController::class)->names('admin.events');
Route::post('/events/store', [App\Http\Controllers\Admin\EventController::class, 'admin.events.store']);
Route::resource('users', UserController::class)->names('admin.users');
Route::resource('tags', TagController::class)->names('admin.tags');
Route::resource('reports', ReportController::class)->names('admin.reports');
 
 //Route::resource('photos', PhotoController::class)->names('admin.photos');