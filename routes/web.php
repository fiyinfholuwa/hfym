<?php
use App\Http\Controllers\ProfileController;

use App\Models\Registration;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::post('/register-couple', [\App\Http\Controllers\RegistrationController::class, 'store'])->name('couple.register');
Route::get('/dashboard', function () {
    // Fetch all registrations ordered by latest first
    $registrations = Registration::orderBy('created_at', 'desc')->get();
        
    return view('dashboard', compact('registrations'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
