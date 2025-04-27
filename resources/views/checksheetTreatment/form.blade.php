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
                        <form action="@if($form == 'Tambah') /tambah-checksheet-treatment @else /edit-checksheet-treatment/{{$detail->id}} @endif" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="date">Tanggal</label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="@if($form === 'Tambah'){{ old('date') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->date}}@endif" @if($form === 'Detail') disabled @endif placeholder="Masukkan Tanggal" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="document_no">Nomer Dokumen</label>
                                <input type="text" class="form-control @error('document_no') is-invalid @enderror" id="document_no" name="document_no" value="@if($form === 'Tambah'){{ $document_no }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->document_no}}@endif" @if($form === 'Detail') disabled @endif placeholder="Masukkan Nomer Dokumen" required readonly>
                            </div>

                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary mb-1">Simpan</button>
                                <button type="reset" class="btn btn-danger mb-1">Reset</button>
                                <a href="{{ route('kelola-checksheet-treatment') }}" class="btn btn-secondary mb-1">Kembali</a>
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
