<x-app-layout>
    <style>
        body { margin: 0; font-family: Arial, sans-serif; background: #f4f7f5; }
        .dashboard { display: flex; min-height: 100vh; }
        .sidebar { width: 250px; background: #1f4d36; color: white; padding: 25px 20px; display: flex; flex-direction: column; }
        .sidebar h2 { font-size: 24px; margin-bottom: 30px; text-align: center; }
        .sidebar-menu { flex: 1; }
        .sidebar a { display: block; color: white; text-decoration: none; padding: 12px 15px; margin-bottom: 10px; border-radius: 8px; transition: 0.2s; }
        .sidebar a:hover, .sidebar a.active { background: #2f6b4d; }
        .dropdown-btn { width: 100%; background: none; border: none; color: white; text-align: left; padding: 12px 15px; margin-bottom: 10px; border-radius: 8px; cursor: pointer; font-size: 16px; }
        .dropdown-btn:hover { background: #2f6b4d; }
        .dropdown-content { display: none; margin-left: 15px; }
        .dropdown-content a { font-size: 14px; padding: 10px 15px; background: #2a5c43; }
        .dropdown-content a:hover { background: #3b7a59; }
        .dropdown-content.show { display: block; }
        .logout-form { margin-top: auto; }
        .logout-btn { background: #c0392b; border: none; color: white; padding: 12px 15px; width: 100%; text-align: left; cursor: pointer; font-size: 16px; border-radius: 8px; transition: 0.2s; }
        .logout-btn:hover { background: #e74c3c; }
        .content { flex: 1; padding: 30px; }
        .content h1 { margin-bottom: 20px; font-size: 30px; font-weight: bold; }
        .card { background: white; padding: 25px; border-radius: 12px; margin-bottom: 25px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; font-weight: bold; margin-bottom: 5px; }
        .form-group input, .form-group select, .form-group textarea { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box; }
        button { padding: 10px 15px; border: none; border-radius: 6px; cursor: pointer; font-size: 16px; }
        .update-btn { background: #1f4d36; color: white; }
        .cancel-btn { background: #7f8c8d; color: white; text-decoration: none; display: inline-block; padding: 10px 15px; border-radius: 6px; margin-right: 10px; }
        .grid-container { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
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
                <a href="{{ route('admin.animal.index') }}" class="active">Animals</a>
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
            <h1>Edit Animal</h1>

            <div class="card">
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
                        <div class="form-group">
                            <label>Image (Leave blank to keep current image)</label>
                            <input type="file" name="image">
                            @if($animal->image)
                                <div style="margin-top: 10px;">
                                    <img src="{{ asset('storage/' . $animal->image) }}" width="70" height="70" style="border-radius:10px; object-fit:cover;">
                                </div>
                            @endif
                        </div>
                        <div class="form-group" style="grid-column: span 2;">
                            <label>Description</label>
                            <textarea name="description" rows="4" required>{{ $animal->description }}</textarea>
                        </div>
                    </div>

                    <div style="margin-top: 20px;">
                        <a href="{{ route('admin.animal.index') }}" class="cancel-btn">Cancel</a>
                        <button type="submit" class="update-btn">Update Animal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleUsersDropdown() {
            document.getElementById("usersDropdown").classList.toggle("show");
        }
    </script>
</x-app-layout>
