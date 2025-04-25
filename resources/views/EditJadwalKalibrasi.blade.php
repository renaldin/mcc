@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Jadwal Kalibrasi</h2>
        <form method="POST" action="{{ route('perbarui', $jadwal->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nama Alat</label>
                <input type="text" name="nama_alat" class="form-control" value="{{ $jadwal->nama_alat }}" required>
            </div>
            <div class="form-group">
                <label>Tanggal Jadwal</label>
                <input type="date" name="tanggal_jadwal" class="form-control" value="{{ $jadwal->tanggal_jadwal }}"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </form>
    </div>
@endsection
