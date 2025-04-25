<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar bg-dark text-white" style="width: 250px; min-height: 100vh;">
        <div class="sidebar-header p-3">
            <h5>PT. Masato Catur Coating</h5>
            <p>Admin</p>
        </div>
        <div class="sidebar-menu">
            <div class="search-box px-3 mb-3">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <ul class="list-unstyled">
                <li><a href="{{ route('admin.dashboard') }}" class="text-white d-block p-2"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
                <li><a href="{{ route('admin.dashboard') }}" class="text-white d-block p-2"><i class="bi bi-pencil"></i> Kelola Checksheet Treatment</a></li>
                <li><a href="{{ route('admin.dashboard') }}" class="text-white d-block p-2"><i class="bi bi-table"></i> Kelola Checksheet Pengecekan</a></li>
                <li><a href="{{ route('admin.dashboard') }}" class="text-white d-block p-2"><i class="bi bi-file-earmark-text"></i> Laporan</a></li>
                <li><a href="{{ route('admin.dashboard') }}" class="text-white d-block p-2"><i class="bi bi-person"></i> Kelola Profile</a></li>
                <li><a href="{{ route('jadwal.JadwalKalibrasi') }}" class="text-white d-block p-2"><i class="bi bi-tools"></i> Kelola Jadwal Kalibrasi</a></li>
                <li><a href="{{ route('admin.dashboard') }}" class="text-white d-block p-2"><i class="bi bi-power"></i> Logout</a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content flex-grow-1">
        @yield('content')
    </div>
</div>
