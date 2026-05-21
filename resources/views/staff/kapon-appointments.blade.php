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

        .table-card {
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
            min-width: 800px;
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

        .status.pending {
            background: #fff3cd;
            color: #856404;
        }

        .status.scheduled {
            background: #d0ebff;
            color: #1d4ed8;
        }

        .status.paid {
            background: #d1fae5;
            color: #065f46;
        }

        .status.rejected {
            background: #fde2e1;
            color: #7f1d1d;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .schedule-btn,
        .paid-btn,
        .reject-btn {
            border: none;
            padding: 10px 14px;
            border-radius: 12px;
            cursor: pointer;
            font-weight: bold;
            font-size: 13px;
        }

        .schedule-btn {
            background: #1f4d36;
            color: white;
        }

        .schedule-btn:hover {
            background: #2f6b4d;
        }

        .paid-btn {
            background: #047857;
            color: white;
        }

        .paid-btn:hover {
            background: #059669;
        }

        .reject-btn {
            background: #b8322a;
            color: white;
        }

        .reject-btn:hover {
            background: #92261f;
        }

        .fee-text {
            font-weight: bold;
            color: #1f4d36;
        }

        .no-action {
            color: #98a2b3;
            font-weight: bold;
        }

        /* Modal styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-overlay.active {
            display: flex;
        }

        .modal-content {
            background: white;
            padding: 30px;
            border-radius: 20px;
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #edf1ee;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .modal-header h2 {
            margin: 0;
            color: #1f4d36;
        }

        .close-modal {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #667085;
        }

        .close-modal:hover {
            color: #b8322a;
        }

        .modal-body {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .detail-group {
            margin-bottom: 15px;
        }

        .detail-label {
            font-size: 13px;
            color: #667085;
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .detail-value {
            color: #1f4d36;
            font-size: 16px;
            font-weight: 500;
        }

        .full-width {
            grid-column: span 2;
        }

        .view-btn {
            background: #eaf6ee;
            color: #1f4d36;
            border: 1px solid #1f4d36;
            padding: 10px 14px;
            border-radius: 12px;
            cursor: pointer;
            font-weight: bold;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .view-btn:hover {
            background: #1f4d36;
            color: white;
        }

        .empty-box {
            padding: 35px;
            text-align: center;
            color: #667085;
            font-weight: bold;
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
                <a href="{{ route('staff.animal') }}">Register Pet</a>
                <a href="{{ route('staff.adoption-application') }}">Adoption Applications</a>
                <a href="{{ route('staff.kapon-appointments') }}" class="active">Kapon Appointments</a>
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
                <h1>Kapon Appointments</h1>
                <p>Review kapon appointment requests, check owner and pet details, and update appointment status.</p>
            </div>

            <div class="table-card">
                <h2 class="table-title">Appointment List</h2>

                @if($appointments->isEmpty())
                <div class="empty-box">
                    No kapon appointments found.
                </div>
                @else
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Pet Image</th>
                                <th>Pet Name</th>
                                <th>Owner</th>
                                <th>Procedure</th>
                                <th>Appointment</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($appointments as $appointment)

                            <tr>
                                <td>
                                    @if($appointment->pet_photo)
                                    <img src="{{ asset('storage/' . $appointment->pet_photo) }}" class="animal-img" alt="{{ $appointment->pet_name }}">
                                    @else
                                    <span style="color:#98a2b3; font-weight:bold;">No image</span>
                                    @endif
                                </td>

                                <td>{{ $appointment->pet_name }}</td>

                                <td>{{ $appointment->owner_name }}</td>

                                <td>{{ $appointment->procedure_type ?? '-' }}</td>

                                <td>
                                    {{ $appointment->appointment_date ? $appointment->appointment_date->format('M d, Y H:i') : '-' }}
                                </td>

                                <td>
                                    <span class="status {{ strtolower($appointment->status) }}">
                                        {{ ucfirst($appointment->status) }}
                                    </span>
                                </td>

                                <td>
                                    <div class="action-buttons">
                                        <button type="button" class="view-btn" data-appointment="{{ json_encode($appointment) }}" data-fee="{{ $appointment->kapon_fee }}" onclick="openModal(this)"> View </button>
                                    </div>
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

    <!-- Modal -->
    <div class="modal-overlay" id="appointmentModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Appointment Details</h2>
                <button class="close-modal" onclick="closeModal()">&times;</button>
            </div>
            <div class="modal-body">
                <div class="full-width" style="text-align: center;">
                    <img id="m-pet-image" src="" alt="Pet Image" style="width: 150px; height: 150px; object-fit: cover; border-radius: 20px; display: none; margin: 0 auto 20px;">
                </div>

                <div class="full-width">
                    <h3 style="margin: 0; color: #1f4d36; border-bottom: 2px solid #edf1ee; padding-bottom: 5px;">Pet Information</h3>
                </div>

                <div class="detail-group">
                    <div class="detail-label">Pet Name</div>
                    <div class="detail-value" id="m-pet-name"></div>
                </div>
                <div class="detail-group">
                    <div class="detail-label">Species & Breed</div>
                    <div class="detail-value"><span id="m-pet-species"></span> - <span id="m-pet-breed"></span></div>
                </div>
                <div class="detail-group">
                    <div class="detail-label">Gender</div>
                    <div class="detail-value" id="m-pet-gender"></div>
                </div>
                <div class="detail-group">
                    <div class="detail-label">Age</div>
                    <div class="detail-value" id="m-pet-age"></div>
                </div>
                <div class="detail-group">
                    <div class="detail-label">Weight & Height</div>
                    <div class="detail-value"><span id="m-pet-weight"></span> kg / <span id="m-pet-height"></span> cm</div>
                </div>
                <div class="detail-group">
                    <div class="detail-label">Procedure</div>
                    <div class="detail-value" id="m-procedure"></div>
                </div>
                <div class="detail-group">
                    <div class="detail-label">Appointment Date</div>
                    <div class="detail-value" id="m-appointment"></div>
                </div>
                <div class="detail-group">
                    <div class="detail-label">Fee</div>
                    <div class="detail-value" id="m-fee"></div>
                </div>

                <div class="full-width">
                    <h3 style="margin: 20px 0 0; color: #1f4d36; border-bottom: 2px solid #edf1ee; padding-bottom: 5px;">Owner Information</h3>
                </div>

                <div class="detail-group">
                    <div class="detail-label">Owner Name</div>
                    <div class="detail-value" id="m-owner-name"></div>
                </div>
                <div class="detail-group">
                    <div class="detail-label">Contact</div>
                    <div class="detail-value" id="m-owner-contact"></div>
                </div>
                <div class="detail-group full-width">
                    <div class="detail-label">Address</div>
                    <div class="detail-value" id="m-owner-address"></div>
                </div>
            </div>

            <div class="modal-footer" id="modal-actions" style="margin-top: 20px; display: flex; gap: 10px; border-top: 1px solid #edf1ee; padding-top: 20px; justify-content: flex-end;">
                <!-- Actions injected via JS -->
            </div>
        </div>
    </div>

    <script>
        function openModal(button) {
            const data = JSON.parse(button.getAttribute('data-appointment'));
            const fee = button.getAttribute('data-fee');

            document.getElementById('m-pet-name').textContent = data.pet_name || '-';
            document.getElementById('m-pet-species').textContent = data.pet_species || '-';
            document.getElementById('m-pet-gender').textContent = data.pet_gender || '-';
            document.getElementById('m-pet-breed').textContent = data.pet_breed || '-';
            document.getElementById('m-pet-age').textContent = data.pet_age || '-';
            document.getElementById('m-pet-weight').textContent = data.pet_weight || '-';
            document.getElementById('m-pet-height').textContent = data.pet_height || '-';
            document.getElementById('m-procedure').textContent = data.procedure_type || '-';

            let formattedDate = '-';
            if (data.appointment_date) {
                const dateObj = new Date(data.appointment_date);
                if (!isNaN(dateObj)) {
                    formattedDate = dateObj.toLocaleString('en-US', {
                        month: 'short',
                        day: 'numeric',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                } else {
                    formattedDate = data.appointment_date;
                }
            }
            document.getElementById('m-appointment').textContent = formattedDate;

            document.getElementById('m-fee').textContent = fee ? '₱ ' + new Intl.NumberFormat().format(fee) : '-';

            document.getElementById('m-owner-name').textContent = data.owner_name || '-';
            document.getElementById('m-owner-contact').textContent = (data.owner_email || '') + ' | ' + (data.owner_mobile || '');
            document.getElementById('m-owner-address').textContent = data.owner_address || '-';

            if (data.pet_photo) {
                document.getElementById('m-pet-image').src = '/storage/' + data.pet_photo;
                document.getElementById('m-pet-image').style.display = 'block';
            } else {
                document.getElementById('m-pet-image').style.display = 'none';
            }

            const actionsContainer = document.getElementById('modal-actions');
            actionsContainer.innerHTML = '';

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            if (['pending', 'scheduled'].includes(data.status.toLowerCase())) {
                let html = '';
                if (data.status.toLowerCase() === 'pending') {
                    html += `
                        <form method="POST" action="/staff/kapon/${data.id}/status">
                            <input type="hidden" name="_token" value="${csrfToken}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="status" value="scheduled">
                            <button type="submit" class="schedule-btn">Schedule</button>
                        </form>
                    `;
                }

                if (data.status.toLowerCase() === 'scheduled') {
                    html += `
                        <form method="POST" action="/staff/kapon/${data.id}/status">
                            <input type="hidden" name="_token" value="${csrfToken}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="status" value="paid">
                            <button type="submit" class="paid-btn">Mark Paid</button>
                        </form>
                    `;
                }

                html += `
                    <form method="POST" action="/staff/kapon/${data.id}/status">
                        <input type="hidden" name="_token" value="${csrfToken}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="status" value="rejected">
                        <button type="submit" class="reject-btn">Reject</button>
                    </form>
                `;
                actionsContainer.innerHTML = html;
                actionsContainer.style.display = 'flex';
            } else {
                actionsContainer.style.display = 'none';
            }

            document.getElementById('appointmentModal').classList.add('active');
        }

        function closeModal() {
            document.getElementById('appointmentModal').classList.remove('active');
        }
    </script>
</x-app-layout>