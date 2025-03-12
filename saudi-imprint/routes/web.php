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

Route::get('/riyadh', function () {
    return view('destinations.riyadh');
})->name('riyadh');

Route::get('/aljouf', function () {
    return view('destinations.aljouf');
})->name('aljouf');

Route::get('/alula', function () {
    return view('destinations.alula');
})->name('alula');

Route::get('/jeddah', function () {
    return view('destinations.jeddah');
})->name('jeddah');

Route::get('/welcome', function () {
    return view('welcome');
})->name('home');

//Route::get('/register', function () {
    //return view('auth.register');
//})->name('register');
Route::get('/signupT', function () {
    return view('auth.signupT');
})->name('signupT');

Route::get('/loginT', function () {
    return view('auth.loginT');
})->name('loginT');

Route::get('/signupTG', function () {
    return view('auth.signupTG');
})->name('signupTG');

Route::get('/loginTG', function () {
    return view('auth.loginTG');
})->name('loginTG');

//Guided Tours in Riyadh
Route::get('/riyadhDesertSafari', function () {
    return view('Guided Tours.riyadhDesertSafari');
})->name('riyadhDesertSafari');

Route::get('/riyadhCampingAdventure', function () {
    return view('Guided Tours.riyadhCampingAdventure');
})->name('riyadhCampingAdventure');

Route::get('/riyadhHike', function () {
    return view('Guided Tours.riyadhHike');
})->name('riyadhHike');

Route::get('/UmAlheshLake', function () {
    return view('Guided Tours.UmAlheshLake');
})->name('UmAlheshLake');

//Things to do in Riyadh
Route::get('/riyadhSouqTaibah', function () {
    return view('Things To Do.riyadhSouqTaibah');
})->name('riyadhSouqTaibah');

Route::get('/riyadhRawdatTinhat', function () {
    return view('Things To Do.riyadhRawdatTinhat');
})->name('riyadhRawdatTinhat');

Route::get('/riyadhAlSubaiePalace', function () {
    return view('Things To Do.riyadhAlSubaiePalace');
})->name('riyadhAlSubaiePalace');

Route::get('/riyadhVia', function () {
    return view('Things To Do.riyadhVia');
})->name('riyadhVia');


//Guided Tours in Jeddah
Route::get('/Guided Tours.jeddahBayada', function () {
    return view('Guided Tours.jeddahBayada');
})->name('Guided Tours.jeddahBayada');

Route::get('/Guided Tours.jeddahDivingAdventure', function () {
    return view('Guided Tours.jeddahDivingAdventure');
})->name('Guided Tours.jeddahDivingAdventure');

Route::get('/Guided Tours.jeddahHistoricJeddah', function () {
    return view('Guided Tours.jeddahHistoricJeddah');
})->name('Guided Tours.jeddahHistoricJeddah');

Route::get('/Guided Tours.jeddahFishing', function () {
    return view('Guided Tours.jeddahFishing');
})->name('Guided Tours.jeddahFishing');

//Guided Tours in Aljouf
Route::get('/Guided Tours.aljoufRegionalMuseum', function () {
    return view('Guided Tours.aljoufRegionalMuseum');
})->name('Guided Tours.aljoufRegionalMuseum');

Route::get('/Guided Tours.aljoufZabalCastle', function () {
    return view('Guided Tours.aljoufZabalCastle');
})->name('Guided Tours.aljoufZabalCastle');

Route::get('/Guided Tours.aljoufFahdMuseum', function () {
    return view('Guided Tours.aljoufFahdMuseum');
})->name('Guided Tours.aljoufFahdMuseum');

Route::get('/Guided Tours.aljoufLake', function () {
    return view('Guided Tours.aljoufLake');
})->name('Guided Tours.aljoufLake');

//Guided Tours in AlUla
Route::get('/Guided Tours.alulaGharameelStargazing', function () {
    return view('Guided Tours.alulaGharameelStargazing');
})->name('Guided Tours.alulaGharameelStargazing');

Route::get('/Guided Tours.alulaElephantRock', function () {
    return view('Guided Tours.alulaElephantRock');
})->name('Guided Tours.alulaElephantRock');

Route::get('/Guided Tours.alulaDadan', function () {
    return view('Guided Tours.alulaDadan');
})->name('Guided Tours.alulaDadan');

Route::get('/Guided Tours.alulaOldTown', function () {
    return view('Guided Tours.alulaOldTown');
})->name('Guided Tours.alulaOldTown');