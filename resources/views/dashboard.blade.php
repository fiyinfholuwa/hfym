<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Dashboard</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- ✅ DataTables Bootstrap5 -->
  <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

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
    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
      background-size: 400% 400%;
      animation: gradientShift 15s ease infinite;
      min-height: 100vh;
      margin: 0;
      color: var(--text-dark);
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
      font-weight: 700;
      font-size: 2.5rem;
    }
    .stats-card {
      backdrop-filter: blur(15px);
      border: 1px solid var(--glass-border);
      border-radius: 20px;
      padding: 1.5rem;
      text-align: center;
      transition: all 0.3s ease;
      position: relative;
      box-shadow: 0 8px 32px var(--shadow-light);
    }
    .stats-number {
      font-size: 2.5rem;
      font-weight: 700;
      background: var(--success-gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 0.5rem;
    }
    .stats-label {
      color: rgba(255, 255, 255, 0.9);
      font-weight: 500;
      text-transform: uppercase;
      font-size: 0.9rem;
    }
    .table-container {
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      border: 1px solid var(--glass-border);
      border-radius: 25px;
      overflow: hidden;
      box-shadow: 0 20px 60px var(--shadow-medium);
      margin: 2rem 0;
    }
    .table th {
      font-weight: 600;
      border-bottom: 2px solid rgba(255, 255, 255, 0.2);
      padding: 1rem;
      text-transform: uppercase;
      font-size: 0.85rem;
    }
    .table td {
      padding: 1rem;
      vertical-align: middle;
    }
    .table tbody tr:hover {
      background: rgba(255, 255, 255, 0.1);
      transform: scale(1.01);
    }
    .badge-years {
      background: var(--secondary-gradient);
      color: black;
      padding: 0.4rem 0.9rem;
      border-radius: 25px;
      font-size: 0.75rem;
    }
    .btn {
      border-radius: 25px;
      font-weight: 500;
      text-transform: uppercase;
      transition: 0.3s ease;
      border: none;
    }
    .btn-primary {
      background: var(--primary-gradient);
      color: black;
    }
    .modal-content {
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      border: 1px solid var(--glass-border);
      border-radius: 25px;
      color: black;
    }
    /* Custom DataTables tweaks */
    .dataTables_filter input {
      border-radius: 25px !important;
      padding: 0.5rem 1rem !important;
      border: 1px solid var(--glass-border);
      background: rgba(255,255,255,0.2);
      color: black;
    }
    .dataTables_length select {
      border-radius: 10px;
      border: 1px solid var(--glass-border);
    }
  </style>
</head>
<body>
  <!-- Header -->
  <div class="dashboard-header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-8">
          <h1><i class="bi bi-people-fill me-2"></i>Registration Dashboard</h1>
          <p class="mb-0 mt-2">Manage and search through registration records with style</p>
        </div>
        <div class="col-md-4 text-md-end">
          <div class="stats-card d-inline-block">
            <div class="stats-number">{{ count($registrations) }}</div>
            <div class="stats-label">Total Records</div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-4 mb-3">
          <div class="stats-card"><div class="stats-number">{{ $stats['husband_only'] }}</div><div class="stats-label"><i class="bi bi-person me-1"></i>Husband Only</div></div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="stats-card"><div class="stats-number">{{ $stats['wife_only'] }}</div><div class="stats-label"><i class="bi bi-person-heart me-1"></i>Wife Only</div></div>
        </div>
        <div class="col-md-4">
          <div class="stats-card"><div class="stats-number">{{ $stats['both'] }}</div><div class="stats-label"><i class="bi bi-people me-1"></i>Both Attending</div></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Table -->
  <div class="container-fluid px-3 px-md-4">
    <div class="table-container p-3">
      <div class="table-responsive">
        <table class="table table-hover align-middle" id="registrationTable">
          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Husband</th>
              <th>Wife</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Mode</th>
              <th>Address</th>
              <th>Years</th>
              <th>Church</th>
              <th>Expectations</th>
              <th>Prayers</th>
              <th>Husband</th>
              <th>Wife</th>
              <th>Created</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($registrations as $registration)
              <tr>
                <td><strong>{{ $registration->id }}</strong></td>
                <td>{{ $registration->husband_name }}</td>
                <td>{{ $registration->wife_name }}</td>
                <td>{{ $registration->email }}</td>
                <td>{{ $registration->phone }}</td>
                <td>{{ $registration->coming_type }}</td>
                <td>{{ $registration->address }}</td>
                <td><span class="badge-years">{{ $registration->marriage_years }} yrs</span></td>
                <td>{{ $registration->church }}</td>
                <td>{{ $registration->expectations }}</td>
                <td>{{ $registration->prayer_requests }}</td>
                <td><span class="badge {{ $registration->husband_attendance == 'confirmed' ? 'bg-success' : 'bg-secondary' }}">{{ ucfirst($registration->husband_attendance) }}</span></td>
                <td><span class="badge {{ $registration->wife_attendance == 'confirmed' ? 'bg-success' : 'bg-secondary' }}">{{ ucfirst($registration->wife_attendance) }}</span></td>
                <td>{{ $registration->created_at->format('M d, Y H:i') }}</td>
                <td><button class="btn btn-sm btn-primary" onclick="openAttendanceModal({{ $registration->id }})"><i class="bi bi-check-circle me-1"></i>Confirm</button></td>
              </tr>
            @empty
              <tr><td colspan="15" class="text-center py-4">No records found</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Attendance Modal -->
  <div class="modal fade" id="attendanceModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="bi bi-check-circle me-2"></i>Confirm Attendance</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body text-center">
          <p>Select who will be attending:</p>
          <div class="d-flex justify-content-around gap-2 flex-wrap">
            <button class="btn btn-outline-success" onclick="submitAttendance('husband')">Husband Only</button>
            <button class="btn btn-outline-info" onclick="submitAttendance('wife')">Wife Only</button>
            <button class="btn btn-outline-primary" onclick="submitAttendance('both')">Both</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JS -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#registrationTable').DataTable({
        responsive: true,
        pageLength: 10,
        order: [[0, 'desc']],
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records..."
        }
      });
    });

    let currentId = null;
    function openAttendanceModal(id) {
      currentId = id;
      new bootstrap.Modal(document.getElementById('attendanceModal')).show();
    }
    function submitAttendance(type) {
      fetch(`/registrations/${currentId}/confirm-attendance`, {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ attendance: type })
      }).then(res => res.json())
      .then(data => { if(data.success){ location.reload(); }});
    }
  </script>
</body>
</html>
