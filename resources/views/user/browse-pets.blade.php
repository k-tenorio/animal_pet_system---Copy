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

        .filter-section {
            background: white;
            padding: 26px;
            border-radius: 22px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
        }

        .filter-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
        }

        .filter-group label {
            display: block;
            margin-bottom: 8px;
            color: #1f4d36;
            font-size: 13px;
            font-weight: bold;
        }

        .filter-group input,
        .filter-group select {
            width: 100%;
            padding: 14px 15px;
            border: 1px solid #d0d5dd;
            border-radius: 14px;
            background: #fbfdfb;
            outline: none;
            font-size: 14px;
            color: #344054;
        }

        .filter-group input:focus,
        .filter-group select:focus {
            border-color: #3b7a57;
            background: white;
            box-shadow: 0 0 0 3px rgba(59, 122, 87, 0.12);
        }

        .filter-buttons {
            display: flex;
            gap: 12px;
            margin-top: 22px;
        }

        .filter-btn,
        .reset-btn {
            border: none;
            padding: 13px 24px;
            border-radius: 14px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
        }

        .filter-btn {
            background: #1f4d36;
            color: white;
        }

        .filter-btn:hover {
            background: #2f6b4d;
        }

        .reset-btn {
            background: #edf1ee;
            color: #1f4d36;
        }

        .reset-btn:hover {
            background: #dfe8e2;
        }

        .pet-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        .pet-card {
            background: white;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
            transition: 0.25s ease;
        }

        .pet-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 35px rgba(0, 0, 0, 0.1);
        }

        .pet-image-box {
            height: 240px;
            background: #f5faf6;
            overflow: hidden;
        }

        .pet-image-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .pet-info {
            padding: 24px;
        }

        .pet-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 18px;
        }

        .pet-top h3 {
            margin: 0;
            color: #1f4d36;
            font-size: 25px;
        }

        .pet-species {
            background: #e8f4ec;
            color: #1f4d36;
            padding: 7px 13px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: bold;
            white-space: nowrap;
        }

        .pet-details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-bottom: 18px;
        }

        .detail-card {
            background: #f5faf6;
            padding: 13px;
            border-radius: 14px;
            border: 1px solid #edf1ee;
        }

        .detail-card small {
            display: block;
            color: #667085;
            margin-bottom: 5px;
            font-size: 11px;
            font-weight: bold;
        }

        .detail-card strong {
            color: #344054;
            font-size: 14px;
        }

        .pet-description {
            color: #667085;
            font-size: 14px;
            line-height: 1.6;
            margin: 0 0 20px;
        }

        .adopt-btn {
            display: block;
            width: 100%;
            text-align: center;
            background: #1f4d36;
            color: white;
            text-decoration: none;
            padding: 14px;
            border-radius: 14px;
            font-weight: bold;
            transition: 0.2s;
        }

        .adopt-btn:hover {
            background: #2f6b4d;
        }

        .empty-box {
            background: white;
            padding: 45px;
            border-radius: 22px;
            text-align: center;
            color: #667085;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
        }

        .empty-box h3 {
            color: #1f4d36;
            margin: 0 0 8px;
            font-size: 24px;
        }

        .empty-box p {
            margin: 0;
        }

        @media (max-width: 1000px) {

            .pet-grid,
            .filter-grid {
                grid-template-columns: repeat(2, 1fr);
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

            .pet-grid,
            .filter-grid {
                grid-template-columns: 1fr;
            }

            .pet-details {
                grid-template-columns: 1fr;
            }

            .filter-buttons {
                flex-direction: column;
            }

            .filter-btn,
            .reset-btn {
                text-align: center;
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
                <a href="{{ route('user.browse-pets') }}" class="active">Browse Pets</a>
                <a href="{{ route('user.kapon.create') }}">Kapon Appointment</a>
                <a href="{{ route('user.donation') }}">Donate</a>
                <a href="{{ route('user.my-appointments') }}">My Appointments</a>
            </div>

            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <div class="content">

            <div class="page-header">
                <h1>Browse Available Pets</h1>
                <p>Choose a pet and submit your adoption application.</p>
            </div>

            <div class="filter-section">
                <form method="GET" action="{{ route('user.browse-pets') }}">
                    <div class="filter-grid">

                        <div class="filter-group">
                            <label>Search Pet</label>
                            <input type="text" name="search" placeholder="Search pet name..." value="{{ request('search') }}">
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
                                <option value="">All Gender</option>
                                <option value="Male" {{ request('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ request('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        <div class="filter-group">
                            <label>Breed</label>
                            <input type="text" name="breed" placeholder="Search breed..." value="{{ request('breed') }}">
                        </div>

                    </div>

                    <div class="filter-buttons">
                        <button type="submit" class="filter-btn">Search</button>
                        <a href="{{ route('user.browse-pets') }}" class="reset-btn">Reset</a>
                    </div>
                </form>
            </div>

            @if($animals->isEmpty())
            <div class="empty-box">
                <h3>No pets found.</h3>
                <p>Try changing your search or filter.</p>
            </div>
            @else
            <div class="pet-grid">
                @foreach($animals as $animal)
                <div class="pet-card">

                    <div class="pet-image-box">
                        @if($animal->image)
                        <img src="{{ asset('storage/' . $animal->image) }}" alt="{{ $animal->name }}">
                        @else
                        <img src="https://via.placeholder.com/500x300?text=No+Image" alt="No Image">
                        @endif
                    </div>

                    <div class="pet-info">

                        <div class="pet-top">
                            <h3>{{ $animal->name }}</h3>
                            <span class="pet-species">{{ $animal->species }}</span>
                        </div>

                        <div class="pet-details">

                            <div class="detail-card">
                                <small>Gender</small>
                                <strong>{{ $animal->gender }}</strong>
                            </div>

                            <div class="detail-card">
                                <small>Breed</small>
                                <strong>{{ $animal->breed ?? 'N/A' }}</strong>
                            </div>

                            <div class="detail-card">
                                <small>Age</small>
                                <strong>{{ $animal->age ?? 'N/A' }}</strong>
                            </div>

                            <div class="detail-card">
                                <small>Height</small>
                                <strong>{{ $animal->height ?? 'N/A' }} cm</strong>
                            </div>

                            <div class="detail-card">
                                <small>Weight</small>
                                <strong>{{ $animal->weight ?? 'N/A' }} kg</strong>
                            </div>

                        </div>

                        <p class="pet-description">
                            {{ $animal->description ?? 'No description available.' }}
                        </p>

                        <a href="{{ route('adoption.form', $animal->animal_id) }}" class="adopt-btn">
                            Adopt Me
                        </a>

                    </div>
                </div>
                @endforeach
            </div>
            @endif

        </div>
    </div>
</x-app-layout>