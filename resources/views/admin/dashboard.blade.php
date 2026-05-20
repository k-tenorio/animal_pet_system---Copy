{{-- resources/views/admin/dashboard.blade.php --}}
<x-app-layout>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7f5;
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: #1f4d36;
            color: white;
            padding: 25px 20px;
            display: flex;
            flex-direction: column;
        }

        .sidebar h2 {
            font-size: 24px;
            margin-bottom: 30px;
            text-align: center;
        }

        .sidebar-menu {
            flex: 1;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 12px 15px;
            margin-bottom: 10px;
            border-radius: 8px;
            transition: 0.2s;
        }

        .sidebar a:hover {
            background: #2f6b4d;
        }

        .dropdown-btn {
            width: 100%;
            background: none;
            border: none;
            color: white;
            text-align: left;
            padding: 12px 15px;
            margin-bottom: 10px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        .dropdown-btn:hover {
            background: #2f6b4d;
        }

        .dropdown-content {
            display: none;
            margin-left: 15px;
        }

        .dropdown-content a {
            font-size: 14px;
            padding: 10px 15px;
            background: #2a5c43;
        }

        .dropdown-content a:hover {
            background: #3b7a59;
        }

        .dropdown-content.show {
            display: block;
        }

        .content {
            flex: 1;
            padding: 30px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .logout-form {
            margin-top: auto;
        }

        .logout-btn {
            background: #c0392b;
            border: none;
            color: white;
            padding: 12px 15px;
            width: 100%;
            text-align: left;
            cursor: pointer;
            font-size: 16px;
            border-radius: 8px;
            transition: 0.2s;
        }

        .logout-btn:hover {
            background: #e74c3c;
        }
    </style>

    <div class="dashboard">

        <!-- SIDE PANEL -->
        <div class="sidebar">
            <h2>PawMily Home</h2>

            <div class="sidebar-menu">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <div class="dropdown">
                    <button class="dropdown-btn" onclick="toggleUsersDropdown()">
                        Manage Users ▾
                    </button>

                    <div id="usersDropdown" class="dropdown-content">
                        <a href="#">Manage Adopters</a>
                        <a href="{{ route('staff.index') }}">Manage Staff</a>
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

        <!-- MAIN CONTENT -->
        <div class="content">
            <div class="card">
                <h1>Admin Dashboard</h1>
                <p>Welcome, {{ Auth::user()->name }}!</p>
            </div>
        </div>

    </div>

    <script>
        function toggleUsersDropdown() {
            document.getElementById("usersDropdown").classList.toggle("show");
        }
    </script>
    
</x-app-layout>