@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Notifikasi Jadwal Hari Ini</h1>
        <ul class="list-group">
            @foreach ($notifications as $notification)
                <li class="list-group-item">
                    Jadwal pengurasan untuk tangki "{{ $notification->tank_name }}" jatuh pada hari ini.
                </li>
            @endforeach
        </ul>
    </div>
@endsection
