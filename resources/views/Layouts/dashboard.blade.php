<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">PT. Masato Catur Coating</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>                
                   <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Kelola Checksheet Treatment
                                    {{-- <i class="fas fa-angle-left right"></i> --}}
                                </p>
                            </a>
                        </li>
                   <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Kelola Checksheet Pengecekan
                                    {{-- <i class="fas fa-angle-left right"></i> --}}
                                </p>
                            </a> 
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p class="d-inline ml-2">Laporan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p class="d-inline ml-2">Kelola Profile</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('jadwal.JadwalKalibrasi') }}" class="nav-link">
                            <i class="nav-icon fas fa-tools"></i>
                            <p class="d-inline ml-2">Kelola Jadwal Kalibrasi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                            <a href="#" class="nav-link" onclick="confirmLogout(event)">
                            <i class="nav-icon fas fa-power-off"></i>
                            <p>Logout</p>
                        </a>
                        </form>
                    </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <script src="{{ asset('js/adminlte.min.js') }}"></script>

    @yield('scripts')
    <script>
    function confirmLogout(event) {
        event.preventDefault(); // Mencegah submit langsung

        if (confirm("Apakah Anda yakin ingin logout?")) {
            document.getElementById('logout-form').submit();
        }
        // Kalau pilih "Tidak", tidak terjadi apa-apa
    }
</script>
</body>
</html>
