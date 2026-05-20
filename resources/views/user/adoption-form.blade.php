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
            margin: 0 0 38px;
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
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .page-header {
            background: white;
            width: 100%;
            max-width: 900px;
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
            width: 100%;
            max-width: 900px;
            padding: 32px;
            border-radius: 22px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full {
            grid-column: span 2;
        }

        label {
            font-weight: bold;
            color: #1f4d36;
            margin-bottom: 8px;
            font-size: 14px;
        }

        input,
        select,
        textarea {
            padding: 14px 15px;
            border: 1px solid #d0d5dd;
            border-radius: 14px;
            font-size: 14px;
            color: #344054;
            outline: none;
            background: #fbfdfb;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #3b7a57;
            background: white;
            box-shadow: 0 0 0 3px rgba(59, 122, 87, 0.12);
        }

        textarea {
            resize: vertical;
            min-height: 95px;
        }

        .submit-btn {
            margin-top: 25px;
            width: 100%;
            padding: 15px;
            background: #1f4d36;
            color: white;
            border: none;
            border-radius: 14px;
            font-weight: bold;
            cursor: pointer;
            font-size: 16px;
        }

        .submit-btn:hover {
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

            .form-grid {
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
                <a href="{{ route('user.browse-pets') }}">Browse Pets</a>
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
                <h1>Adoption Application Form</h1>
                <p>Fill out your information and choose your Zoom interview schedule.</p>
            </div>

            <div class="form-card">
                <form method="POST" action="{{ route('adoption.store', $animal->animal_id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-grid">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="first_name" required>
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" required>
                        </div>

                        <div class="form-group full">
                            <label>Address</label>
                            <textarea name="address" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="contact_number" required>
                        </div>

                        <div class="form-group">
                            <label>Birthdate</label>
                            <input type="date" name="birthdate" required>
                        </div>

                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Civil Status</label>
                            <select name="civil_status" required>
                                <option value="">Select Civil Status</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Divorced">Divorced</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="owner_image" accept="image/*">
                        </div>

                        <div class="form-group full">
                            <label>Date and Time for Zoom Interview</label>
                            <input type="datetime-local" name="zoom_interview_date" required>
                        </div>
                    </div>

                    <button type="submit" class="submit-btn">Submit Application</button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>