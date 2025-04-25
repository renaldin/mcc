@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Dashboard Maintenance</h1>
        <a href="{{ route('Maintenance.create') }}" class="btn btn-primary mb-4">Buat Jadwal Baru</a>

        <div id="calendar"></div>

        <h3 class="mt-5">Daftar Jadwal</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Tangki</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->tank_name }}</td>
                        <td>{{ $schedule->scheduled_date }}</td>
                        <td>{{ $schedule->is_verified ? 'Terverifikasi' : 'Belum Diverifikasi' }}</td>
                        <td>
                            <a href="{{ route('Maintenance.edit', $schedule->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('Maintenance.verify', $schedule->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Verifikasi</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [
                    @foreach ($schedules as $schedule)
                        {
                            title: '{{ $schedule->tank_name }}',
                            start: '{{ $schedule->scheduled_date }}',
                            url: '{{ route('Maintenance.edit', $schedule->id) }}'
                        },
                    @endforeach
                ]
            });
            calendar.render();
        });
    </script>
@endsection
