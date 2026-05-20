<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AdoptionApplication;
use App\Models\Animal;
use App\Models\Kapon;

class AdoptionApplicationController extends Controller
{
    public function browsePets(Request $request)
    {
        $animals = Animal::whereIn('status', ['Available', 'available'])

            ->whereDoesntHave('adoptionApplications', function ($query) {
                $query->where('status', 'Pending');
            })

            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%');
            })

            ->when($request->species, function ($query, $species) {
                $query->where('species', $species);
            })

            ->when($request->gender, function ($query, $gender) {
                $query->where('gender', $gender);
            })

            ->when($request->breed, function ($query, $breed) {
                $query->where('breed', 'like', '%' . $breed . '%');
            })

            ->latest()
            ->get();

        return view('user.browse-pets', compact('animals'));
    }

    public function create(Animal $animal)
    {
        return view('user.adoption-form', compact('animal'));
    }

    public function store(Request $request, Animal $animal)
    {
        $application = new AdoptionApplication();

        $application->registered_by = $request->user()->id;
        $application->user_id = $request->user()->id;
        $application->animal_id = $animal->animal_id;

        $application->first_name = $request->first_name;
        $application->last_name = $request->last_name;
        $application->address = $request->address;
        $application->contact_number = $request->contact_number;
        $application->birthdate = $request->birthdate;
        $application->civil_status = $request->civil_status;
        $application->gender = $request->gender;
        $application->zoom_interview_date = $request->zoom_interview_date;
        $application->status = 'Pending';

        if ($request->hasFile('owner_image')) {
            $application->owner_image = $request->file('owner_image')->store('owners', 'public');
        }

        $application->save();

        return redirect()->route('user.browse-pets')
            ->with('success', 'Application submitted successfully.');
    }

    public function myAppointments(Request $request)
    {
        $applications = AdoptionApplication::with('animal')
            ->where('user_id', $request->user()->id)
            ->latest()
            ->get();

        $kaponAppointments = Kapon::where('user_id', $request->user()->id)
            ->latest()
            ->get();

        return view('user.my-appointments', compact('applications', 'kaponAppointments'));
    }

    public function cancel(AdoptionApplication $application)
    {
        if ($application->user_id !== Auth::id()) {
            abort(403);
        }

        $application->delete();

        return redirect()->route('user.my-appointments')
            ->with('success', 'Application cancelled successfully.');
    }
}