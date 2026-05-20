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

        /* ── Sidebar ── */
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

        .sidebar a:hover,
        .sidebar a.active {
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

        /* ── Content ── */
        .content {
            flex: 1;
            padding: 30px;
        }

        .content h1 {
            margin-bottom: 20px;
            font-size: 30px;
            font-weight: bold;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        /* ── Filter grid ── */
        .filter-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 12px;
            margin-bottom: 16px;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .filter-group label {
            font-size: 12px;
            font-weight: 600;
            color: #555;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .filter-group input,
        .filter-group select {
            padding: 9px 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            width: 100%;
            box-sizing: border-box;
            margin: 0;
        }

        .filter-group input:focus,
        .filter-group select:focus {
            outline: none;
            border-color: #1f4d36;
        }

        .filter-search-row {
            grid-column: 1 / -1;
        }

        .filter-actions {
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
        }

        /* ── Buttons ── */
        input,
        select {
            padding: 10px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
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
            padding: 10px 18px;
            border-radius: 6px;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
        }

        .reset-btn {
            background: #7f8c8d;
            color: white;
            padding: 10px 18px;
            border-radius: 6px;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
        }

        .edit-btn {
            background: #2980b9;
            color: white;
            text-decoration: none;
            display: inline-block;
            padding: 7px 11px;
            border-radius: 4px;
            font-size: 13px;
        }

        .delete-btn {
            background: #c0392b;
            color: white;
            padding: 7px 11px;
            border-radius: 4px;
            font-size: 13px;
            border: none;
            cursor: pointer;
        }

        /* ── Table ── */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background: #1f4d36;
            color: white;
            white-space: nowrap;
        }

        td {
            font-size: 14px;
        }

        /* Status badge */
        .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-available {
            background: #d4f5dd;
            color: #1a6b35;
        }

        .badge-adopted {
            background: #d0e8ff;
            color: #1a4b8c;
        }

        .badge-pending {
            background: #fff3cd;
            color: #7d5a00;
        }

        .pagination-container {
            margin-top: 20px;
        }
    </style>

    <div class="dashboard">

        <!-- SIDEBAR -->
        <div class="sidebar">
            <h2>PawMily Home</h2>

            <div class="sidebar-menu">
                <a href="{{ route('dashboard') }}">Dashboard</a>

                <div class="dropdown">
                    <button class="dropdown-btn" onclick="toggleUsersDropdown()">Users ▾</button>
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
            <h1>Manage Animals</h1>

            @if(session('success'))
            <p style="color:green; background:#d4f5dd; padding:10px; border-radius:5px;">
                {{ session('success') }}
            </p>
            @endif

            <!-- ── FILTER CARD ── -->
            <div class="card">
                <h2 style="margin-top:0; margin-bottom:16px;">Search & Filter</h2>

                <form method="GET" action="{{ route('admin.animal.index') }}">

                    <div class="filter-grid">

                        <!-- Search (full width) -->
                        <div class="filter-group filter-search-row">
                            <label>Search</label>
                            <input type="text"
                                name="search"
                                placeholder="Search name, breed…"
                                value="{{ request('search') }}">
                        </div>

                        <!-- Species -->
                        <div class="filter-group">
                            <label>Species</label>
                            <select name="species">
                                <option value="">All Species</option>
                                <option value="Dog" {{ request('species') == 'Dog'  ? 'selected' : '' }}>Dog</option>
                                <option value="Cat" {{ request('species') == 'Cat'  ? 'selected' : '' }}>Cat</option>
                            </select>
                        </div>

                        <!-- Gender -->
                        <div class="filter-group">
                            <label>Gender</label>
                            <select name="gender">
                                <option value="">All Genders</option>
                                <option value="Male" {{ request('gender') == 'Male'   ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ request('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        <!-- Status -->
                        <div class="filter-group">
                            <label>Status</label>
                            <select name="status">
                                <option value="">All Statuses</option>
                                <option value="Available" {{ request('status') == 'Available' ? 'selected' : '' }}>Available</option>
                                <option value="Adopted" {{ request('status') == 'Adopted'   ? 'selected' : '' }}>Adopted</option>
                                <option value="Pending" {{ request('status') == 'Pending'   ? 'selected' : '' }}>Pending</option>
                            </select>
                        </div>

                        <!-- Age Group -->
                        <div class="filter-group">
                            <label>Age Group</label>
                            <select name="age_group">
                                <option value="">All Ages</option>
                                <option value="Puppy/Kitten" {{ request('age_group') == 'Puppy/Kitten' ? 'selected' : '' }}>Puppy / Kitten</option>
                                <option value="Adult" {{ request('age_group') == 'Adult'        ? 'selected' : '' }}>Adult</option>
                                <option value="Senior" {{ request('age_group') == 'Senior'       ? 'selected' : '' }}>Senior</option>
                            </select>
                        </div>

                        <!-- Date Added (from) -->
                        <div class="filter-group">
                            <label>Date Added (From)</label>
                            <input type="date"
                                name="date_from"
                                value="{{ request('date_from') }}">
                        </div>

                        <!-- Date Added (to) -->
                        <div class="filter-group">
                            <label>Date Added (To)</label>
                            <input type="date"
                                name="date_to"
                                value="{{ request('date_to') }}">
                        </div>

                        <!-- Sort By -->
                        <div class="filter-group">
                            <label>Sort By</label>
                            <select name="sort">
                                <option value="">Sort by…</option>
                                <option value="name_asc" {{ request('sort') == 'name_asc'    ? 'selected' : '' }}>Name (A–Z)</option>
                                <option value="name_desc" {{ request('sort') == 'name_desc'   ? 'selected' : '' }}>Name (Z–A)</option>
                                <option value="newest" {{ request('sort') == 'newest'      ? 'selected' : '' }}>Newest First</option>
                                <option value="oldest" {{ request('sort') == 'oldest'      ? 'selected' : '' }}>Oldest First</option>
                                <option value="age_asc" {{ request('sort') == 'age_asc'     ? 'selected' : '' }}>Age (Low → High)</option>
                                <option value="age_desc" {{ request('sort') == 'age_desc'    ? 'selected' : '' }}>Age (High → Low)</option>
                                <option value="weight_asc" {{ request('sort') == 'weight_asc'  ? 'selected' : '' }}>Weight (Low → High)</option>
                                <option value="weight_desc" {{ request('sort') == 'weight_desc' ? 'selected' : '' }}>Weight (High → Low)</option>
                                <option value="height_asc" {{ request('sort') == 'height_asc'  ? 'selected' : '' }}>Height (Low → High)</option>
                                <option value="height_desc" {{ request('sort') == 'height_desc' ? 'selected' : '' }}>Height (High → Low)</option>
                            </select>
                        </div>

                    </div><

                    <div class="filter-actions">
                        <button type="submit" class="add-btn">Apply Filters</button>
                        <a href="{{ route('admin.animal.index') }}" class="reset-btn">Reset</a>
                    </div>

                </form>
            </div>

            <!-- ── ANIMAL LIST CARD ── -->
            <div class="card">
                <h2 style="margin-top:0;">Animal List</h2>
                <div style="overflow-x:auto;">
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Species</th>
                                <th>Breed</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Weight</th>
                                <th>Height</th>
                                <th>Status</th>
                                <th>Date Added</th>
                                <th>Registered By</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($animals as $animal)
                            <tr>
                                <td>
                                    @if($animal->image)
                                    <img src="{{ asset('storage/' . $animal->image) }}"
                                        width="55" height="55"
                                        style="border-radius:8px; object-fit:cover;">
                                    @else
                                    <span style="color:#aaa; font-size:12px;">No Image</span>
                                    @endif
                                </td>
                                <td><strong>{{ $animal->name }}</strong></td>
                                <td>{{ $animal->species }}</td>
                                <td>{{ $animal->breed }}</td>
                                <td>{{ $animal->gender ?? '—' }}</td>
                                <td>{{ $animal->age }}</td>
                                <td>{{ $animal->weight ? $animal->weight . ' kg' : '—' }}</td>
                                <td>{{ $animal->height ? $animal->height . ' cm' : '—' }}</td>
                                <td>
                                    @php
                                    $badgeClass = match(strtolower($animal->status ?? '')) {
                                    'available' => 'badge-available',
                                    'adopted' => 'badge-adopted',
                                    'pending' => 'badge-pending',
                                    default => '',
                                    };
                                    @endphp
                                    <span class="badge {{ $badgeClass }}">{{ $animal->status }}</span>
                                </td>
                                <td>{{ $animal->created_at ? $animal->created_at->format('M d, Y') : '—' }}</td>
                                <td>
                                    {{-- Assumes animal belongs to a staff/user via registered_by foreign key --}}
                                    {{ $animal->registeredBy?->name ?? '—' }}
                                </td>
                                <td style="white-space:nowrap;">
                                    <a href="{{ route('admin.animal.edit', $animal->animal_id) }}" class="edit-btn">Edit</a>

                                    <form method="POST"
                                        action="{{ route('admin.animal.destroy', $animal->animal_id) }}"
                                        style="display:inline;"
                                        onsubmit="return confirm('Are you sure you want to delete this animal?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-btn">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="12" style="text-align:center; padding:30px; color:#888;">
                                    No animals found.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="pagination-container">
                    {{ $animals->appends(request()->query())->links() }}
                </div>
            </div>

        </div><!-- /.content -->
    </div><!-- /.dashboard -->

    <script>
        function toggleUsersDropdown() {
            document.getElementById("usersDropdown").classList.toggle("show");
        }
    </script>
</x-app-layout>