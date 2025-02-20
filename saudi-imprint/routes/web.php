<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TourGuideController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredTG;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/login', function () {
    return view('login');
})->middleware(['auth', 'verified'])->name('login');

Route::get('/TourGuide/dashboard', [TourGuideController::class,'dashboard'])->name('TourGuide.dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
 
});





Route::get('/Admin/dashboard', [AdminController::class,'dashboard'])->name('Admin.dashboard');
Route::put('/Admin/tour-guides/{tourGuide}/approve', [AdminController::class, 'approveTG'])->name('admin.tour-guides.approve');
Route::put('/Admin/tour-guides/{tourGuide}/reject', [AdminController::class, 'rejectTG'])->name('admin.tour-guides.reject');

    
Route::get('registerTG', [RegisteredTG::class, 'showTGregisterform'])
->name('registerTG');
Route::post('registerTG', [RegisteredTG::class, 'store']);  

require __DIR__.'/auth.php';
