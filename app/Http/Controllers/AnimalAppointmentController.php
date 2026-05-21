<?php

namespace App\Http\Controllers;

use App\Models\AdoptionApplication;
use Illuminate\Support\Facades\Auth;

class AnimalAppointmentController extends Controller
{
    public function index()
    {
        $applications = AdoptionApplication::with('animal')
            ->where('status', 'Pending')
            ->latest()
            ->get();

        return view('staff.adoption-application', compact('applications'));
    }

    public function approved()
    {
        $applications = AdoptionApplication::with('animal')
            ->whereIn('status', ['Staff Approved', 'Rejected'])
            ->latest()
            ->get();

        $kaponAppointments = \App\Models\Kapon::whereIn('status', ['paid', 'rejected'])
            ->latest()
            ->get();

        return view('staff.adoption-approved', compact('applications', 'kaponAppointments'));
    }

    public function approve(AdoptionApplication $application)
    {
        $application->status = 'Staff Approved';
        $application->registered_by = Auth::id();
        $application->save();

        return redirect()->route('staff.adoption-application')
            ->with('success', 'Application reviewed by staff. Waiting for admin final approval.');
    }

    public function reject(AdoptionApplication $application)
    {
        $application->status = 'Rejected';
        $application->approved_by = Auth::id();
        $application->save();

        return redirect()->route('staff.adoption-application')
            ->with('success', 'Application rejected successfully.');
    }
}
