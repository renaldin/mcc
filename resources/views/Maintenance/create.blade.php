@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Buat Jadwal Pengurasan</h1>
        <form action="{{ route('Maintenance.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama Tangki</label>
                <input type="text" name="tank_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tanggal Pengurasan</label>
                <input type="date" name="scheduled_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
