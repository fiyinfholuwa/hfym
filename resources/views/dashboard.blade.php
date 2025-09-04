<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
            --shadow-light: rgba(0, 0, 0, 0.1);
            --shadow-medium: rgba(0, 0, 0, 0.15);
            --text-dark: #2d3748;
            --text-light: #718096;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            min-height: 100vh;
            margin: 0;
            color: var(--text-dark);
            line-height: 1.6;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .dashboard-header {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--glass-border);
            padding: 2rem 0;
            margin-bottom: 2rem;
            box-shadow: 0 8px 32px var(--shadow-light);
        }

        .dashboard-header h1 {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .dashboard-header p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.1rem;
        }

        .stats-card {
            backdrop-filter: blur(15px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 32px var(--shadow-light);
        }

        .stats-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 45px var(--shadow-medium);
        }

        .stats-card:hover::before {
            left: 100%;
        }

        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            background: var(--success-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .stats-label {
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table-container {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 25px;
            padding: 0;
            overflow: hidden;
            box-shadow: 0 20px 60px var(--shadow-medium);
            margin: 2rem 0;
        }

        .table {
            margin: 0;
            color: black;
        }

        .table thead {
        }

        .table th {
            color: black;
            font-weight: 600;
            border-bottom: 2px solid rgba(255, 255, 255, 0.2);
            padding: 1rem;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table td {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1rem;
            vertical-align: middle;
        }

        .table tbody tr {
            transition: all 0.3s ease;
            position: relative;
        }

        .table tbody tr:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: scale(1.01);
        }

        .badge-years {
            background: var(--secondary-gradient);
            color: black;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-weight: 500;
            font-size: 0.8rem;
        }

        .btn {
            border-radius: 25px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            border: none;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: var(--primary-gradient);
            color: black;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-outline-success {
            border: 2px solid #10b981;
            color: #10b981;
            background: transparent;
        }

        .btn-outline-success:hover {
            background: #10b981;
            color: black;
            transform: translateY(-2px);
        }

        .btn-outline-info {
            border: 2px solid #0ea5e9;
            color: #0ea5e9;
            background: transparent;
        }

        .btn-outline-info:hover {
            background: #0ea5e9;
            color: black;
            transform: translateY(-2px);
        }

        .btn-outline-primary {
            border: 2px solid #667eea;
            color: #667eea;
            background: transparent;
        }

        .btn-outline-primary:hover {
            background: #667eea;
            color: black;
            transform: translateY(-2px);
        }

        .modal-content {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 25px;
            color: black;
        }

        .modal-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding: 1.5rem;
        }

        .modal-title {
            font-weight: 600;
            font-size: 1.25rem;
        }

        .modal-body {
            padding: 2rem 1.5rem;
        }

        .btn-close {
            filter: invert(1);
            opacity: 0.8;
        }

        .btn-close:hover {
            opacity: 1;
        }

        .fade-in {
            animation: fadeInUp 0.6s ease forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .table tbody tr:nth-child(1) { animation-delay: 0.1s; }
        .table tbody tr:nth-child(2) { animation-delay: 0.2s; }
        .table tbody tr:nth-child(3) { animation-delay: 0.3s; }
        .table tbody tr:nth-child(4) { animation-delay: 0.4s; }
        .table tbody tr:nth-child(5) { animation-delay: 0.5s; }

        .loading-spinner {
            display: none;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9999;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: black;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        @media (max-width: 768px) {
            .dashboard-header h1 {
                font-size: 2rem;
            }
            
            .stats-card {
                margin-bottom: 1rem;
            }
            
            .table-responsive {
                font-size: 0.875rem;
            }
            
            .modal-body .d-flex {
                flex-direction: column;
                gap: 1rem;
            }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }
    </style>
</head>
<body>
    <!-- Loading Spinner -->
    <div class="loading-spinner" id="loadingSpinner">
        <div class="spinner"></div>
    </div>

    <!-- Header -->
    <div class="dashboard-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="mb-0">
                        <i class="bi bi-people-fill me-2"></i>Registration Dashboard
                    </h1>
                    <p class="mb-0 mt-2">Manage and search through registration records with style</p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <div class="stats-card d-inline-block">
                        <div class="stats-number" id="total-records">{{ count($registrations) }}</div>
                        <div class="stats-label">Total Records</div>
                    </div>
                </div>
            </div>

            <!-- Attendance stats -->
            <div class="row mt-4">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="stats-card">
                        <div class="stats-number">{{ $stats['husband_only'] }}</div>
                        <div class="stats-label">
                            <i class="bi bi-person me-1"></i>Husband Only
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="stats-card">
                        <div class="stats-number">{{ $stats['wife_only'] }}</div>
                        <div class="stats-label">
                            <i class="bi bi-person-heart me-1"></i>Wife Only
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-card">
                        <div class="stats-number">{{ $stats['both'] }}</div>
                        <div class="stats-label">
                            <i class="bi bi-people me-1"></i>Both Attending
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container-fluid px-3 px-md-4">
        <!-- Table Section -->
        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="registrationTable">
                    <thead>
                        <tr>
                            <th><i class="bi bi-hash me-1"></i>ID</th>
                            <th><i class="bi bi-person me-1"></i>Husband Name</th>
                            <th><i class="bi bi-person-heart me-1"></i>Wife Name</th>
                            <th><i class="bi bi-envelope me-1"></i>Email</th>
                            <th><i class="bi bi-telephone me-1"></i>Phone</th>
                            <th><i class="bi bi-calendar-event me-1"></i>Mode</th>
                            <th><i class="bi bi-geo-alt me-1"></i>Address</th>
                            <th><i class="bi bi-heart me-1"></i>Years</th>
                            <th><i class="bi bi-building me-1"></i>Church</th>
                            <th><i class="bi bi-chat-dots me-1"></i>Expectations</th>
                            <th><i class="bi bi-hand-thumbs-up me-1"></i>Prayer Requests</th>
                            <th><i class="bi bi-check-circle me-1"></i>Husband</th>
                            <th><i class="bi bi-check-circle me-1"></i>Wife</th>
                            <th><i class="bi bi-clock me-1"></i>Created</th>
                            <th><i class="bi bi-gear me-1"></i>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @forelse($registrations as $registration)
                        <tr class="">
                            <td><strong>{{ $registration->id }}</strong></td>
                            <td>{{ $registration->husband_name }}</td>
                            <td>{{ $registration->wife_name }}</td>
                            <td>{{ $registration->email }}</td>
                            <td>{{ $registration->phone }}</td>
                            <td>{{ $registration->coming_type }}</td>
                            <td>{{ $registration->address }}</td>
                            <td><span class="badge badge-years">{{ $registration->marriage_years }} years</span></td>
                            <td>{{ $registration->church }}</td>
                            <td>{{ $registration->expectations }}</td>
                            <td>{{ $registration->prayer_requests }}</td>
                            <td>
                                <span class="badge {{ $registration->husband_attendance == 'confirmed' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($registration->husband_attendance) }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $registration->wife_attendance == 'confirmed' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($registration->wife_attendance) }}
                                </span>
                            </td>
                            <td>{{ $registration->created_at->format('M d, Y H:i') }}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="openAttendanceModal({{ $registration->id }})">
                                    <i class="bi bi-check-circle me-1"></i>Confirm
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="15" class="text-center py-5">
                                <i class="bi bi-inbox display-4 d-block mb-3 opacity-50"></i>
                                <h5 class="text-muted">No records found</h5>
                                <p class="text-muted">Start by adding some registrations to see them here.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Attendance Modal -->
    <div class="modal fade" id="attendanceModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-check-circle me-2"></i>Confirm Attendance
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <p class="mb-4">Select who will be attending the event:</p>
                    <div class="d-flex justify-content-around flex-wrap gap-3">
                        <button class="btn btn-outline-success flex-fill" onclick="submitAttendance('husband')">
                            <i class="bi bi-person me-1"></i>Husband Only
                        </button>
                        <button class="btn btn-outline-info flex-fill" onclick="submitAttendance('wife')">
                            <i class="bi bi-person-heart me-1"></i>Wife Only
                        </button>
                        <button class="btn btn-outline-primary flex-fill" onclick="submitAttendance('both')">
                            <i class="bi bi-people me-1"></i>Both
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        let currentId = null;
        const loadingSpinner = document.getElementById('loadingSpinner');

        function showLoading() {
            loadingSpinner.style.display = 'flex';
        }

        function hideLoading() {
            loadingSpinner.style.display = 'none';
        }

        function openAttendanceModal(id) {
            currentId = id;
            const modal = new bootstrap.Modal(document.getElementById('attendanceModal'));
            modal.show();
        }

        function submitAttendance(type) {
            showLoading();
            
            fetch(`/registrations/${currentId}/confirm-attendance`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ attendance: type })
            })
            .then(res => res.json())
            .then(data => {
                hideLoading();
                if (data.success) {
                    // Show success animation
                    const modal = bootstrap.Modal.getInstance(document.getElementById('attendanceModal'));
                    modal.hide();
                    
                    // Show success notification
                    showNotification('Success!', data.message, 'success');
                    
                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                } else {
                    showNotification('Error!', data.message, 'error');
                }
            })
            .catch(err => {
                hideLoading();
                console.error(err);
                showNotification('Error!', 'Error updating attendance', 'error');
            });
        }

        function showNotification(title, message, type) {
            const notification = document.createElement('div');
            notification.className = `alert alert-${type === 'success' ? 'success' : 'danger'} position-fixed`;
            notification.style.cssText = `
                top: 20px;
                right: 20px;
                z-index: 10000;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.3);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255,255,255,0.2);
            `;
            notification.innerHTML = `
                <strong>${title}</strong> ${message}
                <button type="button" class="btn-close" onclick="this.parentElement.remove()"></button>
            `;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 5000);
        }

        // Add smooth scrolling
        document.addEventListener('DOMContentLoaded', function() {
            // Animate stats cards on load
            const statsCards = document.querySelectorAll('.stats-card');
            statsCards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.animation = `fadeInUp 0.6s ease forwards`;
                }, index * 100);
            });
        });

        // Add table row hover effects
        document.querySelectorAll('.table tbody tr').forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.02)';
                this.style.boxShadow = '0 5px 20px rgba(0,0,0,0.2)';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
                this.style.boxShadow = 'none';
            });
        });
    </script>
</body>
</html>