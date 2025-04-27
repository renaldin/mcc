<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Jadwal Kalibrasi</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <link href="plugins/fullcalendar/main.min.css" rel="stylesheet">
    <style>
        /* Ubah warna font di kalender menjadi putih */
        .fc-toolbar-title,
        .fc-daygrid-day-number,
        .fc-event-title {
            color: white !important;
        }

        .fc .fc-toolbar {
            color: white !important;
        }

        .fc .fc-button {
            color: white !important;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">5 Notifikasi</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">5 Notifikas</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 2 pesan baru
                            <span class="float-right text-muted text-sm">3 menit yang lalu</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 1 laporan baru
                            <span class="float-right text-muted text-sm">2 hari yang lalu</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">Lihat semua notifikasi</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8"> --}}
                <span class="brand-text font-weight-light"> PT. Masato Catur Coating</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    {{-- <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div> --}}
                    <div class="info">
                        <a href="#" class="d-block">Admin</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                <i class="nav-icon fas fa-tools"></i>
                                <p class="d-inline ml-2">Dashboard</p>
                            </a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Auth.profile') }}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    <p class="d-inline ml-2">Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('cs_treatment.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p class="d-inline ml-2">Kelola Checksheet Treatment</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Kelola Checksheet Pengecekan
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
                            <a href="{{ route('jadwal.JadwalKalibrasi') }}" class="nav-link active">
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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Kelola Jadwal Kalibrasi</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Calendar -->
            <div class="card bg-gradient-success">
                <div class="card-header border-0">
                    <h3 class="card-title">
                        <i class="far fa-calendar-alt"></i>
                        Kalender Jadwal Kalibrasi
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <!-- FullCalendar Container -->
                    <div id="calendar"></div>
                </div>
            </div>
            <!-- /. tools -->
        </div>

    </div>
    <!-- /.card -->
    </section>
    <!-- right col -->
    </div>
    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>PT. Masato Catur Coating</strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: "/jadwal_kalibrasi",
                dateClick: function(info) {
                    Swal.fire({
                        title: 'Pilih nama alat:',
                        html: '<div style="margin-bottom: 10px; font-size: 0.9em; color: gray;">' +
                            'Nomor Dokumen: <strong>S.06/01/14/MCC-2024</strong>' +
                            '</div>' +
                            '<div style="display: flex; justify-content: center;">' +
                            '<select id="namaAlatSelect" class="swal2-input" style="width: 100%; max-width: 400px;">' +
                            '<option value="">-- Pilih Alat --</option>' +
                            '<option value="pH Meter">pH Meter</option>' +
                            '<option value="Lig Thermometer">Lig Thermometer</option>' +
                            '<option value="SIM Thickness Gauge">SIM Thickness Gauge</option>' +
                            '<option value="TDS Meter">TDS Meter</option>' +
                            '<option value="Hydrometer">Hydrometer</option>' +
                            '</select>' +
                            '</div>',
                        showCancelButton: true,
                        confirmButtonText: 'Simpan',
                        cancelButtonText: 'Batal',
                        preConfirm: () => {
                            const selectedAlat = document.getElementById('namaAlatSelect')
                                .value;
                            if (!selectedAlat) {
                                Swal.showValidationMessage(
                                    'Silakan pilih nama alat terlebih dahulu.');
                            }
                            return selectedAlat;
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const selectedAlat = result.value;
                            $.ajax({
                                url: '/jadwal_kalibrasi',
                                method: 'POST',
                                data: {
                                    title: selectedAlat,
                                    start: info.dateStr,
                                    end: info.dateStr,
                                    nomor_dokumen: 'S.06/01/14/MCC-2024',
                                    _token: "{{ csrf_token() }}"
                                },
                                success: function(response) {
                                    // Tambahkan event ke kalender berdasarkan data dari server
                                    calendar.addEvent({
                                        id: response.id,
                                        title: response.title,
                                        start: response.start,
                                        end: response.end
                                    });
                                    Swal.fire('Berhasil!',
                                        'Jadwal berhasil ditambahkan!',
                                        'success');
                                },
                                error: function() {
                                    Swal.fire('Gagal', 'Gagal menambahkan jadwal',
                                        'error');
                                }
                            });
                        }
                    });
                },
                eventClick: function(info) {
                    var newTitle = prompt('Edit nama jadwal:', info.event.title);
                    if (newTitle) {
                        $.ajax({
                            url: '/jadwal_kalibrasi/' + info.event
                                .id, // Ubah ke rute yang benar
                            method: 'PUT',
                            data: {
                                title: newTitle,
                                start: info.event.start.toISOString(),
                                end: info.event.end ? info.event.end.toISOString() : null,
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                info.event.setProp('title', response.title);
                                alert('Jadwal berhasil diperbarui!');
                            },
                            error: function() {
                                alert('Gagal mengedit jadwal');
                            }
                        });
                    }
                }
            });

            calendar.render();
        });
    </script>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- FullCalendar -->
    <script src="plugins/fullcalendar/main.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    {{-- <script src="plugins/jquery-ui/jquery-ui.min.js"></script> --}}
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    {{-- <script src="plugins/moment/moment.min.js"></script> --}}
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="dist/js/demo.js"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
