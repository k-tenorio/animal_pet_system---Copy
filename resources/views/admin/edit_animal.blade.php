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

        .form-card {
            background: white;
            border-radius: 22px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
            overflow: hidden;
        }

        .form-title {
            color: #1f4d36;
            margin: 0;
            padding: 24px 28px;
            font-size: 23px;
            border-bottom: 1px solid #e7eee9;
            background: #fbfdfb;
        }

        .form-body {
            padding: 28px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .form-group.full {
            grid-column: span 2;
        }

        .form-group label {
            font-size: 12px;
            font-weight: bold;
            color: #1f4d36;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #d8e3dc;
            border-radius: 12px;
            box-sizing: border-box;
            font-size: 14px;
            background: #fbfdfb;
            color: #344054;
        }

        .form-group textarea {
            resize: vertical;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #1f4d36;
            background: white;
        }

        .current-image {
            margin-top: 12px;
        }

        .current-image img {
            width: 90px;
            height: 90px;
            border-radius: 18px;
            object-fit: cover;
            border: 1px solid #e5e7eb;
        }

        .button-row {
            display: flex;
            gap: 10px;
            margin-top: 26px;
            flex-wrap: wrap;
        }

        .cancel-btn,
        .update-btn {
            border: none;
            padding: 12px 18px;
            border-radius: 12px;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
        }

        .cancel-btn {
            background: #eef3ef;
            color: #1f4d36;
        }

        .cancel-btn:hover {
            background: #dce9df;
        }

        .update-btn {
            background: #1f4d36;
            color: white;
        }

        .update-btn:hover {
            background: #2f6b4d;
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

            .grid-container {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: span 1;
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

                <a href="{{ route('admin.animal.index') }}" class="active">Manage Animals</a>
                <a href="{{ route('admin.adoption.applications') }}">Manage Adoption Applications</a>
                
            </div>

            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <div class="content">

            <div class="page-header">
                <h1>Edit Animal</h1>
                <p>Update animal information and keep the record accurate.</p>
            </div>

            <div class="form-card">
                <h2 class="form-title">Animal Information</h2>

                <div class="form-body">
                    <form method="POST" action="{{ route('admin.animal.update', $animal->animal_id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid-container">

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ $animal->name }}" required>
                            </div>

                            <div class="form-group">
                                <label>Species</label>
                                <select name="species" required>
                                    <option value="Dog" {{ $animal->species == 'Dog' ? 'selected' : '' }}>Dog</option>
                                    <option value="Cat" {{ $animal->species == 'Cat' ? 'selected' : '' }}>Cat</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" required>
                                    <option value="Male" {{ $animal->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $animal->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Breed</label>
                                <input type="text" name="breed" value="{{ $animal->breed }}" required>
                            </div>

                            <div class="form-group">
                                <label>Age</label>
                                <input type="number" name="age" value="{{ $animal->age }}" required>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" required>
                                    <option value="Available" {{ $animal->status == 'Available' ? 'selected' : '' }}>Available</option>
                                    <option value="Adopted" {{ $animal->status == 'Adopted' ? 'selected' : '' }}>Adopted</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Height (cm)</label>
                                <input type="text" name="height" value="{{ $animal->height }}" required>
                            </div>

                            <div class="form-group">
                                <label>Weight (kg)</label>
                                <input type="text" name="weight" value="{{ $animal->weight }}" required>
                            </div>

                            <div class="form-group full">
                                <label>Image</label>
                                <input type="file" name="image">

                                @if($animal->image)
                                    <div class="current-image">
                                        <img src="{{ asset('storage/' . $animal->image) }}" alt="{{ $animal->name }}">
                                    </div>
                                @endif
                            </div>

                            <div class="form-group full">
                                <label>Description</label>
                                <textarea name="description" rows="4" required>{{ $animal->description }}</textarea>
                            </div>

                        </div>

                        <div class="button-row">
                            <a href="{{ route('admin.animal.index') }}" class="cancel-btn">Cancel</a>
                            <button type="submit" class="update-btn">Update Animal</button>
                        </div>

                    </form>
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