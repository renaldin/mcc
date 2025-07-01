@extends('Layouts.main')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('fail'))
                <div class="alert alert-danger">
                    {{ session('fail') }}
                </div>
            @endif
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="form-label" for="date">Tanggal</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{$checksheetTreetment->date}}" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label" for="document_no">Nomor Dokumen</label>
                    <input type="text" class="form-control @error('document_no') is-invalid @enderror" id="document_no" name="document_no" value="{{$checksheetTreetment->document_no}}" readonly>
                </div>
                            
                <div class="form-group col-md-12 table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Process</th>
                                <th>Parameter</th>
                                <th>Standard</th>
                                <th>Tools</th>
                                <th>Inspection Result 1</th>
                                <th>Inspection Result 2</th>
                                <th>Judgement</th>
                                <th>Action</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($checksheetTreatmentDetailList as $item)
                                <form action="/edit-detail-checksheet-treatment/{{$item->id}}" method="POST">
                                    @csrf
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->process }}</td>
                                        <td>{{ $item->parameter }}</td>
                                        <td>{{ $item->standard ? $item->standard : $item->min_standard . ' - ' . $item->max_standard . ' ' . $item->unit}}</td>
                                        <td>{{ $item->tools }}</td>
                                        <td>
                                            <input type="number" class="form-control @error('inspection_result_1') is-invalid @enderror" id="inspection_result_1_{{$item->id}}" name="inspection_result_1" value="@if($item->inspection_result_1 !== null){{ $item->inspection_result_1 }}@endif">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control @error('inspection_result_2') is-invalid @enderror" id="inspection_result_2_{{$item->id}}" name="inspection_result_2" value="@if($item->inspection_result_2 !== null){{ $item->inspection_result_2 }}@endif">
                                        </td>
                                        <td>{{ $item->judgement }}</td>
                                        <td>{{ $item->recommendation }}</td>
                                        <td>
                                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="forn-group">
                    <a href="{{ route('kelola-checksheet-treatment') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection