<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'donor_name' => 'required|string|max:255',
            'donor_email' => 'required|email|max:255',
            'donor_contact_number' => 'required|string|max:20',
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|in:Credit Card,GCash,Bank Transfer',
        ]);

        Donation::create([
            'user_id' => Auth::check() ? Auth::id() : null,
            'donor_name' => $request->donor_name,
            'donor_email' => $request->donor_email,
            'donor_contact_number' => $request->donor_contact_number,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'status' => 'Pending',
        ]);

        return redirect()->to('/#donation')->with('success', 'Thank you for your donation!');
    }
}