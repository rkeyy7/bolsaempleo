<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FileController;

Route::get('/', function () {return view('welcome');})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('offers', OfferController::class);
});

// Route::get('/offers', [OfferController::class, 'index'])->name('offers.create');

// Route::get('/offers/create', [OfferController::class, 'create'])->name('offers.create');

// Route::post('/offers', [OfferController::class, 'store'])->name('store')->middleware('auth');

// Route::get('/offers/{offer}', [OfferController::class, 'show'])->name('show');

Route::middleware('auth')->group(function () {

    Route::post('/files/upload', [FileController::class, 'uploadfile'])->name('files.upload');

    // Ruta para postularse a un trabajo
    Route::post('/applications/apply/{offer}', [ApplicationController::class, 'apply'])->name('applications.apply');

    // Ruta para ver las postulaciones de un trabajo
    Route::get('/offers/{offer}/applications', [ApplicationController::class, 'showApplications'])->name('applications.index');

    // Ruta para descargar el archivo de una postulación
    Route::get('/applications/{application}/download', [ApplicationController::class, 'downloadFile'])->name('applications.download');
    });
    
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});



     
require __DIR__.'/auth.php';
