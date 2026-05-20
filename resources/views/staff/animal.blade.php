<x-app-layout>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #eef5ef;
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 260px;
            background: linear-gradient(180deg, #1f4d36, #163827);
            color: white;
            padding: 28px 22px;
            display: flex;
            flex-direction: column;
        }

        .sidebar h2 {
            text-align: center;
            font-size: 26px;
            margin-bottom: 35px;
        }

        .sidebar-menu {
            flex: 1;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 14px 16px;
            margin-bottom: 12px;
            border-radius: 10px;
            font-weight: bold;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #3b7a57;
        }

        .logout-form {
            margin-top: auto;
        }

        .logout-btn {
            width: 100%;
            border: none;
            background: #c0392b;
            color: white;
            padding: 13px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
        }

        .content {
            flex: 1;
            padding: 35px;
        }

        .page-header {
            margin-bottom: 25px;
        }

        .page-header h1 {
            color: #1f4d36;
            font-size: 32px;
            margin-bottom: 5px;
        }

        .page-header p {
            color: #667;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .form-title {
            color: #1f4d36;
            margin-bottom: 5px;
        }

        .form-subtitle {
            color: #777;
            margin-bottom: 25px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
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
            margin-bottom: 7px;
        }

        input,
        select,
        textarea {
            padding: 13px;
            border: 1px solid #c9d8ce;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
            background: #fafafa;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #1f4d36;
            background: white;
            box-shadow: 0 0 0 3px rgba(31, 77, 54, 0.12);
        }

        textarea {
            resize: none;
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
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
        }

        .cancel-btn {
            background: #e0e0e0;
            color: #333;
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
            padding: 25px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            overflow-x: auto;
        }

        .table-title {
            color: #1f4d36;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            background: #1f4d36;
            color: white;
            padding: 14px;
            text-align: left;
        }

        table td {
            padding: 14px;
            border-bottom: 1px solid #e5e5e5;
        }

        table tr:hover {
            background: #f7faf7;
        }

        .status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            display: inline-block;
        }

        .status.available {
            background: #d4f5dd;
            color: #1e7a3e;
        }

        .status.adopted {
            background: #ffe0e0;
            color: #c0392b;
        }



        @media (max-width: 768px) {
            .dashboard {
                flex-direction: column;
            }

            .sidebar {
                width: auto;
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
            <h2>PawMily Home</h2>

            <div class="sidebar-menu">
                <a href="{{ route('staff.animal') }}" class="active">Animal Management</a>
                <a href="#">Adoption Applications</a>
                <a href="#">Kapon Appointments</a>
            </div>

            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <div class="content">

                @if(session('success'))
                <div style="
                    background: #d4f5dd;
                    color: #1e7a3e;
                    padding: 15px;
                    border-radius: 10px;
                    margin-bottom: 20px;
                    font-weight: bold;
                ">
                    {{ session('success') }}
                </div>
            @endif

            <div class="page-header">
                <h1>Animal Management</h1>
                <p>Add and manage pets available for adoption.</p>
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
                                <img src="{{ asset('storage/' . $animal->image) }}"
                                    width="70"
                                    height="70"
                                    style="border-radius:10px; object-fit:cover;">
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

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>