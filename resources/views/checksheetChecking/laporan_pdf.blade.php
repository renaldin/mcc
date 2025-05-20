<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Checksheet Pengecekan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2, .company-info, .date-info {
            text-align: center;
            margin: 0;
        }

        .company-info {
            font-size: 16px;
            margin-top: 5px;
        }

        .date-info {
            font-size: 14px;
            margin-bottom: 20px;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #333;
            padding: 8px 10px;
            font-size: 13px;
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
        }

        td {
            vertical-align: top;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #eef;
        }
    </style>
</head>
<body>
    <h2>Laporan Checksheet Pengecekan</h2>
    <p class="company-info">PT Masato Catur Coating</p>
    <p class="date-info">Tanggal Cetak: {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Part Name</th>
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
            @foreach ($checksheetCheckingList as $item)
            <tr>
                <td>{{ $item->date }}</td>
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
</body>
</html>
