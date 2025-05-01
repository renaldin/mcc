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
                        <form action="@if($form == 'Tambah') /tambah-checksheet-pengecheckan @else /edit-checksheet-pengecheckan/{{$detail->id}} @endif" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="date">Tanggal</label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="@if($form === 'Tambah'){{ old('date') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->date}}@endif" @if($form === 'Detail') disabled @endif placeholder="Masukkan Tanggal" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="part_name">Nama Part</label>
                                <input type="text" class="form-control @error('part_name') is-invalid @enderror" id="part_name" name="part_name" value="@if($form === 'Tambah'){{ old('part_name') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->part_name}}@endif" @if($form === 'Detail') disabled @endif placeholder="Masukkan Nama Part" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="air_pocket">Air Pocket</label>
                                <input type="number" class="form-control @error('air_pocket') is-invalid @enderror" id="air_pocket" name="air_pocket" value="@if($form === 'Tambah'){{ old('part_name') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->air_pocket}}@endif" @if($form === 'Detail') disabled @endif placeholder="Masukkan Air Pocket" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="gumpal">Gumpal</label>
                                <input type="number" class="form-control @error('gumpal') is-invalid @enderror" id="gumpal" name="gumpal" value="@if($form === 'Tambah'){{ old('part_name') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->gumpal}}@endif" @if($form === 'Detail') disabled @endif placeholder="Masukkan Gumpal" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="bercak">Bercak</label>
                                <input type="number" class="form-control @error('bercak') is-invalid @enderror" id="bercak" name="bercak" value="@if($form === 'Tambah'){{ old('part_name') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->bercak}}@endif" @if($form === 'Detail') disabled @endif placeholder="Masukkan Bercak" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="tipis">Tipis</label>
                                <input type="number" class="form-control @error('tipis') is-invalid @enderror" id="tipis" name="tipis" value="@if($form === 'Tambah'){{ old('part_name') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->tipis}}@endif" @if($form === 'Detail') disabled @endif placeholder="Masukkan Tipis" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="meler">Meler</label>
                                <input type="number" class="form-control @error('meler') is-invalid @enderror" id="meler" name="meler" value="@if($form === 'Tambah'){{ old('part_name') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->meler}}@endif" @if($form === 'Detail') disabled @endif placeholder="Masukkan Meler" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="tunggu_repair">Tunggu Repair</label>
                                <input type="number" class="form-control @error('tunggu_repair') is-invalid @enderror" id="tunggu_repair" name="tunggu_repair" value="@if($form === 'Tambah'){{ old('part_name') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->tunggu_repair}}@endif" @if($form === 'Detail') disabled @endif placeholder="Masukkan Tunggu Repair" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="total_check">Total Check</label>
                                <input type="number" class="form-control @error('total_check') is-invalid @enderror" id="total_check" name="total_check" value="@if($form === 'Tambah'){{ old('part_name') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->total_check}}@endif" @if($form === 'Detail') disabled @endif placeholder="Masukkan Total Check" required>
                            </div>

                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary mb-1">Simpan</button>
                                <a href="{{ route('kelola-checksheet-pengecheckan') }}" class="btn btn-secondary mb-1">Kembali</a>
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
