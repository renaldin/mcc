@extends('Layouts.main')

@section('content')
    @push('style')
        <style>
            @media print {
                .no-print {
                    display: none !important;
                }
            }
        </style>
    @endpush
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-end gap-2 no-print">
                <a href="{{ route('laporan-checksheet-pdf') }}" class="btn btn-danger btn-sm" title="Cetak PDF">
                    <i class="fas fa-file-pdf"></i>
                </a>
                <button onclick="window.print()" class="btn btn-secondary btn-sm" title="Print">
                    <i class="fas fa-print"></i>
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Part</th>
                            <th>Air Pocket</th>
                            <th>Gumpal</th>
                            <th>Bercak</th>
                            <th>Tipis</th>
                            <th>Meler</th>
                            <th>Tunggu Repair</th>
                            <th>Total Check</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($checksheetCheckingList as $no => $item)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->date)) }}</td>
                                <td>{{ $item->part_name }}</td>
                                <td>{{ $item->air_pocket }}</td>
                                <td>{{ $item->gumpal }}</td>
                                <td>{{ $item->bercak }}</td>
                                <td>{{ $item->tipis }}</td>
                                <td>{{ $item->meler }}</td>
                                <td>{{ $item->tunggu_repair }}</td>
                                <td>{{ $item->total_check }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
