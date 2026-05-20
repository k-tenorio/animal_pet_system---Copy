{{-- resources/views/admin/staff.blade.php --}}
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
            background: none;
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

        .dropdown-content.show {
            display: block;
        }

        .dropdown-content a {
            background: #224d37;
            font-size: 14px;
            padding: 12px 16px;
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

        .form-card,
        .table-card {
            background: white;
            border-radius: 22px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
            margin-bottom: 28px;
            overflow: hidden;
        }

        .card-title {
            color: #1f4d36;
            margin: 0;
            padding: 24px 28px;
            font-size: 23px;
            border-bottom: 1px solid #e7eee9;
            background: #fbfdfb;
        }

        .form-body {
            padding: 26px 28px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
        }

        input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #d0d5dd;
            border-radius: 13px;
            outline: none;
            font-size: 14px;
        }

        input:focus {
            border-color: #1f4d36;
            box-shadow: 0 0 0 3px rgba(31, 77, 54, 0.12);
        }

        .btn {
            border: none;
            padding: 11px 15px;
            border-radius: 12px;
            cursor: pointer;
            font-weight: bold;
            font-size: 13px;
        }

        .add-btn {
            background: #1f4d36;
            color: white;
        }

        .add-btn:hover {
            background: #2f6b4d;
        }

        .edit-btn {
            background: #2563eb;
            color: white;
        }

        .delete-btn {
            background: #b8322a;
            color: white;
        }

        .status-btn {
            background: #f59e0b;
            color: white;
        }

        .search-row {
            display: flex;
            gap: 12px;
            padding: 24px 28px;
            border-bottom: 1px solid #e7eee9;
            background: #fbfdfb;
        }

        .search-row input {
            max-width: 360px;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1150px;
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

        .user-info strong {
            color: #1f4d36;
            font-size: 15px;
        }

        .user-info span {
            color: #667085;
            font-size: 13px;
            line-height: 1.7;
        }

        .status {
            padding: 8px 15px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: bold;
            display: inline-block;
        }

        .status.active {
            background: #dff7e7;
            color: #1f4d36;
        }

        .status.inactive {
            background: #fde2e1;
            color: #7f1d1d;
        }

        .edit-form {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .edit-form input {
            width: 170px;
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

            .form-grid {
                grid-template-columns: 1fr;
            }

            .search-row {
                flex-direction: column;
            }

            .search-row input {
                max-width: 100%;
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
                <a href="{{ route('dashboard') }}">Dashboard</a>

                <div class="dropdown">
                    <button class="dropdown-btn" onclick="toggleUsersDropdown()">
                        Manage Users
                    </button>

                    <div id="usersDropdown" class="dropdown-content show">
                        <a href="#">Manage Adopters</a>
                        <a href="{{ route('staff.index') }}" class="active">Manage Staff</a>
                    </div>
                </div>

                <a href="{{ route('admin.animal.index') }}">Manage Animals</a>
                <a href="#">Manage Adoption Applications</a>
                <a href="#">Manage Donation</a>
                <a href="#">Reports</a>
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
                <h1>Manage Staff</h1>
                <p>Add staff accounts, update information, and manage account status.</p>
            </div>

            <div class="form-card">
                <h2 class="card-title">Add Staff</h2>

                <div class="form-body">
                    <form method="POST" action="{{ route('staff.store') }}">
                        @csrf

                        <div class="form-grid">
                            <input type="text" name="name" placeholder="Staff Name" required>
                            <input type="email" name="email" placeholder="Staff Email" required>
                            <input type="password" name="password" placeholder="Password" required>
                        </div>

                        <br>

                        <button type="submit" class="btn add-btn">Add Staff</button>
                    </form>
                </div>
            </div>

            <div class="table-card">
                <h2 class="card-title">Staff List</h2>

                <form method="GET" action="{{ route('staff.index') }}" class="search-row">
                    <input type="text" name="search" placeholder="Search staff..." value="{{ $search }}">
                    <button type="submit" class="btn add-btn">Search</button>
                </form>

                @if($staff->isEmpty())
                    <div class="empty-box">
                        No staff found.
                    </div>
                @else
                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>User Information</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Edit Staff</th>
                                    <th>Delete</th>
                                    <th>Activate / Deactivate</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($staff as $user)
                                    <tr>
                                        <td class="user-info">
                                            <strong>{{ $user->name }}</strong><br>
                                            <span>ID: {{ $user->id }}</span><br>
                                            <span>Role: {{ $user->role }}</span>
                                        </td>

                                        <td>{{ $user->email }}</td>

                                        <td>
                                            @if($user->is_active)
                                                <span class="status active">Active</span>
                                            @else
                                                <span class="status inactive">Inactive</span>
                                            @endif
                                        </td>

                                        <td>
                                            <form method="POST" action="{{ route('staff.update', $user->id) }}" class="edit-form">
                                                @csrf
                                                @method('PUT')

                                                <input type="text" name="name" value="{{ $user->name }}" required>
                                                <input type="email" name="email" value="{{ $user->email }}" required>

                                                <button type="submit" class="btn edit-btn">Update</button>
                                            </form>
                                        </td>

                                        <td>
                                            <form method="POST" action="{{ route('staff.destroy', $user->id) }}">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn delete-btn"
                                                    onclick="return confirm('Are you sure you want to delete this staff?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>

                                        <td>
                                            <form method="POST" action="{{ route('staff.toggle', $user->id) }}">
                                                @csrf
                                                @method('PATCH')

                                                <button type="submit" class="btn status-btn">
                                                    @if($user->is_active)
                                                        Deactivate
                                                    @else
                                                        Activate
                                                    @endif
                                                </button>
                                            </form>
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

    <script>
        function toggleUsersDropdown() {
            document.getElementById("usersDropdown").classList.toggle("show");
        }
    </script>
</x-app-layout>