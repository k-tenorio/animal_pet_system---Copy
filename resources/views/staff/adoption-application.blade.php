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

        .message {
            background: #dff7e7;
            color: #1f4d36;
            padding: 16px 20px;
            border-radius: 14px;
            margin-bottom: 20px;
            font-weight: bold;
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

        .table-card {
            background: white;
            padding: 0;
            border-radius: 22px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
            overflow: hidden;
        }

        .table-title {
            color: #1f4d36;
            margin: 0;
            padding: 24px 28px;
            font-size: 23px;
            border-bottom: 1px solid #e7eee9;
            background: #fbfdfb;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1100px;
        }

        table th {
            background: #f5faf6;
            color: #1f4d36;
            padding: 16px 18px;
            text-align: left;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: .4px;
            border-bottom: 1px solid #edf1ee;
        }

        table td {
            padding: 16px 18px;
            border-bottom: 1px solid #edf1ee;
            color: #344054;
            vertical-align: middle;
        }

        table tr:hover td {
            background: #f9fcfa;
        }

        .animal-img {
            width: 70px;
            height: 70px;
            border-radius: 16px;
            object-fit: cover;
            border: 1px solid #e5e7eb;
        }

        .status {
            padding: 8px 15px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: bold;
            display: inline-block;
            text-transform: capitalize;
        }

        .status.pending {
            background: #fff3cd;
            color: #856404;
        }

        .status.approved {
            background: #dff7e7;
            color: #1f4d36;
        }

        .status.rejected {
            background: #fde2e1;
            color: #7f1d1d;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .approve-btn,
        .reject-btn {
            border: none;
            padding: 10px 14px;
            border-radius: 12px;
            cursor: pointer;
            font-weight: bold;
            font-size: 13px;
        }

        .approve-btn {
            background: #1f4d36;
            color: white;
        }

        .approve-btn:hover {
            background: #2f6b4d;
        }

        .reject-btn {
            background: #b8322a;
            color: white;
        }

        .reject-btn:hover {
            background: #92261f;
        }

        .no-action {
            color: #98a2b3;
            font-weight: bold;
        }

        .empty-box {
            padding: 35px;
            text-align: center;
            color: #667085;
            font-weight: bold;
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
                <a href="{{ route('staff.animal') }}">Register Pet</a>
                <a href="{{ route('staff.adoption-application') }}" class="active">Adoption Applications</a>
                <a href="#">Kapon Appointments</a>
                <a href="{{ route('staff.adoption-approved') }}">Reviewed Applications</a>
            </div>

            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <div class="content">

            @if(session('success'))
            <div class="message">
                {{ session('success') }}
            </div>
            @endif

            <div class="page-header">
                <h1>Adoption Applications</h1>
                <p>Review user adoption applications and manage their status.</p>
            </div>

            <div class="table-card">
                <h2 class="table-title">Application List</h2>

                @if($applications->isEmpty())
                <div class="empty-box">
                    No adoption applications found.
                </div>
                @else
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Pet Image</th>
                                <th>Pet Name</th>
                                <th>Applicant</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Interview Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($applications as $application)
                            <tr>
                                <td>
                                    @if($application->animal && $application->animal->image)
                                    <img src="{{ asset('storage/' . $application->animal->image) }}" class="animal-img" alt="{{ $application->animal->name }}">
                                    @else
                                    <span style="color:#98a2b3; font-weight:bold;">No image</span>
                                    @endif
                                </td>

                                <td>
                                    {{ $application->animal->name ?? 'No pet' }}
                                </td>

                                <td>
                                    {{ $application->first_name }} {{ $application->last_name }}
                                </td>

                                <td>
                                    {{ $application->contact_number }}
                                </td>

                                <td>
                                    {{ $application->address }}
                                </td>

                                <td>
                                    {{ $application->zoom_interview_date }}
                                </td>

                                <td>
                                    <span class="status {{ strtolower($application->status) }}">
                                        {{ $application->status }}
                                    </span>
                                </td>

                                <td>
                                    @if(strtolower($application->status) === 'pending')
                                    <div class="action-buttons">
                                        <form method="POST" action="{{ route('staff.adoption.approve', $application->application_id) }}">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="approve-btn">Approve</button>
                                        </form>

                                        <form method="POST" action="{{ route('staff.adoption.reject', $application->application_id) }}">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="reject-btn">Reject</button>
                                        </form>
                                    </div>
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