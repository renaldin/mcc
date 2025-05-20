<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 6px;
            text-align: left;
        }
        h2 {
            text-align: center;
        }
        .header {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>{{ $title }}</h2>
        <p><strong>Tanggal:</strong> {{ $checksheetTreatment->date }}</p>
        <p><strong>No Dokumen:</strong> {{ $checksheetTreatment->document_no }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Proses</th>
                <th>Parameter</th>
                <th>Standar Min</th>
                <th>Standar Max</th>
                <th>Hasil Inspeksi 1</th>
                <th>Hasil Inspeksi 2</th>
                <th>Satuan</th>
                <th>Tools</th>
                <th>Judgement</th>
                <th>Rekomendasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $index => $detail)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $detail->process }}</td>
                <td>{{ $detail->parameter }}</td>
                <td>{{ $detail->min_standard }}</td>
                <td>{{ $detail->max_standard }}</td>
                <td>{{ $detail->inspection_result_1 }}</td>
                <td>{{ $detail->inspection_result_2 }}</td>
                <td>{{ $detail->unit }}</td>
                <td>{{ $detail->tools }}</td>
                <td>{{ $detail->judgement }}</td>
                <td>{{ $detail->recommendation }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
