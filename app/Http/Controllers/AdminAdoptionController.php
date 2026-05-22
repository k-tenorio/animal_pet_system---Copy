<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdoptionApplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminAdoptionController extends Controller
{
    public function index()
    {
        $applications = AdoptionApplication::with(['user', 'animal', 'registeredBy'])
            ->latest()
            ->get();

        return view('admin.adoption-applications', compact('applications'));
    }

    public function approve($id)
    {
        try {
            
            DB::transaction(function () use ($id) {

                $application = AdoptionApplication::findOrFail($id);

                if ($application->payment_status !== 'Paid') {
                    throw new \Exception('Adopter must pay first before approval.');
                }

                if ($application->status !== 'Staff Approved') {
                    throw new \Exception('Staff must approve this application first.');
                }

                $application->status = 'Approved';
                $application->approved_by = Auth::id();
                $application->save();
                // REJECT OTHER PENDING APPLICATIONS
                AdoptionApplication::where('animal_id', $application->animal_id)
                    ->where('application_id', '!=', $application->application_id)
                    ->where('status', 'Pending')
                    ->update(['status' => 'Rejected']);
            });

            return redirect()->back()
                ->with('success', 'Adoption application approved successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function reject($id)
    {
        $application = AdoptionApplication::findOrFail($id);

        $application->status = 'Rejected';
        $application->approved_by = Auth::id();
        $application->save();

        return redirect()->back()
            ->with('success', 'Adoption application rejected.');
    }

    // MARK PAYMENT AS PAID
    public function markAsPaid($id)
    {
        $application = AdoptionApplication::with('animal')
            ->findOrFail($id);

        // SET ADOPTION FEE
        if ($application->animal->species == 'Cat') {
            $application->adoption_fee = 500;
        } else {
            $application->adoption_fee = 1000;
        }

        $application->payment_status = 'Paid';
        $application->save();

        return redirect()->back()
            ->with('success', 'Payment marked as paid.');
    }

    public function resetStatus($id)
    {
        $application = AdoptionApplication::findOrFail($id);

        // RETURN PET TO AVAILABLE
        if ($application->status == 'Approved' && $application->animal) {
            $application->animal->status = 'available';
            $application->animal->save();
        }

        $application->status = 'Pending';
        $application->approved_by = null;
        $application->save();

        return redirect()->back()
            ->with('success', 'Application status reset to pending.');
    }
}
