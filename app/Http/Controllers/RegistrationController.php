<?php 

// app/Http/Controllers/RegistrationController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Validation\ValidationException;

class RegistrationController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'husbandName'    => 'required|string|max:255',
        'wifeName'       => 'required|string|max:255',
        'email'          => 'required|email|max:255',
        'phone'          => 'required|string|max:20',
        'address'        => 'required|string|max:255',
        'marriageYears'  => 'required',
        'church'         => 'required|string|max:255',
        'expectations'   => 'nullable|string',
        'prayerRequests' => 'nullable|string',
    ]);

    Registration::create([
        'husband_name'    => $validated['husbandName'],
        'wife_name'       => $validated['wifeName'],
        'email'           => $validated['email'],
        'phone'           => $validated['phone'],
        'address'         => $validated['address'],
        'marriage_years'  => $validated['marriageYears'],
        'church'          => $validated['church'],
        'expectations'    => $validated['expectations'] ?? null,
        'prayer_requests' => $validated['prayerRequests'] ?? null,
    ]);

    return redirect()
        ->back()
        ->with('success', 'Registration successful!');
}

}

?>