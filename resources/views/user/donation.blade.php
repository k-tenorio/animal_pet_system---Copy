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
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .page-header {
            background: white;
            width: 100%;
            max-width: 850px;
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
            max-width: 850px;
            padding: 30px;
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
            min-height: 90px;
        }

        .submit-btn {
            margin-top: 25px;
            width: 100%;
            padding: 14px;
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

        .success-message,
        .error-message {
            margin-bottom: 20px;
            padding: 16px 20px;
            border-radius: 14px;
            font-weight: bold;
        }

        .success-message {
            background: #dff7e7;
            color: #1f4d36;
        }

        .error-message {
            background: #fde2e1;
            color: #7f1d1d;
        }

        .error-message ul {
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

            .form-card {
                max-width: 100%;
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
                <a href="{{ route('user.donation') }}" class="active">Donate</a>
                <a href="{{ route('user.my-appointments') }}">My Appointments</a>
            </div>

            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <div class="content">
            <div class="page-header">
                <h1>Donation Page</h1>
                <p>Support PawMily Home by sending your donation today.</p>
            </div>

            <div class="form-card">
                @if(session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
                @endif

                @if($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('donation.store') }}">
                    @csrf

                    <div class="form-grid">
                        <div class="form-group full">
                            <label>Name</label>
                            <input type="text" name="donor_name" value="{{ old('donor_name') }}" required>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="donor_email" value="{{ old('donor_email') }}" required>
                        </div>

                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="text" name="donor_contact_number" value="{{ old('donor_contact_number') }}" required>
                        </div>

                        <div class="form-group">
                            <label>Amount</label>
                            <input type="number" name="amount" step="0.01" value="{{ old('amount') }}" required>
                        </div>

                        <div class="form-group full">
                            <label>Payment Method</label>
                            <select name="payment_method" required>
                                <option value="">Select Payment Method</option>
                                <option value="Credit Card" {{ old('payment_method') == 'Credit Card' ? 'selected' : '' }}>Credit Card</option>
                                <option value="GCash" {{ old('payment_method') == 'GCash' ? 'selected' : '' }}>GCash</option>
                                <option value="Bank Transfer" {{ old('payment_method') == 'Bank Transfer' ? 'selected' : '' }}>Bank Transfer</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="submit-btn">Donate Now</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>