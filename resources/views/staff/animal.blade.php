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

        .card {
            background: white;
            padding: 30px;
            border-radius: 22px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
        }

        .form-title {
            color: #1f4d36;
            margin: 0 0 6px;
            font-size: 24px;
        }

        .form-subtitle {
            color: #667085;
            margin: 0 0 25px;
            font-size: 14px;
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
            min-height: 120px;
        }

        .buttons {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 28px;
        }

        .cancel-btn,
        .add-btn {
            border: none;
            padding: 13px 22px;
            border-radius: 14px;
            cursor: pointer;
            font-weight: bold;
        }

        .cancel-btn {
            background: #edf1ee;
            color: #344054;
        }

        .cancel-btn:hover {
            background: #dfe8e2;
        }

        .add-btn {
            background: #1f4d36;
            color: white;
        }

        .add-btn:hover {
            background: #2f6b4d;
        }

        .table-card {
            margin-top: 30px;
            background: white;
            padding: 0;
            border-radius: 22px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
            overflow: hidden;
        }

        .table-title {
            color: #1f4d36;
            margin: 0;
            padding: 24px 28px;
            font-size: 23px;
            border-bottom: 1px solid #e7eee9;
            background: #fbfdfb;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 950px;
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
        }

        table tr:hover td {
            background: #f9fcfa;
        }

        table tr:last-child td {
            border-bottom: none;
        }

        .animal-img {
            width: 70px;
            height: 70px;
            border-radius: 16px;
            object-fit: cover;
            border: 1px solid #e5e7eb;
        }

        .status {
            padding: 8px 15px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: bold;
            display: inline-block;
            text-transform: capitalize;
        }

        .status.available {
            background: #dff7e7;
            color: #1f4d36;
        }

        .status.adopted {
            background: #fde2e1;
            color: #7f1d1d;
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

            .buttons {
                flex-direction: column;
            }

            .cancel-btn,
            .add-btn {
                width: 100%;
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
                <a href="{{ route('staff.animal') }}" class="active">Register Pet</a>
                <a href="{{ route('staff.adoption-application') }}">Adoption Applications</a>
                <a href="#">Kapon Appointments</a>
                <a href="{{ route('staff.adoption-approved') }}">Reviewed Applications</a>
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
                <h1>Add Animal</h1>
                <p>Add an animal available for adoption.</p>
            </div>

            <div class="card">
                <h2 class="form-title">Add Animal</h2>
                <p class="form-subtitle">Register a new pet profile.</p>

                <form method="POST" action="{{ route('staff.animal.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-grid">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Enter animal name">
                        </div>

                        <div class="form-group">
                            <label>Species</label>
                            <select name="species">
                                <option value="">Select species</option>
                                <option value="Dog">Dog</option>
                                <option value="Cat">Cat</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender">
                                <option value="">Select gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Breed</label>
                            <input type="text" name="breed" placeholder="Enter breed">
                        </div>

                        <div class="form-group">
                            <label>Age</label>
                            <input type="number" name="age" placeholder="Enter age">
                        </div>

                        <div class="form-group">
                            <label>Height (cm)</label>
                            <input type="text" name="height" placeholder="Example: 30 cm">
                        </div>

                        <div class="form-group">
                            <label>Weight (kg)</label>
                            <input type="text" name="weight" placeholder="Example: 8 kg">
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image">
                        </div>

                        <div class="form-group full">
                            <label>Description</label>
                            <textarea name="description" placeholder="Write short description about the animal"></textarea>
                        </div>
                    </div>

                    <div class="buttons">
                        <button type="reset" class="cancel-btn">Clear</button>
                        <button type="submit" class="add-btn">Add Animal</button>
                    </div>
                </form>
            </div>

            <div class="table-card">
                <h2 class="table-title">Animal List</h2>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Species</th>
                                <th>Gender</th>
                                <th>Breed</th>
                                <th>Age</th>
                                <th>Height</th>
                                <th>Weight</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($animals as $animal)
                            <tr>
                                <td>
                                    @if($animal->image)
                                    <img src="{{ asset('storage/' . $animal->image) }}" class="animal-img" alt="{{ $animal->name }}">
                                    @else
                                    <span style="color:#98a2b3; font-weight:bold;">No image</span>
                                    @endif
                                </td>

                                <td>{{ $animal->name }}</td>
                                <td>{{ $animal->species }}</td>
                                <td>{{ $animal->gender }}</td>
                                <td>{{ $animal->breed }}</td>
                                <td>{{ $animal->age }}</td>
                                <td>{{ $animal->height }} cm</td>
                                <td>{{ $animal->weight }} kg</td>

                                <td>
                                    <span class="status {{ strtolower($animal->status) }}">
                                        {{ $animal->status }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>