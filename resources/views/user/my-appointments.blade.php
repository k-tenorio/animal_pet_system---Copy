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

        .sidebar h2 {
            text-align: center;
            font-size: 27px;
            margin-bottom: 40px;
            letter-spacing: .5px;
        }

        .sidebar-menu {
            flex: 1;
        }

        .sidebar a {
            display: block;
            color: #eaf6ee;
            text-decoration: none;
            padding: 15px 18px;
            margin-bottom: 12px;
            border-radius: 14px;
            font-weight: bold;
            transition: 0.2s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #3b7a57;
            transform: translateX(4px);
        }

        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 15px;
        }

        .logo-container img {
            width: 90px;
            height: 90px;
            object-fit: cover;
            border-radius: 40%;
            border: 4px solid rgba(255, 255, 255, 0.15);
            background: white;
            padding: 5px;
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

        .message {
            margin-bottom: 20px;
            padding: 16px 20px;
            border-radius: 14px;
            color: #1f4d36;
            background: #dff7e7;
            font-weight: bold;
        }

        .message.error {
            color: #7f1d1d;
            background: #fde2e1;
        }

        .application-card {
            background: white;
            border-radius: 22px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
            overflow: hidden;
            margin-bottom: 32px;
        }

        .section-title {
            margin: 0;
            padding: 24px 28px;
            color: #1f4d36;
            font-size: 23px;
            border-bottom: 1px solid #e7eee9;
            background: #fbfdfb;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .application-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        .application-table th {
            background: #f5faf6;
            color: #1f4d36;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: .4px;
        }

        .application-table th,
        .application-table td {
            padding: 18px 20px;
            border-bottom: 1px solid #edf1ee;
            text-align: left;
            color: #344054;
            vertical-align: middle;
        }

        .application-table tr:hover td {
            background: #f9fcfa;
        }

        .application-table tr:last-child td {
            border-bottom: none;
        }

        .pet-image {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 16px;
            border: 1px solid #e5e7eb;
        }

        .status-pill {
            display: inline-block;
            padding: 8px 15px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: bold;
            color: white;
            text-transform: capitalize;
        }

        .status-pending {
            background: #f59e0b;
        }

        .status-approved,
        .status-confirmed {
            background: #10b981;
        }

        .status-completed {
            background: #2563eb;
        }

        .status-rejected {
            background: #ef4444;
        }

        .cancel-btn {
            padding: 10px 16px;
            background: #c0392b;
            color: white;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-weight: bold;
        }

        .cancel-btn:hover {
            background: #992d22;
        }

        .no-image,
        .no-action {
            color: #98a2b3;
            font-weight: bold;
        }

        .no-applications {
            padding: 40px;
            text-align: center;
            color: #667085;
            font-size: 16px;
            background: #fbfdfb;
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
                <a href="{{ route('user.browse-pets') }}">Browse Pets</a>
                <a href="{{ route('user.kapon.create') }}">Kapon Appointment</a>
                <a href="{{ route('user.donation') }}">Donate</a>
                <a href="{{ route('user.my-appointments') }}" class="active">My Appointments</a>
            </div>

            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <div class="content">
            <div class="page-header">
                <h1>My Appointments</h1>
                <p>Manage your adoption applications and kapon appointment requests.</p>
            </div>

            @if(session('success'))
            <div class="message">{{ session('success') }}</div>
            @endif

            @if(session('error'))
            <div class="message error">{{ session('error') }}</div>
            @endif

            <div class="application-card">
                <h2 class="section-title">Adoption Applications</h2>

                @if($applications->isEmpty())
                <div class="no-applications">
                    You don't have any adoption applications yet.
                </div>
                @else
                <div class="table-wrapper">
                    <table class="application-table">
                        <thead>
                            <tr>
                                <th>Pet</th>
                                <th>Image</th>
                                <th>Interview</th>
                                <th>Status</th>
                                <th>Submitted</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($applications as $application)
                            <tr>
                                <td>{{ $application->animal->name ?? 'Unknown Pet' }}</td>

                                <td>
                                    @if($application->animal && $application->animal->image)
                                    <img src="{{ asset('storage/' . $application->animal->image) }}" alt="{{ $application->animal->name }}" class="pet-image">
                                    @else
                                    <span class="no-image">No image</span>
                                    @endif
                                </td>

                                <td>
                                    {{ $application->zoom_interview_date ? date('M d, Y H:i', strtotime($application->zoom_interview_date)) : '-' }}
                                </td>

                                <td>
                                    <span class="status-pill status-{{ strtolower($application->status) }}">
                                        {{ $application->status }}
                                    </span>
                                </td>

                                <td>{{ $application->created_at->format('M d, Y') }}</td>

                                <td>
                                    @if($application->status === 'Pending')
                                    <form method="POST" action="{{ route('adoption.cancel', $application->application_id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="cancel-btn">Cancel</button>
                                    </form>
                                    @else
                                    <span class="no-action">—</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>

            <div class="application-card">
                <h2 class="section-title">Kapon Appointments</h2>

                @if($kaponAppointments->isEmpty())
                <div class="no-applications">
                    You don't have any kapon appointments yet.
                </div>
                @else
                <div class="table-wrapper">
                    <table class="application-table">
                        <thead>
                            <tr>
                                <th>Owner</th>
                                <th>Pet</th>
                                <th>Procedure</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($kaponAppointments as $appointment)
                            <tr>
                                <td>{{ $appointment->owner_name }}</td>
                                <td>{{ $appointment->pet_name }}</td>
                                <td>{{ $appointment->procedure_type ?? '-' }}</td>
                                <td>{{ $appointment->appointment_date ? \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y H:i') : '-' }}</td>

                                <td>
                                    <span class="status-pill status-{{ strtolower($appointment->status) }}">
                                        {{ ucfirst($appointment->status) }}
                                    </span>
                                </td>

                                <td>
                                    @if(strtolower($appointment->status) === 'pending')
                                    <form method="POST" action="{{ route('user.kapon.cancel', $appointment->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="cancel-btn">Cancel</button>
                                    </form>
                                    @else
                                    <span class="no-action">—</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>