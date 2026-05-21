{{-- resources/views/admin/adoption-applications.blade.php --}}
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

        .alert {
            padding: 14px 18px;
            border-radius: 14px;
            margin-bottom: 18px;
            font-weight: bold;
        }

        .alert-success {
            background: #dff7e7;
            color: #1f4d36;
        }

        .alert-error {
            background: #fde2e1;
            color: #7f1d1d;
        }

        .table-card {
            background: white;
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
            min-width: 1150px;
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

        .status {
            padding: 8px 15px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: bold;
            display: inline-block;
            text-transform: capitalize;
        }

        .pending {
            background: #fff3cd;
            color: #856404;
        }

        .approved {
            background: #dff7e7;
            color: #1f4d36;
        }

        .rejected {
            background: #fde2e1;
            color: #7f1d1d;
        }

        .btn {
            border: none;
            padding: 10px 14px;
            border-radius: 12px;
            font-weight: bold;
            cursor: pointer;
            font-size: 13px;
        }

        .view-btn,
        .approve-btn {
            background: #1f4d36;
            color: white;
        }

        .view-btn:hover,
        .approve-btn:hover {
            background: #2f6b4d;
        }

        .paid-btn {
            background: #d98f00;
            color: white;
        }

        .paid-btn:hover {
            background: #b87500;
        }

        .reject-btn {
            background: #b8322a;
            color: white;
        }

        .reject-btn:hover {
            background: #92261f;
        }

        .btn:disabled {
            background: #98a2b3;
            cursor: not-allowed;
        }

        .empty-box {
            padding: 35px;
            text-align: center;
            color: #667085;
            font-weight: bold;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .modal-content {
            background: white;
            width: 760px;
            max-width: 95%;
            border-radius: 24px;
            position: relative;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.18);
        }

        .modal-header {
            padding: 24px 28px;
            border-bottom: 1px solid #e7eee9;
            background: #fbfdfb;
            border-radius: 24px 24px 0 0;
        }

        .modal-header h2 {
            color: #1f4d36;
            margin: 0;
            font-size: 24px;
        }

        .close {
            position: absolute;
            top: 18px;
            right: 24px;
            font-size: 30px;
            cursor: pointer;
            color: #667085;
        }

        .modal-body {
            padding: 28px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .info-box {
            background: #f5faf6;
            padding: 15px;
            border-radius: 14px;
            color: #344054;
        }

        .info-box strong {
            display: block;
            color: #1f4d36;
            margin-bottom: 5px;
            font-size: 13px;
            text-transform: uppercase;
        }

        .full-box {
            margin-top: 15px;
        }

        .decision-box {
            margin-top: 25px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
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

            .info-grid {
                grid-template-columns: 1fr;
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

                <a href="{{ route('admin.animal.index') }}">Manage Animals</a>
                <a href="{{ route('admin.adoption.applications') }}" class="active">Manage Adoption Applications</a>

            </div>

            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button class="logout-btn">Logout</button>
            </form>
        </div>

        <div class="content">
            <div class="page-header">
                <h1>Manage Adoption Applications</h1>
                <p>Review staff-approved applications, record payment, and make the final adoption decision.</p>
            </div>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
            @endif

            <div class="table-card">
                <h2 class="table-title">Application List</h2>

                @if($applications->isEmpty())
                <div class="empty-box">
                    No adoption applications found.
                </div>
                @else
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Application ID</th>
                                <th>Adopter</th>
                                <th>Pet</th>
                                <th>Staff Status</th>
                                <th>Fee</th>
                                <th>Payment</th>
                                <th>Final Status</th>
                                <th>Submitted Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($applications as $application)
                            @php
                            $species = $application->animal->species ?? 'N/A';
                            $fee = $species == 'Cat' ? 500 : 1000;
                            $paymentStatus = $application->payment_status ?? 'Unpaid';
                            @endphp

                            <tr>
                                <td>#{{ $application->application_id }}</td>
                                <td>{{ $application->user->name ?? 'N/A' }}</td>
                                <td>{{ $application->animal->name ?? 'N/A' }}</td>

                                <td>
                                    <span class="status approved">
                                        Approved by Staff {{ $application->registeredBy->name ?? 'N/A' }}
                                    </span>
                                </td>

                                <td>₱{{ number_format($fee, 2) }}</td>

                                <td>
                                    <span class="status {{ $paymentStatus == 'Paid' ? 'approved' : 'pending' }}">
                                        {{ $paymentStatus }}
                                    </span>
                                </td>

                                <td>
                                    <span class="status 
                                                {{ $application->status == 'Approved' ? 'approved' : 
                                                ($application->status == 'Rejected' ? 'rejected' : 'pending') }}">
                                        {{ $application->status }}
                                    </span>
                                </td>

                                <td>{{ $application->created_at->format('M d, Y') }}</td>

                                <td>
                                    <button
                                        class="btn view-btn"
                                        data-id="{{ $application->application_id }}"
                                        data-adopter="{{ $application->user->name ?? 'N/A' }}"
                                        data-email="{{ $application->user->email ?? 'N/A' }}"
                                        data-contact="{{ $application->contact_number ?? 'N/A' }}"
                                        data-address="{{ $application->address ?? 'N/A' }}"
                                        data-pet="{{ $application->animal->name ?? 'N/A' }}"
                                        data-species="{{ $species }}"
                                        data-breed="{{ $application->animal->breed ?? 'N/A' }}"
                                        data-gender="{{ $application->animal->gender ?? 'N/A' }}"
                                        data-age="{{ $application->animal->age ?? 'N/A' }}"
                                        data-reason="{{ $application->reason ?? 'N/A' }}"
                                        data-fee="{{ number_format($fee, 2) }}"
                                        data-payment-status="{{ $paymentStatus }}"
                                        data-status="{{ $application->status }}"
                                        data-approve-url="{{ route('admin.adoption.approve', $application->application_id) }}"
                                        data-reject-url="{{ route('admin.adoption.reject', $application->application_id) }}"
                                        data-paid-url="{{ route('admin.adoption.paid', $application->application_id) }}"
                                        onclick="openModal(this)">
                                        View
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="modal" id="applicationModal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>

            <div class="modal-header">
                <h2>Adoption Application Details</h2>
            </div>

            <div class="modal-body">
                <div class="info-grid">
                    <div class="info-box">
                        <strong>Application ID</strong>
                        <span id="modalApplicationId"></span>
                    </div>

                    <div class="info-box">
                        <strong>Adopter Name</strong>
                        <span id="modalAdopterName"></span>
                    </div>

                    <div class="info-box">
                        <strong>Email</strong>
                        <span id="modalEmail"></span>
                    </div>

                    <div class="info-box">
                        <strong>Contact Number</strong>
                        <span id="modalContact"></span>
                    </div>

                    <div class="info-box">
                        <strong>Address</strong>
                        <span id="modalAddress"></span>
                    </div>

                    <div class="info-box">
                        <strong>Pet Name</strong>
                        <span id="modalPetName"></span>
                    </div>

                    <div class="info-box">
                        <strong>Species</strong>
                        <span id="modalSpecies"></span>
                    </div>

                    <div class="info-box">
                        <strong>Breed</strong>
                        <span id="modalBreed"></span>
                    </div>

                    <div class="info-box">
                        <strong>Gender</strong>
                        <span id="modalGender"></span>
                    </div>

                    <div class="info-box">
                        <strong>Age</strong>
                        <span id="modalAge"></span>
                    </div>

                    <div class="info-box">
                        <strong>Adoption Fee</strong>
                        ₱<span id="modalFee"></span>
                    </div>

                    <div class="info-box">
                        <strong>Payment Status</strong>
                        <span id="modalPaymentStatus"></span>
                    </div>
                </div>

                <div class="info-box full-box">
                    <strong>Reason for Adoption</strong>
                    <span id="modalReason"></span>
                </div>

                <div class="decision-box">
                    <form method="POST" id="paidForm">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn paid-btn" id="paidButton">
                            Mark as Paid
                        </button>
                    </form>

                    <form method="POST" id="approveForm">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn approve-btn" id="approveButton">
                            Approve Final Adoption
                        </button>
                    </form>

                    <form method="POST" id="rejectForm">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn reject-btn" id="rejectButton">
                            Reject Application
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleUsersDropdown() {
            document.getElementById("usersDropdown").classList.toggle("show");
        }

        function openModal(btn) {
            const d = btn.dataset;

            document.getElementById('modalApplicationId').innerText = '#' + d.id;
            document.getElementById('modalAdopterName').innerText = d.adopter;
            document.getElementById('modalEmail').innerText = d.email;
            document.getElementById('modalContact').innerText = d.contact;
            document.getElementById('modalAddress').innerText = d.address;
            document.getElementById('modalPetName').innerText = d.pet;
            document.getElementById('modalSpecies').innerText = d.species;
            document.getElementById('modalBreed').innerText = d.breed;
            document.getElementById('modalGender').innerText = d.gender;
            document.getElementById('modalAge').innerText = d.age;
            document.getElementById('modalReason').innerText = d.reason;
            document.getElementById('modalFee').innerText = d.fee;
            document.getElementById('modalPaymentStatus').innerText = d.paymentStatus;

            document.getElementById('approveForm').action = d.approveUrl;
            document.getElementById('rejectForm').action = d.rejectUrl;
            document.getElementById('paidForm').action = d.paidUrl;

            const approveButton = document.getElementById('approveButton');
            const paidButton = document.getElementById('paidButton');
            const rejectButton = document.getElementById('rejectButton');

            if (d.status === 'Approved') {

                approveButton.disabled = true;
                approveButton.innerText = 'Already Approved';

                paidButton.disabled = true;
                paidButton.innerText = 'Already Paid';

                rejectButton.disabled = true;
                rejectButton.innerText = 'Cannot Reject Approved Application';

            } else if (d.paymentStatus !== 'Paid') {

                approveButton.disabled = true;
                approveButton.innerText = 'Payment Required First';

                paidButton.disabled = false;
                paidButton.innerText = 'Mark as Paid';

                rejectButton.disabled = false;
                rejectButton.innerText = 'Reject Application';

            } else {

                approveButton.disabled = false;
                approveButton.innerText = 'Approve Final Adoption';

                paidButton.disabled = true;
                paidButton.innerText = 'Already Paid';

                rejectButton.disabled = true;
                rejectButton.innerText = 'Cannot Reject Paid Application';
            }

            document.getElementById('applicationModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('applicationModal').style.display = 'none';
        }
    </script>
</x-app-layout>