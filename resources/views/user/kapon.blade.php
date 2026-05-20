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

        .form-card {
            background: white;
            border-radius: 22px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
            overflow: hidden;
        }

        .form-content {
            padding: 28px;
        }

        .section-title {
            margin: 0 0 18px;
            padding: 20px 24px;
            color: #1f4d36;
            font-size: 22px;
            border-bottom: 1px solid #e7eee9;
            background: #fbfdfb;
        }

        .form-section {
            margin-bottom: 30px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }

        input,
        select {
            width: 100%;
            padding: 14px 15px;
            border: 1px solid #d0d5dd;
            border-radius: 14px;
            font-size: 14px;
            color: #344054;
            outline: none;
            background: #fff;
        }

        input:focus,
        select:focus {
            border-color: #3b7a57;
            box-shadow: 0 0 0 3px rgba(59, 122, 87, 0.12);
        }

        .full {
            grid-column: span 2;
        }

        .submit-btn {
            margin-top: 10px;
            background: #1f4d36;
            color: white;
            padding: 14px 22px;
            border: none;
            border-radius: 14px;
            font-weight: bold;
            cursor: pointer;
        }

        .submit-btn:hover {
            background: #2f6b4d;
        }

        .success {
            background: #dff7e7;
            color: #1f4d36;
            padding: 16px 20px;
            border-radius: 14px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .error {
            background: #fde2e1;
            color: #7f1d1d;
            padding: 16px 20px;
            border-radius: 14px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .error ul {
            margin: 0;
            padding-left: 18px;
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

            .full {
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
                <a href="{{ route('user.browse-pets') }}">Browse Pets</a>
                <a href="{{ route('user.kapon.create') }}" class="active">Kapon Appointment</a>
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
                <h1>Kapon Appointment</h1>
                <p>Fill out the form to schedule a spay/neuter appointment for your pet.</p>
            </div>

            @if(session('success'))
            <div class="success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
            <div class="error">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="form-card">
                <form action="{{ route('user.kapon.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <h2 class="section-title">A. Owner Information</h2>

                    <div class="form-content">
                        <div class="form-section">
                            <div class="form-grid">
                                <input type="text" name="owner_name" placeholder="Full Name" value="{{ auth()->user()->name }}" required>
                                <input type="email" name="owner_email" placeholder="Email" value="{{ auth()->user()->email }}" required>
                                <input type="text" name="owner_mobile" placeholder="Mobile Number" value="{{ old('owner_mobile') }}" required>
                                <input type="text" name="owner_address" placeholder="Address" value="{{ old('owner_address') }}" class="full">
                            </div>
                        </div>

                        <div class="form-section">
                            <h2 class="section-title">B. Pet Information</h2>

                            <div class="form-grid">
                                <input type="text" name="pet_name" placeholder="Pet Name" value="{{ old('pet_name') }}" required>

                                <select name="pet_species">
                                    <option value="">Select Species</option>
                                    <option value="Dog" {{ old('pet_species') == 'Dog' ? 'selected' : '' }}>Dog</option>
                                    <option value="Cat" {{ old('pet_species') == 'Cat' ? 'selected' : '' }}>Cat</option>
                                </select>

                                <select name="pet_gender">
                                    <option value="">Select Gender</option>
                                    <option value="Male" {{ old('pet_gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('pet_gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>

                                <input type="text" name="pet_breed" placeholder="Breed" value="{{ old('pet_breed') }}">
                                <input type="text" name="pet_age" placeholder="Age" value="{{ old('pet_age') }}">
                                <input type="text" name="pet_weight" placeholder="Weight" value="{{ old('pet_weight') }}">
                                <input type="text" name="pet_height" placeholder="Height" value="{{ old('pet_height') }}">
                                <input type="file" name="pet_photo" accept="image/*" class="full">
                            </div>
                        </div>

                        <div class="form-section">
                            <h2 class="section-title">C. Appointment Information</h2>

                            <div class="form-grid">
                                <input type="datetime-local" name="appointment_date" value="{{ old('appointment_date') }}">

                                <select name="procedure_type">
                                    <option value="">Select Procedure</option>
                                    <option value="Spay">Spay (Female)</option>
                                    <option value="Neuter">Neuter (Male)</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="submit-btn">Submit Appointment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>