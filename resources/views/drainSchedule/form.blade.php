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
                        <form action="@if($form == 'Tambah') /tambah-jadwal-pengurasan @else /edit-jadwal-pengurasan/{{$detail->id}} @endif" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="tangki">Tangki</label>
                                <select name="tangki" id="tangki" class="selectpicker form-control @error('tangki') is-invalid @enderror" data-live-search="true" @if($form === 'Detail') disabled @endif required>
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="Phosphating" @if($form === "Tambah" && old("tangki") === "Phosphating") selected @elseif($form === "Edit" && $detail->tangki === "Phosphating") selected @endif>Phosphating</option>
                                    <option value="Phosphating Rinse 1" @if($form === "Tambah" && old("tangki") === "Phosphating Rinse 1") selected @elseif($form === "Edit" && $detail->tangki === "Phosphating Rinse 1") selected @endif>Phosphating Rinse 1</option>
                                    <option value="Phosphating Rinse 2" @if($form === "Tambah" && old("tangki") === "Phosphating Rinse 2") selected @elseif($form === "Edit" && $detail->tangki === "Phosphating Rinse 2") selected @endif>Phosphating Rinse 2</option>
                                    <option value="CED Painting" @if($form === "Tambah" && old("tangki") === "CED Painting") selected @elseif($form === "Edit" && $detail->tangki === "CED Painting") selected @endif>CED Painting</option>
                                    <option value="CED Rinse 01" @if($form === "Tambah" && old("tangki") === "CED Rinse 01") selected @elseif($form === "Edit" && $detail->tangki === "CED Rinse 01") selected @endif>CED Rinse 01</option>
                                    <option value="CED Rinse 02" @if($form === "Tambah" && old("tangki") === "CED Rinse 02") selected @elseif($form === "Edit" && $detail->tangki === "CED Rinse 02") selected @endif>CED Rinse 02</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="date">Tanggal</label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="@if($form === 'Tambah'){{ old('date') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->date}}@endif" @if($form === 'Detail') disabled @endif placeholder="Masukkan Tanggal" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="status">Status</label>
                                <select name="status" id="status" class="selectpicker form-control @error('status') is-invalid @enderror" data-live-search="true" @if($form === 'Detail') disabled @endif required>
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="Belum Dilakukan" @if($form === "Tambah" && old("status") === "Belum Dilakukan") selected @elseif($form === "Edit" && $detail->status === "Belum Dilakukan") selected @endif>Belum Dilakukan</option>
                                    <option value="Sudah Dilakukan" @if($form === "Tambah" && old("status") === "Sudah Dilakukan") selected @elseif($form === "Edit" && $detail->status === "Sudah Dilakukan") selected @endif>Sudah Dilakukan</option>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary mb-1">Simpan</button>
                                <button type="reset" class="btn btn-danger mb-1">Reset</button>
                                <a href="{{ route('kelola-jadwal-pengurasan') }}" class="btn btn-secondary mb-1">Kembali</a>
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
