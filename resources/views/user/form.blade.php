@extends('Layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="new-user-info">
                        <div class="row mb-2">
                            <div class="col-md-12">
                                @if (session('fail'))
                                    <div class="alert alert-danger">
                                        {{ session('fail') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <form action="@if($form == 'Tambah') /tambah-user @else /edit-user/{{$detail->id}} @endif" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="name">Nama Lengkap</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="@if($form === 'Tambah'){{ old('name') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->name}}@endif" @if($form === 'Detail') disabled @endif placeholder="Masukkan Nama Lengkap" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="phone">No. HP</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="@if($form === 'Tambah'){{ old('phone') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->phone}}@endif" @if($form === 'Detail') disabled @endif placeholder="Masukkan Nomor Telepon" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="@if($form === 'Tambah'){{ old('email') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->email}}@endif" @if($form === 'Detail') disabled @endif placeholder="Masukkan Email" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" @if($form === 'Detail') disabled @endif placeholder="Masukkan Password" @if($form == 'Tambah') required @endif>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="role">Role</label>
                                <select name="role" id="role" class="selectpicker form-control @error('role') is-invalid @enderror" data-live-search="true" @if($form === 'Detail') disabled @endif required>
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="Admin" @if($form === "Tambah" && old("role") === "Admin") selected @elseif($form === "Edit" && $detail->role === "Admin") selected @endif>Admin</option>
                                    <option value="QC" @if($form === "Tambah" && old("role") === "QC") selected @elseif($form === "Edit" && $detail->role === "QC") selected @endif>QC</option>
                                    <option value="Maintenance" @if($form === "Tambah" && old("role") === "Maintenance") selected @elseif($form === "Edit" && $detail->role === "Maintenance") selected @endif>Maintenance</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="status">Status</label>
                                <select name="status" id="status" class="selectpicker form-control @error('status') is-invalid @enderror" data-live-search="true" @if($form === 'Detail') disabled @endif required>
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="Aktif" @if($form === "Tambah" && old("status") === "Aktif") selected @elseif($form === "Edit" && $detail->status === "Aktif") selected @endif>Aktif</option>
                                    <option value="Tidak Aktif" @if($form === "Tambah" && old("status") === "Tidak Aktif") selected @elseif($form === "Edit" && $detail->status === "Tidak Aktif") selected @endif>Tidak Aktif</option>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary mb-1">Simpan</button>
                                <button type="reset" class="btn btn-danger mb-1">Reset</button>
                                <a href="{{ route('kelola-user') }}" class="btn btn-secondary mb-1">Kembali</a>
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
