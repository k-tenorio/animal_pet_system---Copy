<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::all();
        return view('staff.animal', compact('animals'));
    }
    public function store(Request $request)
    {
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('animals', 'public');
        }

        Animal::create([
            'name' => $request->name,
            'species' => $request->species,
            'gender' => $request->gender,
            'breed' => $request->breed,
            'age' => $request->age,
            'status' => 'Available',
            'height' => $request->height,
            'weight' => $request->weight,
            'image' => $imagePath,
            'description' => $request->description,
            'registered_by' => $request->user()->id
        ]);

        return redirect()->route('staff.animal')
            ->with('success', 'Animal added successfully.');
    }

}
