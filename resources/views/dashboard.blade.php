<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Custom CSS -->
    <style>
        
        .dashboard-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .search-container {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }
        
        .search-input {
            border: 2px solid #e9ecef;
            border-radius: 50px;
            padding: 12px 20px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .search-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        
        .table-container {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }
        
        .table {
            margin-bottom: 0;
            min-width: 1200px; /* Ensure table has minimum width for all columns */
        }
        
        .table thead th {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border: none;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            padding: 1rem 0.75rem;
            white-space: nowrap; /* Prevent header text wrapping */
        }
        
        .table tbody tr {
            transition: all 0.3s ease;
        }
        
        .table tbody tr:hover {
            background-color: #f8f9fa;
            transform: scale(1.002);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .table td {
            padding: 1rem 0.75rem;
            vertical-align: middle;
            border-color: #e9ecef;
            word-wrap: break-word; /* Allow long words to break */
            max-width: none; /* Remove any width restrictions */
        }
        
        /* Specific column styling for better readability */
        .table td:nth-child(6) { /* Address column */
            min-width: 200px;
            max-width: 300px;
        }
        
        .table td:nth-child(9) { /* Church column */
            min-width: 150px;
            max-width: 250px;
        }
        
        .table td:nth-child(10) { /* Expectations column */
            min-width: 200px;
            max-width: 400px;
        }
        
        .table td:nth-child(11) { /* Prayer Requests column */
            min-width: 200px;
            max-width: 400px;
        }
        
        .action-btn {
            padding: 0.375rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            margin: 0 2px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        
        .btn-edit {
            background: linear-gradient(45deg, #28a745, #20c997);
            color: white;
        }
        
        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(40, 167, 69, 0.3);
            color: white;
        }
        
        .btn-copy {
            background: linear-gradient(45deg, #007bff, #6610f2);
            color: white;
        }
        
        .btn-copy:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
            color: white;
        }
        
        .btn-delete {
            background: linear-gradient(45deg, #dc3545, #fd7e14);
            color: white;
        }
        
        .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
            color: white;
        }
        
        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .stats-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 0.5rem;
        }
        
        .stats-label {
            color: #6c757d;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .no-results {
            text-align: center;
            padding: 3rem;
            color: #6c757d;
        }
        
        .no-results i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }
        
        .badge-years {
            background: linear-gradient(45deg, #17a2b8, #6f42c1);
            color: white;
            font-weight: 500;
        }
        
        /* Enhanced table responsiveness without truncation */
        .table-responsive {
            max-height: 70vh; /* Limit table height for better navigation */
            overflow-y: auto;
        }
        
        @media (max-width: 768px) {
            .dashboard-header {
                padding: 1rem 0;
            }
            
            .table-responsive {
                font-size: 0.875rem;
                max-height: 60vh;
            }
            
            .action-btn {
                padding: 0.25rem 0.5rem;
                margin: 1px;
            }
            
            .table td {
                padding: 0.75rem 0.5rem;
            }
            
            /* Stack content vertically in mobile for better readability */
            .table td:nth-child(10), 
            .table td:nth-child(11) {
                min-width: 250px;
            }
        }
        
        .loading {
            opacity: 0.6;
            transition: opacity 0.3s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #6c757d;
        }
        
        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        /* Custom scrollbar for table */
        .table-responsive::-webkit-scrollbar {
            height: 8px;
            width: 8px;
        }
        
        .table-responsive::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }
        
        .table-responsive::-webkit-scrollbar-thumb {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 4px;
        }
        
        .table-responsive::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(45deg, #5a67d8, #6b46c1);
        }

        /* Full content display for important columns */
        .full-content {
            white-space: normal;
            word-break: break-word;
            line-height: 1.4;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="dashboard-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="mb-0"><i class="bi bi-people-fill me-2"></i>Registration Dashboard</h1>
                    <p class="mb-0 mt-1 opacity-75">Manage and search through registration records</p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <div class="stats-card d-inline-block">
                        <div class="stats-number" id="total-records">{{ count($registrations) }}</div>
                        <div class="stats-label">Total Records</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container-fluid px-3 px-md-4">
        <!-- Search Section -->
        <div class="search-container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent border-0">
                            <i class="bi bi-search"></i>
                        </span>
                        <input 
                            type="text" 
                            class="form-control search-input border-start-0" 
                            id="searchInput" 
                            placeholder="Search by name, email, phone, address, church, expectations..."
                            autocomplete="off"
                        >
                    </div>
                </div>
                <div class="col-md-4 mt-3 mt-md-0">
                    <div class="d-flex justify-content-md-end align-items-center">
                        <button class="btn btn-outline-primary me-2" onclick="clearSearch()">
                            <i class="bi bi-arrow-clockwise me-1"></i>Clear
                        </button>
                        <span class="text-muted">
                            Showing <span id="visible-count" class="fw-bold text-primary">{{ count($registrations) }}</span> records
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="registrationTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Husband Name</th>
                            <th>Wife Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Attendance Mode</th>
                            <th>Address</th>
                            <th>Marriage Years</th>
                            <th>Church</th>
                            <th>Expectations</th>
                            <th>Prayer Requests</th>
                            <th>Created At</th>
                            {{-- <th width="200">Actions</th> --}}
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @forelse($registrations as $registration)
                        <tr class="fade-in">
                            <td>{{ $registration->id }}</td>
                            <td>{{ $registration->husband_name }}</td>
                            <td>{{ $registration->wife_name }}</td>
                            <td>{{ $registration->email }}</td>
                            <td>{{ $registration->phone }}</td>
                            <td>{{ $registration->coming_type }}</td>
                            <td class="full-content">{{ $registration->address }}</td>
                            <td><span class="badge badge-years">{{ $registration->marriage_years }}</span></td>
                            <td class="full-content">{{ $registration->church }}</td>
                            <td class="full-content">{{ $registration->expectations }}</td>
                            <td class="full-content">{{ $registration->prayer_requests }}</td>
                            <td>{{ $registration->created_at->format('Y-m-d H:i') }}</td>
                            {{-- <td>
                                <button class="action-btn btn-edit" onclick="editRecord({{ $registration->id }})">
                                    <i class="bi bi-pencil me-1"></i>Edit
                                </button>
                                <button class="action-btn btn-copy" onclick="copyRecord(this)">
                                    <i class="bi bi-clipboard me-1"></i>Copy
                                </button>
                                <button class="action-btn btn-delete" onclick="deleteRecord({{ $registration->id }}, this)">
                                    <i class="bi bi-trash me-1"></i>Delete
                                </button>
                            </td> --}}
                        </tr>
                        @empty
                        <tr>
                            <td colspan="12" class="empty-state">
                                <i class="bi bi-inbox"></i>
                                <h4>No Registration Records</h4>
                                <p>There are no registration records to display at the moment.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- No Results Message -->
            <div id="noResults" class="no-results d-none">
                <i class="bi bi-search"></i>
                <h4>No Records Found</h4>
                <p>No registrations match your search criteria.</p>
                <button class="btn btn-primary" onclick="clearSearch()">
                    <i class="bi bi-arrow-clockwise me-1"></i>Clear Search
                </button>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        // Global variables
        let allRows = [];
        let filteredRows = [];

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            initializeTable();
            setupSearch();
            updateStats();
        });

        // Initialize table data
        function initializeTable() {
            const tbody = document.getElementById('tableBody');
            allRows = Array.from(tbody.querySelectorAll('tr:not([data-empty])'));
            
            // Mark empty state row
            const emptyRow = tbody.querySelector('td[colspan]');
            if (emptyRow) {
                emptyRow.closest('tr').setAttribute('data-empty', 'true');
            }
            
            filteredRows = [...allRows];
        }

        // Setup real-time search
        function setupSearch() {
            const searchInput = document.getElementById('searchInput');
            
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase().trim();
                performSearch(searchTerm);
            });

            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    this.blur();
                }
            });
        }

        // Perform search functionality
        function performSearch(searchTerm) {
            const tbody = document.getElementById('tableBody');
            const noResults = document.getElementById('noResults');
            const table = document.getElementById('registrationTable');
            
            // Skip if no data
            if (allRows.length === 0) return;
            
            tbody.classList.add('loading');
            
            setTimeout(() => {
                if (searchTerm === '') {
                    // Show all rows
                    filteredRows = [...allRows];
                    allRows.forEach(row => {
                        row.style.display = '';
                        row.classList.add('fade-in');
                    });
                } else {
                    // Filter rows based on search term
                    filteredRows = [];
                    
                    allRows.forEach(row => {
                        const cells = row.querySelectorAll('td:not(:last-child)');
                        const rowText = Array.from(cells).map(cell => {
                            return cell.textContent.toLowerCase();
                        }).join(' ');
                        
                        if (rowText.includes(searchTerm)) {
                            row.style.display = '';
                            row.classList.add('fade-in');
                            filteredRows.push(row);
                        } else {
                            row.style.display = 'none';
                            row.classList.remove('fade-in');
                        }
                    });
                }
                
                // Show/hide no results message
                if (filteredRows.length === 0 && searchTerm !== '' && allRows.length > 0) {
                    table.style.display = 'none';
                    noResults.classList.remove('d-none');
                } else {
                    table.style.display = '';
                    noResults.classList.add('d-none');
                }
                
                updateStats();
                tbody.classList.remove('loading');
            }, 100);
        }

        // Update statistics
        function updateStats() {
            const totalRecords = document.getElementById('total-records');
            const visibleCount = document.getElementById('visible-count');
            
            totalRecords.textContent = allRows.length;
            visibleCount.textContent = filteredRows.length;
        }

        // Clear search
        function clearSearch() {
            const searchInput = document.getElementById('searchInput');
            searchInput.value = '';
            performSearch('');
            searchInput.focus();
        }

        // Edit record function
        function editRecord(id) {
            showToast('Redirecting to edit page...', 'info');
            // Redirect to Laravel edit route
            window.location.href = `/registrations/${id}/edit`;
        }

        // Copy record function
        function copyRecord(button) {
            const row = button.closest('tr');
            const cells = row.querySelectorAll('td:not(:last-child)');
            const data = Array.from(cells).map(cell => {
                return cell.textContent.trim();
            });
            
            const tsvData = data.join('\t');
            
            if (navigator.clipboard) {
                navigator.clipboard.writeText(tsvData).then(() => {
                    const originalHTML = button.innerHTML;
                    button.innerHTML = '<i class="bi bi-check me-1"></i>Copied!';
                    button.classList.remove('btn-copy');
                    button.classList.add('btn-success');
                    
                    setTimeout(() => {
                        button.innerHTML = originalHTML;
                        button.classList.remove('btn-success');
                        button.classList.add('btn-copy');
                    }, 2000);
                    
                    showToast('Record data copied to clipboard!', 'success');
                }).catch(err => {
                    showToast('Failed to copy data. Please try again.', 'error');
                });
            } else {
                const textArea = document.createElement('textarea');
                textArea.value = tsvData;
                document.body.appendChild(textArea);
                textArea.select();
                try {
                    document.execCommand('copy');
                    showToast('Record data copied to clipboard!', 'success');
                } catch (err) {
                    showToast('Failed to copy data. Please try again.', 'error');
                }
                document.body.removeChild(textArea);
            }
        }

        // Delete record function
        function deleteRecord(id, button) {
            if (confirm('Are you sure you want to delete this registration record? This action cannot be undone.')) {
                const row = button.closest('tr');
                
                showToast('Deleting record...', 'info');
                
                // Make AJAX request to Laravel
                fetch(`/registrations/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Add fade out animation
                        row.style.opacity = '0';
                        row.style.transform = 'translateX(-100px)';
                        
                        setTimeout(() => {
                            row.remove();
                            // Update arrays
                            allRows = allRows.filter(r => r !== row);
                            filteredRows = filteredRows.filter(r => r !== row);
                            updateStats();
                            showToast('Record deleted successfully!', 'success');
                        }, 300);
                    } else {
                        showToast(data.message || 'Failed to delete record.', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('An error occurred while deleting the record.', 'error');
                });
            }
        }

        // Show toast notification
        function showToast(message, type = 'info') {
            const toastHTML = `
                <div class="toast align-items-center text-white bg-${type === 'success' ? 'success' : type === 'error' ? 'danger' : 'info'} border-0" role="alert">
                    <div class="d-flex">
                        <div class="toast-body">
                            <i class="bi bi-${type === 'success' ? 'check-circle' : type === 'error' ? 'x-circle' : 'info-circle'} me-2"></i>
                            ${message}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                    </div>
                </div>
            `;
            
            let toastContainer = document.getElementById('toastContainer');
            if (!toastContainer) {
                toastContainer = document.createElement('div');
                toastContainer.id = 'toastContainer';
                toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
                toastContainer.style.zIndex = '9999';
                document.body.appendChild(toastContainer);
            }
            
            const toastElement = document.createElement('div');
            toastElement.innerHTML = toastHTML;
            const toast = toastElement.firstElementChild;
            toastContainer.appendChild(toast);
            
            const bsToast = new bootstrap.Toast(toast);
            bsToast.show();
            
            toast.addEventListener('hidden.bs.toast', () => {
                toast.remove();
            });
        }

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'f') {
                e.preventDefault();
                document.getElementById('searchInput').focus();
            }
            
            if (e.key === 'Escape') {
                clearSearch();
            }
        });
    </script>
</body>
</html>