<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Checksheet Treatment</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <style>
        <style>* {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: flex-start;
            /* Ubah ke flex-start untuk lebih baik */
            align-items: flex-start;
            min-height: 100vh;
            background-color: #ecf0f1;
        }

        /* Sidebar styling */
        .sidebar {
            width: 250px;
            background-color: rgb(62, 60, 60);
            color: #ecf0f1;
            display: flex;
            flex-direction: column;
            padding: 20px;
            height: 100vh;
            /* Pastikan sidebar penuh tinggi viewport */
            position: fixed;
            /* Sidebar tetap di tempat saat scroll */
            overflow-y: auto;
            /* Mengizinkan scroll jika konten lebih tinggi dari viewport */
        }

        .sidebar .brand-link {
            font-weight: bold;
            font-size: 1.5rem;
            margin-bottom: 30px;
            text-align: center;
        }

        .sidebar .info {
            margin-bottom: 20px;
            text-align: center;
        }

        .sidebar a {
            text-decoration: none;
            color: #ecf0f1;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            font-size: 1rem;
        }

        .sidebar a:hover {
            background-color: rgb(1, 140, 254);
        }

        .sidebar a i {
            font-size: 1.2rem;
        }

        .content {
            margin-left: 270px;
            padding: 20px;
            flex: 1;
        }

        /* Main content area */
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 1000px;
            margin: 20px auto;
            /* Center the form container */
        }

        .form-container h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group select,
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        .form-group textarea {
            resize: none;
        }

        .form-group button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            width: 100%;
        }

        .form-group button:hover {
            background-color: #2980b9;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: white;
        }

        table th,
        table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
            font-size: 0.9rem;
            vertical-align: top;
        }

        table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        .table-container {
            overflow-x: auto;
            /* Add horizontal scroll for smaller screens */
        }

        /* Adjust button styles */
        .btn-secondary {
            display: inline-block;
            text-align: center;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            background-color: #7f8c8d;
            color: white;
            margin-top: 10px;
        }

        .btn-secondary:hover {
            background-color: #636e72;
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 15px;
            }

            table th,
            table td {
                font-size: 0.8rem;
                padding: 5px;
            }
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <a href="index3.html" class="brand-link">PT. Masato Catur Coating</a>
        <div class="info">
            <a href="#" class="d-block">Admin</a>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-tools"></i>
            Dashboard
        </a>
        <a href="{{ route('Auth.profile') }}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            Profile
        </a>
        <a href="{{ route('cs_treatment.index') }}" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            Kelola Checksheet Treatment
        </a>
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            Kelola Checksheet Pengecekan
        </a>
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            Laporan
        </a>
        <a href="{{ route('jadwal.JadwalKalibrasi') }}" class="nav-link">
            <i class="nav-icon fas fa-tools"></i>
            Kelola Jadwal Kalibrasi
        </a>
        <a href="{{ route('logout') }}" class="nav-link">
            <i class="nav-icon fa fa-power-off"></i>
            Logout
        </a>
    </div>

    <div class="content">
        <div class="form-container">
            <h2>Tambah Data Checksheet Treatment</h2>
            <form action="{{ route('cs_treatment.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="date">Tanggal</label>
                    <input type="date" name="date" id="date" required>
                </div>
                <div class="form-group">
                    <label for="doc_number">Nomor Dokumen</label>
                    <input type="text" name="doc_number" id="doc_number" value="C.04/01/08/QC/MCC-2024" readonly>
                </div>
                <table>
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Degreasing</td>
                            <td>Water Temperature
                                <hr style="margin: 5px 0;">
                                Total Alkali
                            </td>
                            <td>45 ~ 55 ° C
                                <hr style="margin: 5px 0;">
                                35 ~ 40 point
                            </td>
                            <td>Temperatur meter
                                <hr style="margin: 5px 0;">
                                Elemeyer,pippet
                                volume,phenolpthalein
                                Ind.(PP),Solution 02
                            </td>
                            <td><input type="number" name="result1[]" class="result1" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result1[]" class="result1" required>
                            </td>
                            <td><input type="number" name="result2[]" class="result2" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result2[]" class="result2" required>
                            </td>
                            <td class="judgment">-</td>
                            <td class="action">-</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Water Rinse</td>
                            <td>pH (supply)
                                <hr style="margin: 5px 0;">
                                Contamination
                            </td>
                            <td>7 ~ 9
                                <hr style="margin: 5px 0;">
                                6 point
                            </td>
                            <td>PH Meter
                                <hr style="margin: 5px 0;">
                                Elemeyer,pippet
                                volume,phenolpthalein
                                Ind. (PP),Solution 02
                            </td>
                            <td><input type="number" name="result1[]" class="result1" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result1[]" class="result1" required>
                            </td>
                            <td><input type="number" name="result2[]" class="result2" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result2[]" class="result2" required>
                            </td>
                            <td class="judgment">-</td>
                            <td class="action">-</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Surfacing</td>
                            <td>Ph</td>
                            <td>8 ~ 10</td>
                            <td>PH Meter</td>
                            <td><input type="number" name="result1[]" class="result1" required></td>
                            <td><input type="number" name="result2[]" class="result2" required></td>
                            <td class="judgment">-</td>
                            <td class="action">-</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Phosphating</td>
                            <td>Ph
                                <hr style="margin: 5px 0;">
                                Total Acid (TA)
                                <hr style="margin: 5px 0;">
                                Free Acid (FA)
                                <hr style="margin: 5px 0;">
                                Accelerator (AC)
                            </td>
                            <td>2 ~ 4
                                <hr style="margin: 5px 0;">
                                30 ~ 32 point
                                <hr style="margin: 5px 0;">
                                1 ~ 3 point
                                <hr style="margin: 5px 0;">
                                6 ~ 8 point
                            </td>
                            <td>PH Meter
                                <hr style="margin: 5px 0;">
                                Elemeyer,pippet
                                volume,phenolpthalein
                                Ind. (PP),Solution 01
                                <hr style="margin: 5px 0;">
                                Elemeyer,pippet
                                volume,Bromophenol Blue
                                Ind. (BPB),Solution 01
                                <hr style="margin: 5px 0;">
                                Saccarometer,Titre
                                Powder (sulfamic acid)
                            </td>
                            <td><input type="number" name="result1[]" class="result1" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result1[]" class="result1" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result1[]" class="result1" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result1[]" class="result1" required>
                            </td>
                            <td><input type="number" name="result2[]" class="result2" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result2[]" class="result2" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result2[]" class="result2" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result2[]" class="result2" required>
                            </td>
                            <td class="judgment">-</td>
                            <td class="action">-</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Phosphating rinse 1</td>
                            <td>pH (supply)
                                <hr style="margin: 5px 0;">
                                Contamination
                            </td>
                            <td>5 ~ 7
                                <hr style="margin: 5px 0;">
                                < 6 point </td>
                            <td>PH Meter
                                <hr style="margin: 5px 0;">
                                Elemeyer,pippet
                                volume,phenolpthalein
                                Ind. (PP),Solution 01
                            </td>
                            <td><input type="number" name="result1[]" class="result1" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result1[]" class="result1" required>
                            </td>
                            <td><input type="number" name="result2[]" class="result2" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result2[]" class="result2" required>
                            </td>
                            <td class="judgment">-</td>
                            <td class="action">-</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Phosphating rinse 2</td>
                            <td>pH (supply)
                                <hr style="margin: 5px 0;">
                                Contamination
                            </td>
                            <td>5 ~ 7
                                <hr style="margin: 5px 0;">
                                < 6 point </td>
                            <td>PH Meter
                                <hr style="margin: 5px 0;">
                                Elemeyer,pippet
                                volume,phenolpthalein
                                Ind. (PP),Solution 01
                            </td>
                            <td><input type="number" name="result1[]" class="result1" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result1[]" class="result1" required>
                            </td>
                            <td><input type="number" name="result2[]" class="result2" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result2[]" class="result2" required>
                            </td>
                            <td class="judgment">-</td>
                            <td class="action">-</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>CED Painting</td>
                            <td>Water temperature
                                (Start process)
                                <hr style="margin: 5px 0;">
                                Viscosity
                                <hr style="margin: 5px 0;">
                                Ph
                            </td>
                            <td>27 ~ 30° C
                                <hr style="margin: 5px 0;">
                                Min 1,003 g/cm³
                                <hr style="margin: 5px 0;">
                                5 ~ 7
                            </td>
                            <td>Temperatur meter
                                <hr style="margin: 5px 0;">
                                Hydrometer
                                <hr style="margin: 5px 0;">
                                PH Meter
                            </td>
                            <td><input type="number" name="result1[]" class="result1" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result1[]" class="result1" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result1[]" class="result1" required>
                            </td>
                            <td><input type="number" name="result2[]" class="result2" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result2[]" class="result2" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result2[]" class="result2" required>
                            </td>
                            <td class="judgment">-</td>
                            <td class="action">-</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Anolyte</td>
                            <td>Aliran air
                                <hr style="margin: 5px 0;">
                                Aliran air
                                <hr style="margin: 5px 0;">
                                Ph
                            </td>
                            <td>400 ~ 700µs/cm
                                <hr style="margin: 5px 0;">
                                o,5 ~ 1,5 lt/menit
                                <hr style="margin: 5px 0;">
                                o,5 ~ 1,5 lt/menit
                            </td>
                            <td>El.conductivity mtr
                                <hr style="margin: 5px 0;">
                                Baker glass,stop watch
                                <hr style="margin: 5px 0;">
                                Baker glass,stop watch
                            </td>
                            <td><input type="number" name="result1[]" class="result1" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result1[]" class="result1" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result1[]" class="result1" required>
                            </td>
                            <td><input type="number" name="result2[]" class="result2" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result2[]" class="result2" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result2[]" class="result2" required>
                            </td>
                            <td class="judgment">-</td>
                            <td class="action">-</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>CED Rinse 01</td>
                            <td>Ph</td>
                            <td>5 ~ 7</td>
                            <td>PH Meter</td>
                            <td><input type="number" name="result1[]" class="result1" required></td>
                            <td><input type="number" name="result2[]" class="result2" required></td>
                            <td class="judgment">-</td>
                            <td class="action">-</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>CED Rinse 02</td>
                            <td>Ph</td>
                            <td>5 ~ 7</td>
                            <td>PH Meter</td>
                            <td><input type="number" name="result1[]" class="result1" required></td>
                            <td><input type="number" name="result2[]" class="result2" required></td>
                            <td class="judgment">-</td>
                            <td class="action">-</td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Oven</td>
                            <td>Oven temperature
                                <hr style="margin: 5px 0;">
                                Menit ke
                            </td>
                            <td>180 ~ 200° C
                                <hr style="margin: 5px 0;">
                                15
                                <hr style="margin: 5px 0;">
                                45
                                <hr style="margin: 5px 0;">
                                60
                                <hr style="margin: 5px 0;">
                                90
                                <hr style="margin: 5px 0;">
                                120
                            </td>
                            <td>Temperatur meter
                                <hr style="margin: 5px 0;">
                                Temperatur meter
                                <hr style="margin: 5px 0;">
                                Temperatur meter
                                <hr style="margin: 5px 0;">
                                Temperatur meter
                                <hr style="margin: 5px 0;">
                                Temperatur meter
                                <hr style="margin: 5px 0;">
                                Temperatur meter
                            </td>
                            <td><input type="number" name="result1[]" class="result1" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result1[]" class="result1" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result1[]" class="result1" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result1[]" class="result1" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result1[]" class="result1" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result1[]" class="result1" required>
                            </td>
                            <td><input type="number" name="result2[]" class="result2" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result2[]" class="result2" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result2[]" class="result2" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result2[]" class="result2" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result2[]" class="result2" required>
                                <hr style="margin: 5px 0;">
                                <input type="number" name="result2[]" class="result2" required>
                            </td>
                            <td class="judgment">-</td>
                            <td class="action">-</td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <button type="submit">Simpan</button>
                    <a href="{{ route('cs_treatment.index') }}" class="btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    document.querySelectorAll('.result1, .result2').forEach(input => {
        input.addEventListener('input', function() {
            const row = this.closest('tr'); // Ambil baris saat ini
            const parameter = row.cells[1].textContent.trim(); // Ambil parameter dari kolom Parameter
            const result1 = row.querySelector('.result1').value
        .trim(); // Ambil nilai Result 1 sebagai string
            const result2 = row.querySelector('.result2').value
        .trim(); // Ambil nilai Result 2 sebagai string

            // Jika kolom Result 1 kosong, kosongkan kolom Judgment dan Action
            if (!result1) {
                row.querySelector('.judgment').textContent = '';
                row.querySelector('.action').textContent = '';
                return; // Hentikan proses jika Result 1 belum diisi
            }

            const result1Value = parseFloat(result1) ||
            0; // Konversi Result 1 ke angka (default 0 jika kosong)
            const result2Value = parseFloat(result2) ||
            0; // Konversi Result 2 ke angka (default 0 jika kosong)

            // Definisi standar berdasarkan parameter
            const standards = {
                "Water Temperature": [45, 55],
                "Total Alkali": [35, 40],
                "pH (supply)": [7, 9],
                "Contamination": [6, 6],
                "Ph": [8, 10],
                "Total Acid (TA)": [30, 32],
                "Free Acid (FA)": [1, 3],
                "Accelerator (AC)": [6, 8]
            };

            const standard = standards[parameter] || [0, 0]; // Default jika parameter tidak ditemukan
             console.log('Standard for parameter:', standard);

            // Periksa apakah Inspection Result 1 sesuai standar
            const isResult1Ok = result1Value >= standard[0] && result1Value <= standard[1];

            // Periksa apakah Inspection Result 2 sesuai standar (jika diisi)
            const isResult2Ok = !result2 || (result2Value >= standard[0] && result2Value <= standard[
            1]);
            console.log('Result 1 OK:', isResult1Ok);
            console.log('Result 2 OK:', isResult2Ok);

            // Gabungkan logika penilaian untuk kedua hasil
            const isOk = isResult1Ok && isResult2Ok;

            // Tentukan Judgment dan Action
            const judgment = isOk ? 'OK' : 'NG';
            const action = isOk ? 'Tidak memerlukan rekomendasi' :
                'Periksa kembali proses atau alat pengukuran';

             console.log('Parameter:', parameter);
        console.log('Result 1 (string):', result1);
        console.log('Result 1 (number):', result1Value);
        console.log('Result 2 (string):', result2);
        console.log('Result 2 (number):', result2Value);


            // Perbarui kolom Judgment dan Action
            row.querySelector('.judgment').textContent = judgment;
            row.querySelector('.action').textContent = action;

             console.log('Updated Judgment:', row.querySelector('.judgment').textContent);
            console.log('Updated Action:', row.querySelector('.action').textContent);
        });
    });
</script>
 
</html>
