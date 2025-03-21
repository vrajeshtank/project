<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     $user = User::select('name', 'email')->get();
//     return view('dashboard' , compact('user'));
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::any('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::any('/bussiness', [BusinessController::class, 'index'])->name('bussiness');
    Route::any('/editform', [BusinessController::class, 'editform'])->name('editform');
    Route::any('/Addbusiness/{id?}', [BusinessController::class, 'Addbusiness'])->name('Addbusiness');
    Route::any('/deletebussiness/{id}', [BusinessController::class, 'deletebussiness'])->name('deletebussiness');

    Route::any('/Locationdetail', [LocationController::class, 'index'])->name('locationdetail');
    Route::any('/location-form', [LocationController::class, 'locationform'])->name('locationform');
    Route::any('/savelocationdata/{id?}', [LocationController::class, 'savelocationdata'])->name('savelocationdata');
    Route::any('/deletelocationdata/{id}', [LocationController::class, 'deletelocationdata'])->name('deletelocationdata');
   
  
});
require __DIR__.'/auth.php';
