<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.11.3/main.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link href="{{ asset('plugins/fullcalendar/main.min.css') }}" rel="stylesheet">
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
            <a href="index3.html" class="brand-link">
                <span class="brand-text font-weight-light"> PT. Masato Catur Coating</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block">{{$user->role}}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">
                                <i class="nav-icon fas fa-tools"></i>
                                <p class="d-inline ml-2">Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Auth.profile') }}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    <p class="d-inline ml-2">Profile</p>
                            </a>
                        </li>
                        @if ($user->role == 'Admin')
                            <li class="nav-item">
                                <a href="{{ route('kelola-user') }}" class="nav-link @if($title == 'Kelola User') active @endif">
                                    <i class="nav-icon fas fa-power-off"></i>
                                    <p class="d-inline ml-2">Kelola User</p>
                                </a>
                            </li>
                        @elseif ($user->role == 'QC')
                            {{-- <li class="nav-item">
                                <a href="{{ route('kelola-checksheet-treatment') }}" class="nav-link @if($title == 'Kelola Checksheet Treatment' || $title == 'Detail Checksheet Treatment') active @endif">
                                    <i class="nav-icon fas fa-power-off"></i>
                                    <p class="d-inline ml-2">Checksheet Treatment</p>
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="{{ route('kelola-jadwal-kalibrasi') }}" class="nav-link @if($title == 'Kelola Jadwal Kalibrasi') active @endif">
                                    <i class="nav-icon fas fa-power-off"></i>
                                    <p class="d-inline ml-2">Jadwal Kalibrasi</p>
                                </a>
                            </li>
                        @elseif ($user->role == 'Maintenance')
                            <li class="nav-item">
                                <a href="{{ route('kelola-jadwal-pengurasan') }}" class="nav-link @if($title == 'Kelola Jadwal Pengurasan') active @endif">
                                    <i class="nav-icon fas fa-power-off"></i>
                                    <p class="d-inline ml-2">Jadwal Pengurasan</p>
                                </a>
                            </li>
                        @else
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
                                <a href="{{ route('lihat-jadwal-kalibrasi') }}" class="nav-link @if($title == 'Lihat Jadwal Kalibrasi') active @endif">
                                    <i class="nav-icon fas fa-tools"></i>
                                    <p class="d-inline ml-2">Lihat Jadwal Kalibrasi</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('kelola-jadwal-kalibrasi') }}" class="nav-link @if($title == 'Kelola Jadwal Kalibrasi') active @endif">
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
                        @endif
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p class="d-inline ml-2">Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{$title}}</h1>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                @yield('content')
            </section>
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

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="dist/js/demo.js"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.11.3/main.min.js"></script>
    <script></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <script src="{{ asset('plugins/fullcalendar/main.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#data-table-one').DataTable(); // atau $('.table').DataTable();
        });

        document.addEventListener('DOMContentLoaded', function () {
            document.body.addEventListener('click', function (event) {
                if (event.target.classList.contains('btn-delete')) {
                    const deleteModalHref = event.target.getAttribute('data-href');
                    const deleteModalContent = event.target.getAttribute('data-content');
                    
                    const existingModal = document.getElementById('deleteModal');
                    if (existingModal) {
                        existingModal.remove();
                    }

                    const modalHtml = `
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                                    </div>
                                    <div class="modal-body">
                                        <p>${deleteModalContent}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="${deleteModalHref}" type="button" class="btn btn-danger">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                    document.body.insertAdjacentHTML('beforeend', modalHtml);
                    $('#deleteModal').modal('show');
                }
            });
        });

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

<script>
    function confirmLogout(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Logout?',
            text: "Apakah Anda yakin ingin logout?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }
</script>
</body>
</html>
