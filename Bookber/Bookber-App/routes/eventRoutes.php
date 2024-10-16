<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('view-events', [EventController::class, 'index'])->name('events.index');
Route::get('get-event/{id}', [EventController::class, 'showEvent'])->name('events.show');