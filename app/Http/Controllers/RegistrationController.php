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
        'coming_type' => 'nullable|string',
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
        'coming_type' => $validated['coming_type'] ?? null,
    ]);

    return redirect()
        ->back()
        ->with('success', 'Registration successful!');
}

 // Confirm attendance
    public function confirmAttendance(Request $request, $id)
    {
        $request->validate([
            'attendance' => 'required|in:husband,wife,both'
        ]);

        $registration = Registration::findOrFail($id);

        switch ($request->attendance) {
            case 'husband':
                $registration->husband_attendance = 'confirmed';
                $registration->wife_attendance = 'absent';
                break;
            case 'wife':
                $registration->wife_attendance = 'confirmed';
                $registration->husband_attendance = 'absent';
                break;
            case 'both':
                $registration->husband_attendance = 'confirmed';
                $registration->wife_attendance = 'confirmed';
                break;
        }

        $registration->save();

        return response()->json([
            'success' => true,
            'message' => 'Attendance updated successfully.',
            'data' => $registration
        ]);
    }

}

?>