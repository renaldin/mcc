@php
    $notifCalibratioSchedule = \App\Models\CalibrationSchedule::where('date', date('Y-m-d'))
        ->where('status', 'Belum Dilakukan')
        ->orderBy('id', 'DESC')
        ->get();
    $countNotifCalibratioSchedule = \App\Models\CalibrationSchedule::where('date', date('Y-m-d'))
        ->where('status', 'Belum Dilakukan')
        ->count();
    $notifDrainSchedule = \App\Models\DrainSchedule::where('date', date('Y-m-d'))
        ->where('status', 'Belum Dilakukan')
        ->orderBy('id', 'DESC')
        ->get();
    $countNotifDrainSchedule = \App\Models\DrainSchedule::where('date', date('Y-m-d'))
        ->where('status', 'Belum Dilakukan')
        ->count();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.11.3/main.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link href="{{ asset('plugins/fullcalendar/main.min.css') }}" rel="stylesheet">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }} ">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/main.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                @if (
                    $title === 'Kelola Jadwal Kalibrasi' ||
                        $title === 'Kalender Jadwal Kalibrasi' ||
                        $title === 'Edit Jadwal Kalibrasi' ||
                        $title === 'Tambah Jadwal Kalibrasi')
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning navbar-badge">{{ $countNotifCalibratioSchedule }}
                                Notifikasi</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header">{{ $countNotifCalibratioSchedule }}
                                Notifikasi</span>
                            <div class="dropdown-divider"></div>
                            @foreach ($notifCalibratioSchedule as $item)
                                <a href="/edit-jadwal-kalibrasi/{{ $item->id }}" class="dropdown-item">
                                    <i class="fas fa-file mr-2"></i> {{ $item->tool }}
                                    <span
                                        class="float-right text-muted text-sm">{{ date('d F Y', strtotime($item->date)) }}</span>
                                </a>
                                <div class="dropdown-divider"></div>
                            @endforeach
                            <a href="{{ route('kelola-jadwal-kalibrasi') }}"
                                class="dropdown-item dropdown-footer">Lihat semua</a>
                        </div>
                    </li>
                @endif

                @if (
                    $title === 'Kelola Jadwal Pengurasan' ||
                        $title === 'Kalender Jadwal Pengurasan' ||
                        $title === 'Edit Jadwal Pengurasan' ||
                        $title === 'Tambah Jadwal Pengurasan')
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning navbar-badge">{{ $countNotifDrainSchedule }}
                                Notifikasi</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header">{{ $countNotifDrainSchedule }}
                                Notifikasi</span>
                            <div class="dropdown-divider"></div>
                            @foreach ($notifDrainSchedule as $item)
                                <a href="/edit-jadwal-pengurasan/{{ $item->id }}" class="dropdown-item">
                                    <i class="fas fa-file mr-2"></i> {{ $item->tangki }}
                                    <span
                                        class="float-right text-muted text-sm">{{ date('d F Y', strtotime($item->date)) }}</span>
                                </a>
                                <div class="dropdown-divider"></div>
                            @endforeach
                            <a href="{{ route('kelola-jadwal-pengurasan') }}"
                                class="dropdown-item dropdown-footer">Lihat semua</a>
                        </div>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
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
                        <a href="#" class="d-block">{{ $user->role }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        @if ($user->role == 'Admin')
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p class="d-inline ml-2">Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('kelola-user') }}"
                                    class="nav-link @if ($title == 'Kelola User') active @endif">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p class="d-inline ml-2">Kelola User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('checksheet-treatment.laporan') }}" class="nav-link">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p class="d-inline ml-2">Laporan Check Sheet Treatment</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('laporan-checksheet-pengecekan') }}" class="nav-link">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p class="d-inline ml-2">Laporan Check Sheet Pengecekan</p>
                                </a>
                            </li>
                        @elseif ($user->role == 'QC')
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p class="d-inline ml-2">Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('profile.qc') }}"
                                    class="nav-link {{ request()->routeIs('profile.qc') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p> Profile Quality Control</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('kelola-checksheet-treatment') }}"
                                    class="nav-link @if ($title == 'Kelola Check sheet Treatment' || $title == 'Detail Check sheet Treatment') active @endif">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p class="d-inline ml-2">Kelola Check Sheet Treatment</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('kelola-checksheet-pengecheckan') }}"
                                    class="nav-link @if ($title == 'Kelola Checksheet Pengecheckan') active @endif">
                                    <i class="nav-icon fas fa-table"></i>
                                    <p class="d-inline ml-2">Kelola Check Sheet Pengecekan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('checksheet-treatment.laporan') }}" class="nav-link">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p class="d-inline ml-2">Laporan Check Sheet Treatment</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('laporan-checksheet-pengecekan') }}" class="nav-link">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p class="d-inline ml-2">Laporan Check Sheet Pengecekan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('kelola-jadwal-kalibrasi') }}"
                                    class="nav-link @if ($title == 'Kelola Jadwal Kalibrasi' || $title == 'Kalender Jadwal Kalibrasi') active @endif">
                                    <i class="nav-icon fas fa-tools"></i>
                                    <p class="d-inline ml-2">Kelola Jadwal Kalibrasi Alat</p>
                                </a>
                            </li>
                        @elseif ($user->role == 'Maintenance')
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p class="d-inline ml-2">Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('profile.maintenance') }}"
                                    class="nav-link {{ request()->routeIs('profile.maintenance') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>Profile Maintenance</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('kelola-jadwal-pengurasan') }}"
                                    class="nav-link @if ($title == 'Kelola Jadwal Pengurasan' || $title == 'Kalender Jadwal Pengurasan') active @endif">
                                    <i class="nav-icon fas fa-tools"></i>
                                    <p class="d-inline ml-2">Kelola Jadwal Pengurasan Tangki</p>
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
                            <a class="nav-link btn-delete" class="nav-link" data-href="{{ route('logout') }}"
                                data-content="Apakah Anda yakin akan logout?" data-button="Iya">
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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>{{ $title }}</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">{{ $title }}</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            @yield('content')
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

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
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

    <!-- Bootstrap -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/fullcalendar/main.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {

            /* initialize the external events
             -----------------------------------------------------------------*/
            function ini_events(ele) {
                ele.each(function() {

                    // create an Event Object (https://fullcalendar.io/docs/event-object)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    }

                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data('eventObject', eventObject)

                    // make the event draggable using jQuery UI
                    $(this).draggable({
                        zIndex: 1070,
                        revert: true, // will cause the event to go back to its
                        revertDuration: 0 //  original position after the drag
                    })

                })
            }

            ini_events($('#external-events div.external-event'))

            /* initialize the calendar
             -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var date = new Date()
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear()

            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendar.Draggable;

            var containerEl = document.getElementById('external-events');
            var checkbox = document.getElementById('drop-remove');
            var calendarEl = document.getElementById('calendar');
            const dataCalendar = JSON.parse(calendarEl.dataset.calendar);

            // initialize the external events
            // -----------------------------------------------------------------

            new Draggable(containerEl, {
                itemSelector: '.external-event',
                eventData: function(eventEl) {
                    return {
                        title: eventEl.innerText,
                        backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue(
                            'background-color'),
                        borderColor: window.getComputedStyle(eventEl, null).getPropertyValue(
                            'background-color'),
                        textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
                    };
                }
            });

            var calendar = new Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                themeSystem: 'bootstrap',
                //Random default events
                events: dataCalendar,
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function(info) {
                    // is the "remove after drop" checkbox checked?
                    if (checkbox.checked) {
                        // if so, remove the element from the "Draggable Events" list
                        info.draggedEl.parentNode.removeChild(info.draggedEl);
                    }
                }
            });

            calendar.render();
            // $('#calendar').fullCalendar()

            /* ADDING EVENTS */
            var currColor = '#3c8dbc' //Red by default
            // Color chooser button
            $('#color-chooser > li > a').click(function(e) {
                e.preventDefault()
                // Save color
                currColor = $(this).css('color')
                // Add color effect to button
                $('#add-new-event').css({
                    'background-color': currColor,
                    'border-color': currColor
                })
            })
            $('#add-new-event').click(function(e) {
                e.preventDefault()
                // Get value and make sure it is not null
                var val = $('#new-event').val()
                if (val.length == 0) {
                    return
                }

                // Create events
                var event = $('<div />')
                event.css({
                    'background-color': currColor,
                    'border-color': currColor,
                    'color': '#fff'
                }).addClass('external-event')
                event.text(val)
                $('#external-events').prepend(event)

                // Add draggable funtionality
                ini_events(event)

                // Remove event from text input
                $('#new-event').val('')
            })
        })

        $(document).ready(function() {
            $('#data-table-one').DataTable(); // atau $('.table').DataTable();
        });

        document.addEventListener('DOMContentLoaded', function() {
            document.body.addEventListener('click', function(event) {
                if (event.target.classList.contains('btn-delete')) {
                    const deleteModalHref = event.target.getAttribute('data-href');
                    const deleteModalContent = event.target.getAttribute('data-content');
                    const deleteButton = event.target.getAttribute('data-button') || null;

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
                                    <a href="${deleteModalHref}" type="button" class="btn btn-danger">${deleteButton ? deleteButton : 'Hapus'}</a>
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
