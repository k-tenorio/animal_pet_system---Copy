<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    public function create()
    {
        $donations = Donation::where('user_id', Auth::id())->latest()->get();

        return view('user.donation', compact('donations'));
    }

    public function cancel(Donation $donation)
    {
        if ($donation->user_id !== Auth::id()) {
            abort(403);
        }

        if (! in_array($donation->status, ['Approved', 'Pending'])) {
            return redirect()->back()->with('error', 'This donation cannot be cancelled.');
        }

        $donation->delete();

        return redirect()->back()->with('success', 'Donation cancelled successfully.');
    }

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
            'status' => 'Approved',
        ]);

        return redirect()->back()->with('success', 'Thank you for your donation!');
    }
}
