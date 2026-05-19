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

    public function update(Request $request, $animal_id)
    {
        $animal = Animal::findOrFail($animal_id);

        $animal->name = $request->name;
        $animal->species = $request->species;
        $animal->gender = $request->gender;
        $animal->breed = $request->breed;
        $animal->age = $request->age;
        $animal->status = $request->status;
        $animal->height = $request->height;
        $animal->weight = $request->weight;
        $animal->description = $request->description;

        if ($request->hasFile('image')) {
            $animal->image = $request->file('image')->store('animals', 'public');
        }

        $animal->save();

        return redirect()->route('staff.animal')->with('success', 'Animal updated successfully.');
    }

    public function destroy($animal_id)
    {
        $animal = Animal::findOrFail($animal_id);
        $animal->delete();
        return redirect()->route('staff.animal')->with('success', 'Animal deleted successfully.');
    }
}
