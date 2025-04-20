<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TourGuideController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredTG;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TwoFactorController;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [BookingController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');



Route::get('/loginTG', function () {
    return view('auth.loginTG');
})->name('loginTG');

Route::redirect('/login', '/loginTG')->name('login');


Route::get('/otp/send', [App\Http\Controllers\TwoFactorController::class, 'sendOTP'])->name('otp.send');
Route::get('/otp/resend', [App\Http\Controllers\TwoFactorController::class, 'sendOTP'])->name('otp.resend');
Route::get('/otp/verify', [App\Http\Controllers\TwoFactorController::class, 'showVerifyForm'])->name('otp.verify');
Route::post('/otp/verify', [App\Http\Controllers\TwoFactorController::class, 'verifyOTP'])->name('otp.verify.post');

// Route::middleware(['auth'])->group(function () {
    Route::get('/TourGuide/pending_approval', [TourGuideController::class, 'pendingApproval'])->name('TourGuide.pending_approval');
    Route::get('/TourGuide/rejected', [TourGuideController::class, 'rejected'])->name('TourGuide.rejected');
    Route::get('/TourGuide/complete_profile', [TourGuideController::class, 'showCompleteProfileForm'])->name('TourGuide.complete_profile');
    Route::post('/TourGuide/complete_profile', [TourGuideController::class, 'saveCompleteProfile'])->name('TourGuide.save_profile');



Route::middleware(['auth', 'profile.completed'])->group(function () {
    Route::get('/TourGuide/dashboard', [TourGuideController::class, 'dashboard'])->name('TourGuide.dashboard');


    Route::get('/add_tour', function () { return view('TourGuide.add_tour');})->name('add_tour');});
    
    Route::post('/TourGuide/update-profile', [TourGuideController::class, 'updateProfile'])->name('TourGuide.updateProfile');    




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //pass update
    Route::put('/password', [PasswordController::class, 'update'])->name('password.update');

 
});





Route::get('/Admin/dashboard', [AdminController::class,'dashboard'])->name('Admin.dashboard');
Route::put('/Admin/tour-guides/{tourGuide}/approve', [AdminController::class, 'approveTG'])->name('admin.tour-guides.approve');
Route::put('/Admin/tour-guides/{tourGuide}/reject', [AdminController::class, 'rejectTG'])->name('admin.tour-guides.reject');

    
Route::get('registerTG', [RegisteredTG::class, 'showTGregisterform'])
->name('registerTG');
Route::post('registerTG', [RegisteredTG::class, 'store']);  



 /*Route::get('/riyadh', function () {
     return view('destinations.riyadh');
 })->name('riyadh');*/

//routes for tour
Route::get('/riyadh', [TourController::class, 'riyadh'])->name('riyadh');
Route::get('/aljouf', [TourController::class, 'aljouf'])->name('aljouf');
Route::get('/alula', [TourController::class, 'alula'])->name( 'alula');
Route::get('/jeddah', [TourController::class, 'jeddah'])->name('jeddah');

Route::post('/store', [TourController::class, 'store'])->name('tours.store');
//Route::get('/TourGuide/dashboard{tour}', [TourController::class, 'show'])->name('tours.show');

Route::get('TourGuide/dashboard/{tour}/edit', [TourController::class, 'edit'])->name('tours.edit');
Route::put('TourGuide/dashboard/{tour}', [TourController::class, 'update'])->name('tours.update');
Route::delete('TourGuide/dashboard/{tour}', [TourController::class, 'destroy'])->name('tours.destroy');



Route::middleware(['auth'])->group(function () {
    //display booking form
    Route::get('/tours/{tour}/book', [BookingController::class, 'create'])->name('bookings.create');
    
    //process bookng form submession
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    //confirmation page
    Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
    Route::get('/my-bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');

    Route::get('/bookings/{booking}/payment', [BookingController::class, 'payment'])->name('bookings.payment');
    Route::post('/bookings/{booking}/process-payment', [BookingController::class, 'processPayment'])->name('bookings.processPayment');
    Route::get('/bookings/{booking}/process-payment', [BookingController::class, 'processPayment'])->name('bookings.processPayment');


});

 /*Route::get('/aljouf', function () {
     return view('destinations.aljouf');
})->name('aljouf');

 Route::get('/alula', function () {
     return view('destinations.alula');
 })->name('alula');

Route::get('/jeddah', function () {
    return view('destinations.jeddah');
 })->name('jeddah');*/

Route::get('/welcome', function () {
    return view('welcome');
})->name('home');

//Route::get('/register', function () {
    //return view('auth.register');
//})->name('register');
Route::get('/signupT', function () {
    return view('auth.signupT');
})->name('signupT');


Route::get('/signupTG', [RegisteredTG::class, 'showTGregisterform'])->name('signupTG');

 Route::post('/signupTG', [RegisteredTG::class, 'store']);  
 
 
Route::get('/signupT', [RegisteredUserController::class, 'create'])->name('signupT');

Route::post('/signupT', [RegisteredUserController::class, 'store']);  



//Guided Tours in Riyadh
Route::get('/riyadh#tours', [TourController::class, 'index'])->name('tours.index');
Route::get('/tours/{tour}', [TourController::class, 'show'])->name('tours.show');

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

//Things to do in Jeddah
Route::get('/jeddahArabMall', function () {
    return view('Things To Do.jeddahArabMall');
})->name('jeddahArabMall');

Route::get('/jeddahSeafront', function () {
    return view('Things To Do.jeddahSeafront');
})->name('jeddahSeafront');

Route::get('/jeddahHistoric', function () {
    return view('Things To Do.jeddahHistoric');
})->name('jeddahHistoric');

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

//Things to do in Aljouf
Route::get('/aljoufCitiesMall', function () {
    return view('Things To Do.aljoufCitiesMall');
})->name('aljoufCitiesMall');

Route::get('/aljoufMountainPark', function () {
    return view('Things To Do.aljoufMountainPark');
})->name('aljoufMountainPark');

Route::get('/aljoufMosque', function () {
    return view('Things To Do.aljoufMosque');
})->name('aljoufMosque');

Route::get('/aljoufMaridCastle', function () {
    return view('Things To Do.aljoufMaridCastle');
})->name('aljoufMaridCastle');

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

//Things to do in AlUla
Route::get('/alulaAlJadidahArts', function () {
    return view('Things To Do.alulaAlJadidahArts');
})->name('alulaAlJadidahArts');

Route::get('/alulaElephantRock', function () {
    return view('Things To Do.alulaElephantRock');
})->name('alulaElephantRock');

Route::get('/alulaHegra', function () {
    return view('Things To Do.alulaHegra');
})->name('alulaHegra');

Route::get('/review', function () {
    return view('review');
});
