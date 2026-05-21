{{-- resources/views/admin/dashboard.blade.php --}}
<x-app-layout>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f6f2;
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 270px;
            background: #173b2a;
            color: white;
            padding: 30px 22px;
            display: flex;
            flex-direction: column;
            box-shadow: 8px 0 25px rgba(0, 0, 0, 0.08);
        }

        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 14px;
        }

        .logo-container img {
            width: 92px;
            height: 92px;
            object-fit: cover;
            border-radius: 28px;
            background: white;
            padding: 6px;
            border: 4px solid rgba(255, 255, 255, 0.18);
        }

        .sidebar h2 {
            text-align: center;
            font-size: 27px;
            margin-bottom: 40px;
            letter-spacing: .5px;
        }

        .sidebar-menu {
            flex: 1;
        }

        .sidebar a,
        .dropdown-btn {
            display: block;
            width: 100%;
            color: #eaf6ee;
            text-decoration: none;
            padding: 15px 18px;
            margin-bottom: 12px;
            border-radius: 14px;
            font-weight: bold;
            transition: 0.2s;
            background: transparent;
            border: none;
            text-align: left;
            cursor: pointer;
            font-size: 15px;
        }

        .sidebar a:hover,
        .sidebar a.active,
        .dropdown-btn:hover {
            background: #3b7a57;
            transform: translateX(4px);
        }

        .dropdown-content {
            display: none;
            margin-left: 14px;
            margin-bottom: 10px;
        }

        .dropdown-content a {
            font-size: 14px;
            padding: 12px 16px;
            background: rgba(255, 255, 255, 0.08);
        }

        .dropdown-content.show {
            display: block;
        }

        .logout-form {
            margin-top: auto;
        }

        .logout-btn {
            width: 100%;
            border: none;
            background: #b8322a;
            color: white;
            padding: 14px;
            border-radius: 14px;
            cursor: pointer;
            font-weight: bold;
        }

        .logout-btn:hover {
            background: #92261f;
        }

        .content {
            flex: 1;
            padding: 40px;
        }

        .page-header {
            background: white;
            padding: 28px 32px;
            border-radius: 22px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
            margin-bottom: 28px;
            border-left: 8px solid #1f4d36;
        }

        .page-header h1 {
            color: #1f4d36;
            font-size: 34px;
            margin: 0 0 8px;
        }

        .page-header p {
            color: #667085;
            margin: 0;
            font-size: 15px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 22px;
            margin-bottom: 28px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 22px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
            border-left: 6px solid #2f6b4d;
        }

        .stat-card h3 {
            margin: 0;
            font-size: 15px;
            color: #667085;
        }

        .stat-card h2 {
            margin: 12px 0 0;
            color: #173b2a;
            font-size: 32px;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 24px;
        }

        .card {
            background: white;
            padding: 28px;
            border-radius: 22px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
        }

        .card h2 {
            margin: 0 0 18px;
            color: #173b2a;
            font-size: 22px;
        }

        .quick-actions {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .action-btn {
            text-decoration: none;
            background: #f1f6f2;
            color: #173b2a;
            padding: 18px;
            border-radius: 16px;
            font-weight: bold;
            transition: 0.2s;
            border: 1px solid #dce9df;
        }

        .action-btn:hover {
            background: #2f6b4d;
            color: white;
            transform: translateY(-3px);
        }

        .activity-card {
            background: white;
            padding: 28px;
            border-radius: 22px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
        }

        .activity-card h2 {
            margin: 0 0 20px;
            color: #173b2a;
            font-size: 22px;
        }

        .activity-item {
            padding: 18px;
            border-radius: 16px;
            background: #f8fbf9;
            border: 1px solid #e3ece6;
            margin-bottom: 15px;
            transition: 0.2s;
        }

        .activity-item:hover {
            transform: translateY(-2px);
            background: #f1f6f2;
        }

        .activity-item strong {
            display: block;
            color: #173b2a;
            font-size: 16px;
            margin-bottom: 8px;
        }

        .activity-item p {
            margin: 0 0 10px;
            color: #344054;
            font-size: 14px;
        }

        .activity-item small {
            color: #667085;
            font-size: 13px;
            display: block;
            line-height: 1.5;
        }

        @media (max-width: 1000px) {

            .stats-grid,
            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .quick-actions {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .dashboard {
                flex-direction: column;
            }

            .sidebar {
                width: auto;
            }

            .content {
                padding: 22px;
            }

            .page-header h1 {
                font-size: 28px;
            }
        }
    </style>

    <div class="dashboard">

        <div class="sidebar">

            <div class="logo-container">
                <img src="{{ asset('images/Pawmily_Home_Logo.png') }}" alt="PawMily Logo">
            </div>

            <h2>PawMily Home</h2>

            <div class="sidebar-menu">
                <a href="{{ route('admin.dashboard') }}" class="active">Dashboard</a>

                <div class="dropdown">
                    <button class="dropdown-btn" onclick="toggleUsersDropdown()">
                        Manage Users ▾
                    </button>

                    <div id="usersDropdown" class="dropdown-content">
                        <a href="{{ route('staff.index') }}">Manage Staff</a>
                    </div>
                </div>

                <a href="{{ route('admin.animal.index') }}">Manage Animals</a>
                <a href="{{ route('admin.adoption.applications') }}">Manage Adoption Applications</a>

            </div>

            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <div class="content">

            <div class="page-header">
                <h1>Admin Dashboard</h1>
                <p>Welcome, {{ Auth::user()->name }}! Manage PawMily Home records and activities here.</p>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <h3>Total Animals</h3>
                    <h2>{{ $totalAnimals }}</h2>
                </div>

                <div class="stat-card">
                    <h3>Available Animals</h3>
                    <h2>{{ $availableAnimals }}</h2>
                </div>

                <div class="stat-card">
                    <h3>Adopted Animals</h3>
                    <h2>{{ $adoptedAnimals }}</h2>
                </div>

                <div class="stat-card">
                    <h3>Total Staff</h3>
                    <h2>{{ $totalStaff }}</h2>
                </div>

                <div class="stat-card">
                    <h3>Total Adopters</h3>
                    <h2>{{ $totalAdopters }}</h2>
                </div>

                <div class="stat-card">
                    <h3>Applications</h3>
                    <h2>{{ $totalApplications }}</h2>
                </div>

                <div class="stat-card">
                    <h3>Pending Applications</h3>
                    <h2>{{ $pendingApplications }}</h2>
                </div>

                <div class="stat-card">
                    <h3>Paid Applications</h3>
                    <h2>{{ $paidApplications }}</h2>
                </div>
            </div>

            <div class="dashboard-grid">

                <div class="card">
                    <h2>Quick Actions</h2>

                    <div class="quick-actions">
                        <a href="{{ route('admin.animal.index') }}" class="action-btn">Manage Animals</a>
                        <a href="{{ route('staff.index') }}" class="action-btn">Manage Staff</a>
                        <a href="{{ route('admin.adoption.applications') }}" class="action-btn">View Adoption Applications</a>

                    </div>
                </div>

                <div class="activity-card">
                    <h2>Recent Adoption Activities</h2>

                    @forelse($recentActivities as $activity)

                    @php
                    $statusClass =
                    $activity->status == 'Approved'
                    ? 'approved'
                    : ($activity->status == 'Rejected'
                    ? 'rejected'
                    : 'pending');
                    @endphp

                    <div class="activity-item">

                        <strong>
                            Application #{{ $activity->application_id }}
                        </strong>

                        <p>
                            <b>{{ $activity->user->name ?? 'Unknown User' }}</b>
                            applied to adopt
                            <b>{{ $activity->animal->name ?? 'Unknown Pet' }}</b>
                        </p>

                        <small>
                            Staff:
                            {{ $activity->registeredBy->name ?? 'N/A' }}
                        </small>

                        <small>
                            Payment:
                            {{ $activity->payment_status ?? 'Unpaid' }}
                        </small>

                        <small>
                            Date:
                            {{ $activity->created_at->format('M d, Y h:i A') }}
                        </small>

                        <div style="margin-top:10px;">
                            <span class="status {{ $statusClass }}">
                                {{ $activity->status }}
                            </span>
                        </div>

                    </div>

                    @empty

                    <p>No recent activities found.</p>

                    @endforelse
                </div>

            </div>

        </div>

    </div>

    <script>
        function toggleUsersDropdown() {
            document.getElementById("usersDropdown").classList.toggle("show");
        }
    </script>
</x-app-layout>