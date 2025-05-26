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
                        <form action="@if($form == 'Tambah') /tambah-jadwal-kalibrasi @else /edit-jadwal-kalibrasi/{{$detail->id}} @endif" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="tool">Alat</label>
                                <select name="tool" id="tool" class="selectpicker form-control @error('tool') is-invalid @enderror" data-live-search="true" @if($form === 'Detail') disabled @endif required>
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="TDS Meter" @if($form === "Tambah" && old("tool") === "TDS Meter") selected @elseif(($form === "Edit" || $form === 'Detail') && $detail->tool === "TDS Meter") selected @endif>TDS Meter</option>
                                    <option value="Lig Thermometer" @if($form === "Tambah" && old("tool") === "Lig Thermometer") selected @elseif(($form === "Edit" || $form === 'Detail') && $detail->tool === "Lig Thermometer") selected @endif>Lig Thermometer</option>
                                    <option value="SIM Thickness Gauge" @if($form === "Tambah" && old("tool") === "SIM Thickness Gauge") selected @elseif(($form === "Edit" || $form === 'Detail') && $detail->tool === "SIM Thickness Gauge") selected @endif>SIM Thickness Gauge</option>
                                    <option value="PH Meter" @if($form === "Tambah" && old("tool") === "PH Meter") selected @elseif(($form === "Edit" || $form === 'Detail') && $detail->tool === "PH Meter") selected @endif>PH Meter</option>
                                    <option value="Hydrometer" @if($form === "Tambah" && old("tool") === "Hydrometer") selected @elseif(($form === "Edit" || $form === 'Detail') && $detail->tool === "Hydrometer") selected @endif>Hydrometer</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="date">Tanggal</label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="@if($form === 'Tambah'){{ old('date') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->date}}@endif" @if($form === 'Detail') disabled @endif placeholder="Masukkan Tanggal" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="start_hour">Jam Pelaksanaan</label>
                                <input type="time" class="form-control @error('start_hour') is-invalid @enderror" id="start_hour" name="start_hour" value="@if($form === 'Tambah'){{ old('start_hour') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->start_hour}}@endif" @if($form === 'Detail') disabled @endif placeholder="Masukkan Jam Pelaksanaan" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="end_hour">Jam Selesai</label>
                                <input type="time" class="form-control @error('end_hour') is-invalid @enderror" id="end_hour" name="end_hour" value="@if($form === 'Tambah'){{ old('end_hour') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->end_hour}}@endif" @if($form === 'Detail') disabled @endif placeholder="Masukkan Jam Selesai" required>
                            </div>

                            @if ($form === 'Detail')
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="status">Status</label>
                                    <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" value="@if($form === 'Tambah'){{ old('status') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->status}}@endif" @if($form === 'Detail') disabled @endif>
                                </div>
                                @if ($detail->status === 'Belum Dilakukan')
                                    <div class="form-group col-md-12 my-4">
                                        <button type="button" class="btn btn-primary btn-verifikasi" data-toggle="tooltip" title="Verifikasi"
                                        data-href="/verifikasi-jadwal-kalibrasi/{{ $detail->id }}"
                                        data-content="Apakah Anda yakin akan verifikasi data ini?"
                                        data-button="Verifikasi">Verifikasi</button>
                                    </div>
                                @endif
                            @endif

                            <div class="form-group col-md-12">
                                @if ($form !== 'Detail')
                                    <button type="submit" class="btn btn-primary mb-1">Simpan</button>
                                @endif
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
