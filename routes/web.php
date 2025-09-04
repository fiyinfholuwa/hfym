<?php
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\RegistrationController;
use App\Models\Registration;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::post('/register-couple', [\App\Http\Controllers\RegistrationController::class, 'store'])->name('couple.register');
Route::get('/dashboard', function () {
    // Fetch all registrations ordered by latest first        
    $registrations = Registration::latest()->get();

        $stats = [
            'husband_only' => Registration::where('husband_attendance', 'confirmed')
                ->where('wife_attendance', '!=', 'confirmed')->count(),
            'wife_only' => Registration::where('wife_attendance', 'confirmed')
                ->where('husband_attendance', '!=', 'confirmed')->count(),
            'both' => Registration::where('husband_attendance', 'confirmed')
                ->where('wife_attendance', 'confirmed')->count(),
        ];

        return view('dashboard', compact('registrations', 'stats'));

})->middleware(['auth', 'verified'])->name('dashboard');


Route::post('/registrations/{id}/confirm-attendance', [RegistrationController::class, 'confirmAttendance']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
