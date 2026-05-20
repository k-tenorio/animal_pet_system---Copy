<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminAnimalController extends Controller
{
    /**
     * Display a listing of the animals.
     */
    public function index(): View
    {
        $animals = Animal::all();
        return view('admin.animal.index', compact('animals'));
    }

    /**
     * Show the form for editing the specified animal.
     */
    public function edit(int $id): View
    {
        $animal = Animal::findOrFail($id);
        return view('admin.animal.edit', compact('animal'));
    }

    /**
     * Update the specified animal in storage.
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $animal = Animal::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'age' => 'nullable|integer',
            // add other fields as needed
        ]);
        $animal->update($validated);
        return redirect()->route('admin.animal.index')
            ->with('status', 'Animal updated successfully');
    }

    /**
     * Remove the specified animal from storage.
     */
    public function destroy(int $id): RedirectResponse
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();
        return redirect()->route('admin.animal.index')
            ->with('status', 'Animal deleted successfully');
    }
}
