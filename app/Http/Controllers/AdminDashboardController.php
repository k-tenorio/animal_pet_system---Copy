<?php

namespace App\Http\Controllers;

use App\Models\AdoptionApplication;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = DB::select('CALL GetAdminDashboardStats()')[0];

        $totalAnimals = $stats->totalAnimals;
        $availableAnimals = $stats->availableAnimals;
        $adoptedAnimals = $stats->adoptedAnimals;
        $totalStaff = $stats->totalStaff;
        $totalAdopters = $stats->totalAdopters;
        $totalApplications = $stats->totalApplications;
        $pendingApplications = $stats->pendingApplications;
        $approvedApplications = $stats->approvedApplications;
        $rejectedApplications = $stats->rejectedApplications;
        $paidApplications = $stats->paidApplications;

        $recentActivities = AdoptionApplication::with(['user', 'animal', 'registeredBy', 'approvedBy'])
            ->latest()
            ->take(6)
            ->get();

        return view('admin.dashboard', compact(
            'totalAnimals',
            'availableAnimals',
            'adoptedAnimals',
            'totalStaff',
            'totalAdopters',
            'totalApplications',
            'pendingApplications',
            'approvedApplications',
            'rejectedApplications',
            'paidApplications',
            'recentActivities'
        ));
    }
}