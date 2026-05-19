<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $staff = User::where('role', 'staff')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            })
            ->get();

        return view('admin.staff', compact('staff', 'search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'staff',
            'is_active' => true,
        ]);

        return redirect()->route('staff.index')->with('success', 'Staff added successfully.');
    }

    public function update(Request $request, $id)
    {
        $staff = User::findOrFail($id);

        $staff->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('staff.index')->with('success', 'Staff updated successfully.');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('staff.index')->with('success', 'Staff deleted successfully.');
    }

    public function toggleStatus($id)
    {
        $staff = User::findOrFail($id);

        $staff->is_active = !$staff->is_active;
        $staff->save();

        return redirect()->route('staff.index')->with('success', 'Account status updated.');
    }
}
