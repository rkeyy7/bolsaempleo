<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\OfferController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {return view('welcome');})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('offers', OfferController::class);
});


// Route::get('/offers', [OfferController::class, 'index'])->name('offers.create');

// Route::get('/offers/create', [OfferController::class, 'create'])->name('offers.create');

// Route::post('/offers', [OfferController::class, 'store'])->name('store')->middleware('auth');

// Route::get('/offers/{offer}', [OfferController::class, 'show'])->name('show');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});


     
require __DIR__.'/auth.php';
