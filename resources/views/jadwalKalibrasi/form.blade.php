@extends('Layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="new-user-info">
                        <form action="@if($form == 'Tambah') /tambah-jadwal-kalibrasi @else /edit-jadwal-kalibrasi/{{$detail->id}} @endif" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="title">Judul</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="@if($form === 'Tambah'){{ old('title') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->title}}@endif" @if($form === 'Detail') disabled @endif placeholder="Masukkan Judul" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="start">Tanggal Mulai</label>
                                <input type="date" class="form-control @error('start') is-invalid @enderror" id="start" name="start" value="@if($form === 'Tambah'){{ old('start') }}@elseif($form === 'Edit' || $form === 'Detail'){{date('Y-m-d', strtotime($detail->start))}}@endif" @if($form === 'Detail') disabled @endif placeholder="Masukkan Tanggal Mulai" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="end">Tanggal Akhir</label>
                                <input type="date" class="form-control @error('end') is-invalid @enderror" id="end" name="end" value="@if($form === 'Tambah'){{ old('end') }}@elseif($form === 'Edit' || $form === 'Detail'){{date('Y-m-d', strtotime($detail->end))}}@endif" @if($form === 'Detail') disabled @endif placeholder="Masukkan Tanggal Akhir" required>
                            </div>

                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary mb-1">Simpan</button>
                                <button type="reset" class="btn btn-danger mb-1">Reset</button>
                                <a href="{{ route('kelola-jadwal-kalibrasi') }}" class="btn btn-secondary mb-1">Kembali</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
