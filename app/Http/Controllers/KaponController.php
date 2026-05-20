<?php

namespace App\Http\Controllers;

use App\Models\Kapon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KaponController extends Controller
{
    public function create()
    {
        return view('user.kapon');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'owner_name' => 'required|string|max:255',
            'owner_email' => 'required|email|max:255',
            'owner_mobile' => 'required|string|max:50',
            'owner_address' => 'nullable|string',

            'pet_name' => 'required|string|max:255',
            'pet_species' => 'nullable|string|max:255',
            'pet_gender' => 'nullable|string|max:50',
            'pet_breed' => 'nullable|string|max:255',
            'pet_age' => 'nullable|string|max:50',
            'pet_weight' => 'nullable|string|max:50',
            'pet_height' => 'nullable|string|max:50',
            'pet_photo' => 'nullable|image|max:5120',

            'appointment_date' => 'nullable|date',
            'procedure_type' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:50',
        ]);

        if ($request->hasFile('pet_photo')) {
            $path = $request->file('pet_photo')->store('pet_photos', 'public');
            $validated['pet_photo'] = $path;
        }

        if (empty($validated['status'])) {
            $validated['status'] = 'pending';
        }

        $validated['user_id'] = Auth::id();

        Kapon::create($validated);

        return redirect()->back()->with('success', 'Kapon appointment submitted.');
    }

    public function cancel(Kapon $kapon)
    {
        if ($kapon->user_id !== Auth::id()) {
            abort(403);
        }

        $kapon->delete();

        return redirect()->route('user.my-appointments')
            ->with('success', 'Kapon appointment cancelled successfully.');
    }
}
