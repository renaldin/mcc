<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal Kalibrasi</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            height: 100vh;
        }

        /* Sidebar styling */
        .sidebar {
            width: 250px;
            background-color: rgb(62, 60, 60);
            color: #ecf0f1;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
        }

        .sidebar a {
            text-decoration: none;
            color: #ecf0f1;
            padding: 15px 20px;
            display: block;
            border-bottom: 1px solidrgb(246, 249, 251);
        }

        .sidebar a:hover {
            background-color: rgb(1, 140, 254);
        }

        /* Navbar styling */
        .navbar {
            width: 100%;
            height: 60px;
            background-color: rgb(236, 241, 246);
            color: rgb(35, 35, 35);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
        }

        .navbar .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar .menu {
            display: flex;
            gap: 15px;
        }

        .navbar .menu a {
            text-decoration: none;
            color: rgb(4, 4, 4);
            font-size: 1rem;
        }

        .navbar .menu a:hover {
            color: rgb(247, 247, 248);
        }

        /* Main content area */
        .content {
            flex: 1;
            padding: 20px;
            background-color: #ecf0f1;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: auto;
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

        <style>.nav-item {
            list-style: none;
            /* Hapus bullet point */
        }

        .nav-link {
            color: white;
            /* Ubah warna teks */
            text-decoration: none;
            /* Hilangkan garis bawah */
            padding: 10px 15px;
            /* Tambahkan padding */
            display: flex;
            align-items: center;
            /* Selaraskan ikon dan teks */
            border-radius: 5px;
            /* Berikan sedikit sudut melengkung */
        }

        .nav-link:hover {
            background-color: #34495e;
            /* Warna hover */
        }

        .nav-icon {
            font-size: 1.2rem;
            /* Sesuaikan ukuran ikon */
        }


        .nav-link .nav-icon {
            display: inline-block;
            vertical-align: middle;
            margin-right: 8px;
        }

        .nav-link p {
            display: inline-block;
            vertical-align: middle;
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <a href="index3.html" class="brand-link">
            <span class="brand-text font-weight-light"> PT. Masato Catur Coating</span>
        </a>
        <div class="info">
            <a href="#" class="d-block">Admin</a>
        </div>
        <ul class="nav nav-pills nav-sidebar flex-column" style="list-style: none; padding-left: 0; margin-left: 0;">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="nav-icon fas fa-tools"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('Auth.profile') }}" class="nav-link active">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        <p class="d-inline ml-2">Profile</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('cs_treatment.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p class="d-inline ml-2">Kelola Checksheet Treatment</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Kelola Checksheet Pengecekan
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p class="d-inline ml-2">Laporan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('jadwal.JadwalKalibrasi') }}" class="nav-link active">
                    <i class="nav-icon fas fa-tools"></i>
                    <p class="d-inline ml-2">Kelola Jadwal Kalibrasi</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link active">
                    <i class="nav-icon fa fa-power-off"></i>
                    <p class="d-inline ml-2">Logout</p>
                </a>
            </li>

        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="form-container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <h2>Tambah Jadwal Kalibrasi</h2>
            <form action="{{ route('jadwal.store') }}" method="POST">
                @csrf
                <form id="jadwalKalibrasiForm">
                    <div class="form-group">
                        <label for="namaAlat">Pilih Nama Alat</label>
                        <select id="namaAlat" name="namaAlat[]" multiple>
                            <option value="Alat 1">TDS Meter</option>
                            <option value="Alat 2">Lig Thermometer</option>
                            <option value="Alat 3">SIM Thickness Gauge</option>
                            <option value="Alat 4">PH Meter</option>
                            <option value="Alat 4">Hydrometer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea id="keterangan" name="keterangan" rows="4" placeholder="Masukkan keterangan"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit">Buat Jadwal</button>
                    </div>
                </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#namaAlat').select2({
                placeholder: 'Pilih alat yang akan dikalibrasi',
                allowClear: true
            });

            $('#jadwalKalibrasiForm').on('submit', function(event) {
                event.preventDefault();
                const formData = $(this).serializeArray();
                console.log('Data Jadwal Kalibrasi:', formData);
                alert('Jadwal kalibrasi berhasil disimpan!');
                // Tambahkan fungsi penyimpanan ke database di sini.
            });
        });
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</body>

</html>
