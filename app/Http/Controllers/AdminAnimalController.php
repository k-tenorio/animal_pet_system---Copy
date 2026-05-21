<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminAnimalController extends Controller
{
    public function index(Request $request): View
    {
        $query = Animal::query();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%")
                    ->orWhere('breed', 'like', "%{$request->search}%");
            });
        }

        if ($request->species)  $query->where('species', $request->species);
        if ($request->gender)   $query->where('gender', $request->gender);
        if ($request->status)   $query->where('status', $request->status);
        if ($request->date_from) $query->whereDate('created_at', '>=', $request->date_from);
        if ($request->date_to)   $query->whereDate('created_at', '<=', $request->date_to);

        if ($request->age_group) {
            match ($request->age_group) {
                'Puppy/Kitten' => $query->where('age', '<', 1),
                'Adult'        => $query->whereBetween('age', [1, 7]),
                'Senior'       => $query->where('age', '>', 7),
                default        => null,
            };
        }

        match ($request->sort) {
            'name_asc'    => $query->orderBy('name'),
            'name_desc'   => $query->orderByDesc('name'),
            'newest'      => $query->latest(),
            'oldest'      => $query->oldest(),
            'age_asc'     => $query->orderBy('age'),
            'age_desc'    => $query->orderByDesc('age'),
            'weight_asc'  => $query->orderBy('weight'),
            'weight_desc' => $query->orderByDesc('weight'),
            'height_asc'  => $query->orderBy('height'),
            'height_desc' => $query->orderByDesc('height'),
            default       => $query->latest(),
        };

        $animals = $query->paginate(10);

        return view('admin.animal', compact('animals'));
    }

    public function edit(int $id): View
    {
        $animal = Animal::findOrFail($id);
        return view('admin.edit_animal', compact('animal'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $animal = Animal::findOrFail($id);

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'species'     => 'required|string',
            'gender'      => 'required|string',
            'breed'       => 'required|string|max:255',
            'age'         => 'required|integer',
            'status'      => 'required|string',
            'height'      => 'nullable|numeric',
            'weight'      => 'nullable|numeric',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('animals', 'public');
        } else {
            unset($validated['image']);
        }

        $animal->update($validated);

        return redirect()->route('admin.animal.index')->with('success', 'Animal updated successfully.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();

        return redirect()->route('admin.animal.index')->with('success', 'Animal deleted successfully.');
    }
}
