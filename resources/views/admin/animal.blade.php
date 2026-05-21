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

        .filter-card,
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

        .filter-body {
            padding: 26px 28px;
        }

        .filter-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(190px, 1fr));
            gap: 16px;
            margin-bottom: 20px;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .filter-group label {
            font-size: 12px;
            font-weight: bold;
            color: #1f4d36;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        .filter-group input,
        .filter-group select {
            padding: 12px 14px;
            border: 1px solid #d8e3dc;
            border-radius: 12px;
            font-size: 14px;
            width: 100%;
            box-sizing: border-box;
            background: #fbfdfb;
        }

        .filter-group input:focus,
        .filter-group select:focus {
            outline: none;
            border-color: #1f4d36;
            background: white;
        }

        .filter-search-row {
            grid-column: 1 / -1;
        }

        .filter-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .apply-btn,
        .reset-btn {
            border: none;
            padding: 12px 18px;
            border-radius: 12px;
            font-weight: bold;
            font-size: 14px;
            text-decoration: none;
            cursor: pointer;
        }

        .apply-btn {
            background: #1f4d36;
            color: white;
        }

        .apply-btn:hover {
            background: #2f6b4d;
        }

        .reset-btn {
            background: #eef3ef;
            color: #1f4d36;
        }

        .reset-btn:hover {
            background: #dce9df;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1200px;
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
            font-size: 14px;
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

        .no-image {
            color: #98a2b3;
            font-weight: bold;
            font-size: 13px;
        }

        .badge {
            display: inline-block;
            padding: 8px 15px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: bold;
            text-transform: capitalize;
        }

        .badge-available {
            background: #dff7e7;
            color: #1f4d36;
        }

        .badge-adopted {
            background: #dbeafe;
            color: #1e3a8a;
        }

        .badge-pending {
            background: #fff3cd;
            color: #856404;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            white-space: nowrap;
        }

        .edit-btn,
        .delete-btn {
            border: none;
            padding: 10px 14px;
            border-radius: 12px;
            cursor: pointer;
            font-weight: bold;
            font-size: 13px;
            text-decoration: none;
            display: inline-block;
        }

        .edit-btn {
            background: #1f4d36;
            color: white;
        }

        .edit-btn:hover {
            background: #2f6b4d;
        }

        .delete-btn {
            background: #b8322a;
            color: white;
        }

        .delete-btn:hover {
            background: #92261f;
        }

        .empty-box {
            padding: 35px;
            text-align: center;
            color: #667085;
            font-weight: bold;
        }

        .pagination-container {
            padding: 20px 28px;
            background: #fbfdfb;
            border-top: 1px solid #e7eee9;
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

                <a href="{{ route('admin.animal.index') }}" class="active">Manage Animals</a>
                <a href="{{ route('admin.adoption.applications') }}">Manage Adoption Applications</a>

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
                <h1>Manage Animals</h1>
                <p>View, search, filter, edit, and delete animal records.</p>
            </div>

            <div class="filter-card">
                <h2 class="card-title">Search & Filter</h2>

                <div class="filter-body">
                    <form method="GET" action="{{ route('admin.animal.index') }}">

                        <div class="filter-grid">

                            <div class="filter-group filter-search-row">
                                <label>Search</label>
                                <input type="text"
                                    name="search"
                                    placeholder="Search name or breed"
                                    value="{{ request('search') }}">
                            </div>

                            <div class="filter-group">
                                <label>Species</label>
                                <select name="species">
                                    <option value="">All Species</option>
                                    <option value="Dog" {{ request('species') == 'Dog' ? 'selected' : '' }}>Dog</option>
                                    <option value="Cat" {{ request('species') == 'Cat' ? 'selected' : '' }}>Cat</option>
                                </select>
                            </div>

                            <div class="filter-group">
                                <label>Gender</label>
                                <select name="gender">
                                    <option value="">All Genders</option>
                                    <option value="Male" {{ request('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ request('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>

                            <div class="filter-group">
                                <label>Status</label>
                                <select name="status">
                                    <option value="">All Statuses</option>
                                    <option value="Available" {{ request('status') == 'Available' ? 'selected' : '' }}>Available</option>
                                    <option value="Adopted" {{ request('status') == 'Adopted' ? 'selected' : '' }}>Adopted</option>
                                    <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                </select>
                            </div>

                            <div class="filter-group">
                                <label>Age Group</label>
                                <select name="age_group">
                                    <option value="">All Ages</option>
                                    <option value="Puppy/Kitten" {{ request('age_group') == 'Puppy/Kitten' ? 'selected' : '' }}>Puppy / Kitten</option>
                                    <option value="Adult" {{ request('age_group') == 'Adult' ? 'selected' : '' }}>Adult</option>
                                    <option value="Senior" {{ request('age_group') == 'Senior' ? 'selected' : '' }}>Senior</option>
                                </select>
                            </div>

                            <div class="filter-group">
                                <label>Date Added From</label>
                                <input type="date" name="date_from" value="{{ request('date_from') }}">
                            </div>

                            <div class="filter-group">
                                <label>Date Added To</label>
                                <input type="date" name="date_to" value="{{ request('date_to') }}">
                            </div>

                            <div class="filter-group">
                                <label>Sort By</label>
                                <select name="sort">
                                    <option value="">Sort by</option>
                                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name A-Z</option>
                                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name Z-A</option>
                                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
                                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                                    <option value="age_asc" {{ request('sort') == 'age_asc' ? 'selected' : '' }}>Age Low to High</option>
                                    <option value="age_desc" {{ request('sort') == 'age_desc' ? 'selected' : '' }}>Age High to Low</option>
                                    <option value="weight_asc" {{ request('sort') == 'weight_asc' ? 'selected' : '' }}>Weight Low to High</option>
                                    <option value="weight_desc" {{ request('sort') == 'weight_desc' ? 'selected' : '' }}>Weight High to Low</option>
                                    <option value="height_asc" {{ request('sort') == 'height_asc' ? 'selected' : '' }}>Height Low to High</option>
                                    <option value="height_desc" {{ request('sort') == 'height_desc' ? 'selected' : '' }}>Height High to Low</option>
                                </select>
                            </div>

                        </div>

                        <div class="filter-actions">
                            <button type="submit" class="apply-btn">Apply Filters</button>
                            <a href="{{ route('admin.animal.index') }}" class="reset-btn">Reset</a>
                        </div>

                    </form>
                </div>
            </div>

            <div class="table-card">
                <h2 class="card-title">Animal List</h2>

                @if($animals->isEmpty())
                <div class="empty-box">
                    No animals found.
                </div>
                @else
                <div class="table-wrapper">
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
                            @foreach($animals as $animal)
                            <tr>
                                <td>
                                    @if($animal->image)
                                    <img src="{{ asset('storage/' . $animal->image) }}"
                                        class="animal-img"
                                        alt="{{ $animal->name }}">
                                    @else
                                    <span class="no-image">No image</span>
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

                                    <span class="badge {{ $badgeClass }}">
                                        {{ $animal->status }}
                                    </span>
                                </td>

                                <td>
                                    {{ $animal->created_at ? $animal->created_at->format('M d, Y') : '—' }}
                                </td>

                                <td>
                                    {{ $animal->registeredBy?->name ?? '—' }}
                                </td>

                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.animal.edit', $animal->animal_id) }}" class="edit-btn">
                                            Edit
                                        </a>

                                        <form method="POST"
                                            action="{{ route('admin.animal.destroy', $animal->animal_id) }}"
                                            onsubmit="return confirm('Are you sure you want to delete this animal?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-btn">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="pagination-container">
                    {{ $animals->appends(request()->query())->links() }}
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