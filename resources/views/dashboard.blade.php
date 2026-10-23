<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Registration dashboard · Rhema House</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        :root {
            --navy: #062d6b;
            --navy-deep: #041b42;
            --blue: #0a4388;
            --red: #e2232a;
            --red-dark: #c91920;
            --ink: #102b50;
            --muted: #6d7b8f;
            --line: #e2e9f2;
            --soft: #f4f7fb;
            --white: #fff;
            --shadow: 0 18px 48px rgba(6,45,107,.09);
        }
        * { box-sizing: border-box; }
        body { min-height: 100vh; margin: 0; color: var(--ink); background: var(--soft); font-family: 'DM Sans', sans-serif; font-size: 15px; overflow-x: hidden; }
        a { color: inherit; }
        .app-shell { min-height: 100vh; display: flex; }
        .sidebar { position: fixed; inset: 0 auto 0 0; z-index: 20; width: 248px; display: flex; flex-direction: column; padding: 25px 17px; color: rgba(255,255,255,.76); background: linear-gradient(165deg, var(--navy), var(--navy-deep)); overflow-y: auto; }
        .sidebar-brand { display: block; padding: 7px 10px 25px; border-bottom: 1px solid rgba(255,255,255,.13); }
        .sidebar-brand img { display: block; width: 178px; max-width: 100%; height: auto; padding: 7px; border-radius: 12px; background: #fff; }
        .sidebar-label { margin: 28px 12px 10px; color: #c4d6ec; font-size: .68rem; font-weight: 700; letter-spacing: .16em; text-transform: uppercase; }
        .sidebar-nav { display: grid; gap: 6px; }
        .sidebar-nav a { display: flex; align-items: center; gap: 12px; padding: 12px 13px; border-radius: 12px; color: rgba(255,255,255,.7); text-decoration: none; font-weight: 600; transition: color .2s ease, background .2s ease; }
        .sidebar-nav a i { width: 20px; color: #c4d6ec; font-size: 1.05rem; text-align: center; }
        .sidebar-nav a.active, .sidebar-nav a:hover { color: #fff; background: rgba(255,255,255,.12); }
        .sidebar-nav a.active { box-shadow: inset 3px 0 0 var(--red); }
        .sidebar-footer { margin-top: auto; padding: 18px 12px 4px; border-top: 1px solid rgba(255,255,255,.13); }
        .user-mini { display: flex; align-items: center; gap: 10px; margin-bottom: 17px; }
        .user-avatar { width: 34px; height: 34px; display: grid; place-items: center; border-radius: 50%; color: var(--navy); background: #c4d6ec; font-weight: 700; }
        .user-mini strong { display: block; color: #fff; font-size: .82rem; }
        .user-mini span { display: block; color: rgba(255,255,255,.55); font-size: .7rem; }
        .logout-button { width: 100%; padding: 9px 0; border: 0; color: rgba(255,255,255,.66); background: transparent; font: inherit; font-size: .8rem; text-align: left; cursor: pointer; }
        .logout-button:hover { color: #fff; }

        .main-content { width: calc(100% - 248px); min-width: 0; margin-left: 248px; }
        .topbar { position: sticky; top: 0; z-index: 15; display: flex; align-items: center; justify-content: space-between; gap: 20px; min-height: 92px; padding: 22px clamp(22px, 4vw, 54px); border-bottom: 1px solid var(--line); background: rgba(255,255,255,.92); box-shadow: 0 8px 22px rgba(6,45,107,.05); backdrop-filter: blur(16px); }
        .topbar-kicker { margin-bottom: 3px; color: var(--red); font-size: .7rem; font-weight: 700; letter-spacing: .15em; text-transform: uppercase; }
        .topbar h1 { margin: 0; color: var(--navy); font-family: 'Playfair Display', Georgia, serif; font-size: clamp(1.8rem, 3vw, 2.45rem); line-height: 1; letter-spacing: -.04em; }
        .topbar-actions { display: flex; align-items: center; gap: 12px; }
        .visit-link { display: inline-flex; align-items: center; gap: 8px; padding: 10px 15px; border: 1px solid var(--line); border-radius: 999px; color: var(--blue); background: var(--white); font-size: .82rem; font-weight: 700; text-decoration: none; }
        .visit-link:hover { color: var(--red); border-color: #f0b7ba; }
        .admin-chip { display: inline-flex; align-items: center; gap: 8px; padding: 9px 12px; border-radius: 999px; color: var(--blue); background: #edf4fc; font-size: .78rem; font-weight: 700; }
        .admin-chip::before { content: ''; width: 7px; height: 7px; border-radius: 50%; background: #17b45b; box-shadow: 0 0 0 4px rgba(23,180,91,.12); }
        .page-body { padding: 34px clamp(22px, 4vw, 54px) 54px; }
        .welcome-row { display: flex; align-items: flex-end; justify-content: space-between; gap: 18px; margin-bottom: 25px; }
        .welcome-row h2 { margin: 0 0 5px; color: var(--navy); font-size: 1.35rem; font-weight: 700; }
        .welcome-row p { margin: 0; color: var(--muted); }
        .retreat-pill { display: inline-flex; align-items: center; gap: 8px; padding: 9px 13px; border-radius: 10px; color: var(--red-dark); background: #fff0f1; font-size: .77rem; font-weight: 700; white-space: nowrap; }

        .stats-grid { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 16px; margin-bottom: 30px; }
        .stat-card { position: relative; min-height: 142px; padding: 20px; overflow: hidden; border: 1px solid var(--line); border-radius: 18px; background: var(--white); box-shadow: 0 8px 24px rgba(6,45,107,.04); }
        .stat-card::after { content: ''; position: absolute; right: -22px; bottom: -32px; width: 98px; height: 98px; border: 1px solid rgba(10,67,136,.09); border-radius: 50%; box-shadow: 0 0 0 14px rgba(10,67,136,.025); }
        .stat-icon { width: 35px; height: 35px; display: grid; place-items: center; margin-bottom: 15px; border-radius: 10px; color: var(--blue); background: #eaf1fa; font-size: 1.05rem; }
        .stat-card:nth-child(2) .stat-icon { color: var(--red); background: #fff0f1; }
        .stat-card:nth-child(3) .stat-icon { color: #aa7414; background: #fff6df; }
        .stat-card:nth-child(4) .stat-icon { color: #168451; background: #e9f8ef; }
        .stat-number { display: block; color: var(--navy); font-size: 2rem; font-weight: 700; line-height: 1; }
        .stat-label { display: block; margin-top: 7px; color: var(--muted); font-size: .8rem; }

        .table-card { border: 1px solid var(--line); border-radius: 22px; background: var(--white); box-shadow: var(--shadow); overflow: hidden; }
        .table-card-head { display: flex; align-items: center; justify-content: space-between; gap: 20px; padding: 24px 25px 20px; border-bottom: 1px solid var(--line); }
        .table-card-head h2 { margin: 0 0 5px; color: var(--navy); font-size: 1.15rem; }
        .table-card-head p { margin: 0; color: var(--muted); font-size: .82rem; }
        .record-count { padding: 8px 11px; border-radius: 9px; color: var(--blue); background: #edf4fc; font-size: .76rem; font-weight: 700; white-space: nowrap; }
        .table-wrap { padding: 6px 21px 21px; overflow-x: auto; overflow-y: hidden; }
        #registrationTable { width: 100% !important; margin-top: 0 !important; border-collapse: separate; border-spacing: 0; }
        #registrationTable thead th { padding: 16px 12px; border-bottom: 1px solid var(--line); color: #7a8799; background: #fbfcfe; font-size: .7rem; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; white-space: nowrap; }
        #registrationTable tbody td { padding: 17px 12px; border-bottom: 1px solid #edf1f6; color: #536278; font-size: .84rem; vertical-align: middle; }
        #registrationTable tbody tr:last-child td { border-bottom: 0; }
        #registrationTable tbody tr:hover td { background: #f9fbfe; }
        .couple-name { color: var(--ink); font-weight: 700; white-space: nowrap; }
        .id-cell { color: var(--blue); font-size: .75rem; font-weight: 700; }
        .muted-cell { display: block; max-width: 210px; overflow: hidden; color: #637289; text-overflow: ellipsis; white-space: nowrap; }
        .years-badge, .mode-badge, .status-badge { display: inline-flex; align-items: center; border-radius: 999px; font-size: .7rem; font-weight: 700; white-space: nowrap; }
        .years-badge { padding: 6px 10px; color: var(--blue); background: #edf4fc; }
        .mode-badge { padding: 5px 9px; color: #705a1b; background: #fff6df; text-transform: capitalize; }
        .status-badge { gap: 5px; padding: 5px 9px; }
        .status-badge::before { content: ''; width: 6px; height: 6px; border-radius: 50%; background: currentColor; }
        .status-confirmed { color: #168451; background: #e9f8ef; }
        .status-pending { color: #718096; background: #eef1f5; }
        .confirm-button { display: inline-flex; align-items: center; gap: 6px; padding: 8px 12px; border: 0; border-radius: 9px; color: #fff; background: var(--red); font: inherit; font-size: .75rem; font-weight: 700; white-space: nowrap; cursor: pointer; transition: background .2s ease, transform .2s ease; }
        .confirm-button:hover { background: var(--red-dark); transform: translateY(-1px); }

        .dataTables_wrapper { padding-top: 8px; }
        .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter { margin: 10px 0 14px; color: var(--muted); font-size: .8rem; }
        .dataTables_wrapper .dataTables_filter input { min-width: 220px; margin-left: 7px; padding: 9px 13px !important; border: 1px solid var(--line) !important; border-radius: 10px !important; outline: none; color: var(--ink); background: var(--soft) !important; }
        .dataTables_wrapper .dataTables_filter input:focus { border-color: var(--blue) !important; box-shadow: 0 0 0 3px rgba(10,67,136,.09); }
        .dataTables_wrapper .dataTables_length select { margin: 0 5px; padding: 7px 25px 7px 9px; border: 1px solid var(--line); border-radius: 8px; color: var(--ink); }
        .dataTables_wrapper .dataTables_info { padding-top: 16px; color: var(--muted); font-size: .76rem; }
        .dataTables_wrapper .dataTables_paginate { padding-top: 12px; }
        .dataTables_wrapper .page-item .page-link { margin-left: 4px; border: 0; border-radius: 8px; color: var(--blue); font-size: .78rem; }
        .dataTables_wrapper .page-item.active .page-link { color: #fff; background: var(--blue); }

        /* Keep the attendance dialog hidden even if a CDN stylesheet is slow to load. */
        .modal { display: none; }
        .modal.show { display: block; }
        .modal-content { border: 0; border-radius: 22px; box-shadow: 0 24px 70px rgba(0,0,0,.22); overflow: hidden; }
        .modal-header { padding: 22px 24px; border-bottom: 1px solid var(--line); color: var(--navy); }
        .modal-title { font-size: 1.15rem; font-weight: 700; }
        .modal-body { padding: 26px 24px 30px; }
        .attendance-choice { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; margin-top: 20px; }
        .attendance-choice button { min-height: 52px; border: 1px solid var(--line); border-radius: 11px; color: var(--blue); background: var(--soft); font: inherit; font-size: .82rem; font-weight: 700; cursor: pointer; transition: color .2s ease, background .2s ease, border .2s ease; }
        .attendance-choice button:hover { color: #fff; border-color: var(--blue); background: var(--blue); }
        .empty-state { padding: 50px 20px !important; color: var(--muted) !important; text-align: center; }
        @media (max-width: 1100px) { .stats-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 760px) {
            .sidebar { position: static; width: 100%; min-height: auto; padding: 15px 17px; }
            .app-shell { display: block; }
            .sidebar-brand { display: flex; align-items: center; justify-content: space-between; padding: 0 0 15px; }
            .sidebar-brand img { width: 148px; }
            .sidebar-label, .sidebar-footer { display: none; }
            .sidebar-nav { display: flex; flex-wrap: wrap; gap: 6px; margin-top: 15px; overflow: visible; }
            .sidebar-nav a { flex: 0 0 auto; padding: 9px 12px; font-size: .78rem; }
            .main-content { width: 100%; margin-left: 0; }
            .topbar { min-height: 76px; padding: 17px 18px; }
            .topbar-actions .admin-chip { display: none; }
            .visit-link { padding: 8px 11px; font-size: .74rem; }
            .page-body { padding: 25px 16px 35px; }
        }
        @media (max-width: 520px) {
            .stats-grid { grid-template-columns: 1fr 1fr; gap: 10px; }
            .stat-card { min-height: 124px; padding: 15px; }
            .stat-number { font-size: 1.6rem; }
            .welcome-row { align-items: flex-start; flex-direction: column; }
            .table-card-head { align-items: flex-start; flex-direction: column; padding: 20px 17px 16px; }
            .table-wrap { padding: 4px 12px 15px; }
            .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter { float: none; width: 100%; text-align: left; }
            .dataTables_wrapper .dataTables_filter input { width: calc(100% - 76px); min-width: 0; }
            .attendance-choice { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <div class="app-shell">
        <aside class="sidebar">
            <a class="sidebar-brand" href="{{ url('/') }}" aria-label="Return to Rhema House retreat page">
                <img src="{{ asset('images/rhema-house-logo.png') }}" alt="The Rhema House logo">
            </a>
            <div class="sidebar-label">Workspace</div>
            <nav class="sidebar-nav" aria-label="Dashboard navigation">
                <a class="active" href="{{ route('dashboard') }}"><i class="bi bi-grid-1x2-fill"></i> Registrations</a>
                <a href="{{ url('/') }}"><i class="bi bi-box-arrow-up-right"></i> View retreat page</a>
            </nav>
            <div class="sidebar-footer">
                <div class="user-mini"><span class="user-avatar">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</span><div><strong>{{ auth()->user()->name ?? 'Admin' }}</strong><span>Administrator</span></div></div>
                <form method="POST" action="{{ route('logout') }}"><button class="logout-button" type="submit"><i class="bi bi-box-arrow-left me-2"></i> Sign out</button>@csrf</form>
            </div>
        </aside>

        <main class="main-content">
            <header class="topbar">
                <div><div class="topbar-kicker">MIV Rhema House · 20–22 November 2026</div><h1>Registration dashboard</h1></div>
                <div class="topbar-actions"><a class="visit-link" href="{{ url('/') }}" target="_blank" rel="noopener"><i class="bi bi-arrow-up-right"></i> Retreat page</a><span class="admin-chip">Live workspace</span></div>
            </header>

            <div class="page-body">
                <div class="welcome-row"><div><h2>Good to see you, {{ auth()->user()->name ?? 'Admin' }}.</h2><p>Keep track of every couple preparing for the retreat.</p></div><span class="retreat-pill"><i class="bi bi-heart-fill"></i> Healing For Young Marriages · 20–22 Nov 2026</span></div>

                <section class="stats-grid" aria-label="Registration summary">
                    <article class="stat-card"><span class="stat-icon"><i class="bi bi-people-fill"></i></span><strong class="stat-number">{{ count($registrations) }}</strong><span class="stat-label">Total registrations</span></article>
                    <article class="stat-card"><span class="stat-icon"><i class="bi bi-person-check-fill"></i></span><strong class="stat-number">{{ $stats['husband_only'] }}</strong><span class="stat-label">Husband attending</span></article>
                    <article class="stat-card"><span class="stat-icon"><i class="bi bi-person-heart"></i></span><strong class="stat-number">{{ $stats['wife_only'] }}</strong><span class="stat-label">Wife attending</span></article>
                    <article class="stat-card"><span class="stat-icon"><i class="bi bi-hearts"></i></span><strong class="stat-number">{{ $stats['both'] }}</strong><span class="stat-label">Both attending</span></article>
                </section>

                <section class="table-card" aria-labelledby="records-title">
                    <div class="table-card-head"><div><h2 id="records-title">Couple registrations</h2><p>Search, review and confirm attendance for every submitted registration.</p></div><span class="record-count">{{ count($registrations) }} records</span></div>
                    <div class="table-wrap">
                        <table class="table align-middle" id="registrationTable">
                            <thead><tr><th>ID</th><th>Husband</th><th>Wife</th><th>Email</th><th>Phone</th><th>Mode</th><th>Address</th><th>Years</th><th>Church</th><th>Expectations</th><th>Prayers</th><th>Husband</th><th>Wife</th><th>Created</th><th>Actions</th></tr></thead>
                            <tbody>
                                @forelse($registrations as $registration)
                                    <tr>
                                        <td><span class="id-cell">#{{ $registration->id }}</span></td>
                                        <td><span class="couple-name">{{ $registration->husband_name }}</span></td>
                                        <td><span class="couple-name">{{ $registration->wife_name }}</span></td>
                                        <td>{{ $registration->email }}</td>
                                        <td>{{ $registration->phone }}</td>
                                        <td><span class="mode-badge">{{ $registration->coming_type }}</span></td>
                                        <td><span class="muted-cell" title="{{ $registration->address }}">{{ $registration->address }}</span></td>
                                        <td><span class="years-badge">{{ $registration->marriage_years }} yrs</span></td>
                                        <td><span class="muted-cell" title="{{ $registration->church }}">{{ $registration->church }}</span></td>
                                        <td><span class="muted-cell" title="{{ $registration->expectations }}">{{ $registration->expectations ?: '—' }}</span></td>
                                        <td><span class="muted-cell" title="{{ $registration->prayer_requests }}">{{ $registration->prayer_requests ?: '—' }}</span></td>
                                        <td><span class="status-badge {{ $registration->husband_attendance == 'confirmed' ? 'status-confirmed' : 'status-pending' }}">{{ ucfirst($registration->husband_attendance) }}</span></td>
                                        <td><span class="status-badge {{ $registration->wife_attendance == 'confirmed' ? 'status-confirmed' : 'status-pending' }}">{{ ucfirst($registration->wife_attendance) }}</span></td>
                                        <td>{{ $registration->created_at->format('M d, Y') }}</td>
                                        <td><button class="confirm-button" type="button" onclick="openAttendanceModal({{ $registration->id }})"><i class="bi bi-check2-circle"></i> Confirm</button></td>
                                    </tr>
                                @empty
                                    <tr><td class="empty-state" colspan="15">No registrations found yet.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <div class="modal fade" id="attendanceModal" tabindex="-1" aria-labelledby="attendanceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="attendanceModalLabel"><i class="bi bi-check2-circle me-2"></i>Confirm attendance</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"><p class="mb-0 text-muted">Who will be attending this retreat registration?</p><div class="attendance-choice"><button type="button" onclick="submitAttendance('husband')">Husband only</button><button type="button" onclick="submitAttendance('wife')">Wife only</button><button type="button" onclick="submitAttendance('both')">Both attending</button></div></div></div></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script>
        $(function () {
            $('#registrationTable').DataTable({
                pageLength: 10,
                order: [[0, 'desc']],
                autoWidth: false,
                language: { search: '', searchPlaceholder: 'Search registrations…', lengthMenu: 'Show _MENU_' }
            });
        });

        let currentId = null;
        function openAttendanceModal(id) {
            currentId = id;
            bootstrap.Modal.getOrCreateInstance(document.getElementById('attendanceModal')).show();
        }
        function submitAttendance(type) {
            fetch(`/registrations/${currentId}/confirm-attendance`, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content, 'Content-Type': 'application/json', 'Accept': 'application/json' },
                body: JSON.stringify({ attendance: type })
            }).then(function (response) { return response.json(); }).then(function (data) {
                if (data.success) window.location.reload();
            });
        }
    </script>
</body>
</html>
