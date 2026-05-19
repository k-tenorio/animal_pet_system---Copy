{{-- resources/views/admin/staff.blade.php --}}
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
        
        .content h1 {
            margin-bottom: 20px;
            font-size: 30px;
            font-weight: bold;
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

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        input {
            padding: 10px;
            margin: 5px;
            width: 220px;
        }

        button {
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .add-btn {
            background: #1f4d36;
            color: white;
        }

        .edit-btn {
            background: #2980b9;
            color: white;
        }

        .delete-btn {
            background: #c0392b;
            color: white;
        }

        .status-btn {
            background: #f39c12;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #1f4d36;
            color: white;
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
                        Users ▾
                    </button>

                    <div id="usersDropdown" class="dropdown-content">
                        <a href="#">Manage Adopters</a>
                        <a href="{{ route('staff.index') }}">Manage Staff</a>
                    </div>
                </div>
                <a href="#">Animals</a>
                <a href="#">Adoption Applications</a>
                <a href="#">Adoptions</a>
                <a href="#">Donations</a>
                <a href="#">Kapon Appointments</a>
                <a href="#">Reports</a>
            </div>

            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <!-- MAIN CONTENT -->
        <div class="content">

            <h1>Manage Staff</h1>

        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        <!-- ADD STAFF FORM -->
        <div class="card">
            <h2>Add Staff</h2>

            <form method="POST" action="{{ route('staff.store') }}">
                @csrf

                <input type="text" name="name" placeholder="Staff Name" required>
                <input type="email" name="email" value="@gmail.com" placeholder="Staff Email" required>
                <input type="password" name="password" placeholder="Password" required>

                <button type="submit" class="add-btn">Add Staff</button>
            </form>
        </div>

        <!-- SEARCH USERS -->
        <div class="card">
            <h2>Search Users</h2>

            <form method="GET" action="{{ route('staff.index') }}">
                <input type="text" name="search" placeholder="Search staff..." value="{{ $search }}">
                <button type="submit" class="add-btn">Search</button>
            </form>

            <!-- STAFF TABLE -->
            <table>
                <thead>
                    <tr>
                        <th>User Information</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Edit Staff</th>
                        <th>Delete Staff</th>
                        <th>Activate/Deactivate</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($staff as $user)
                        <tr>
                            <td>
                                <strong>{{ $user->name }}</strong><br>
                                ID: {{ $user->id }} <br>
                                Role: {{ $user->role }}
                            </td>

                            <td>{{ $user->email }}</td>

                            <td>
                                @if($user->is_active)
                                    Active
                                @else
                                    Inactive
                                @endif
                            </td>

                            <td>
                                <form method="POST" action="{{ route('staff.update', $user->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <input type="text" name="name" value="{{ $user->name }}" required>
                                    <input type="email" name="email" value="{{ $user->email }}" required>

                                    <button type="submit" class="edit-btn">Update</button>
                                </form>
                            </td>

                            <td>
                                <form method="POST" action="{{ route('staff.destroy', $user->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="delete-btn">
                                        Delete
                                    </button>
                                </form>
                            </td>

                            <td>
                                <form method="POST" action="{{ route('staff.toggle', $user->id) }}">
                                    @csrf
                                    @method('PATCH')

                                    <button type="submit" class="status-btn">
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
       

        
        

        

    <script>
        function toggleUsersDropdown() {
            document.getElementById("usersDropdown").classList.toggle("show");
        }
    </script>
</x-app-layout>