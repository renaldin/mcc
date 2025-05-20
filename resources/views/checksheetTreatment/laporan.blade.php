@extends('layouts.main')

@section('content')
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>No Dokumen</th>
                    <th>Aksi</th> <!-- Tambahan kolom aksi -->
                </tr>
            </thead>
            <tbody>
                @foreach ($checksheetTreatmentList as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><i class="fas fa-calendar-alt text-primary"></i> {{ $data->date }}</td>
                        <td><i class="fas fa-file-alt text-success"></i> {{ $data->document_no }}</td>
                        <td>
                            <!-- Tombol aksi per baris -->
                            <a href="{{ route('checksheet-treatment-detail.cetakPDF', $data->id) }}"
                                class="btn btn-sm btn-danger" title="Cetak PDF">
                                <i class="fas fa-file-pdf"></i> PDF
                            </a>
                            <button onclick="window.print()" class="btn btn-sm btn-primary" title="Print">
                                <i class="fas fa-print"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
