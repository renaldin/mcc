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
                <a href="{{ route('tambah-checksheet-treatment') }}" class="btn btn-primary float-right"> Tambah Data</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="data-table-one">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nomor Dokumen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($checksheetTreatmentList as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ date('d F Y', strtotime($item->date)) }}</td>
                                <td>{{ $item->document_no }}</td>
                                <td>
                                    <div class="flex align-items-center list-user-action">
                                        <a href="/detail-checksheet-treatment/{{ $item->id }}"
                                            class="btn btn-sm btn-icon btn-primary" data-toggle="tooltip"
                                            data-placement="top" title="Detail" data-original-title="Detail">
                                            <span class="btn-inner">
                                                <svg width="20" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M22.4541 11.3918C22.7819 11.7385 22.7819 12.2615 22.4541 12.6082C21.0124 14.1335 16.8768 18 12 18C7.12317 18 2.98759 14.1335 1.54586 12.6082C1.21811 12.2615 1.21811 11.7385 1.54586 11.3918C2.98759 9.86647 7.12317 6 12 6C16.8768 6 21.0124 9.86647 22.4541 11.3918Z"
                                                        stroke="currentColor"></path>
                                                    <circle cx="12" cy="12" r="5" stroke="currentColor">
                                                    </circle>
                                                    <circle cx="12" cy="12" r="3" fill="#130F26"></circle>
                                                    <mask mask-type="alpha" maskUnits="userSpaceOnUse" x="9" y="9"
                                                        width="6" height="6">
                                                        <circle cx="12" cy="12" r="3" fill="#130F26"></circle>
                                                    </mask>
                                                    <circle opacity="0.89" cx="13.5" cy="10.5" r="1.5"
                                                        fill="white"></circle>
                                                </svg>
                                            </span>
                                        </a>
                                        <a href="/edit-checksheet-treatment/{{ $item->id }}"
                                            class="btn btn-sm btn-icon btn-success" data-toggle="tooltip"
                                            title="Edit"><span class="btn-inner"><svg width="20" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </svg></span>
                                        </a>
                                        <button type="button" class="mr-1 btn btn-sm btn-icon btn-danger btn-delete"
                                            data-toggle="tooltip" title="Hapus" class="btn-delete"
                                            data-href="/hapus-checksheet-treatment/{{ $item->id }}"
                                            data-content="Apakah Anda yakin akan hapus data ini?"><span
                                                class="btn-inner"><svg class="btn-delete"
                                                    data-href="/hapus-checksheet-treatment/{{ $item->id }}"
                                                    data-content="Apakah Anda yakin akan hapus data ini?" width="20"
                                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    stroke="currentColor">
                                                    <path
                                                        d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path
                                                        d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg></span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
