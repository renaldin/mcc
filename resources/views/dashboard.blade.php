<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem MCC </title>
    <!-- Link CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #a8e063 0%, #f9f047 100%);
            color: white;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background: rgba(0, 0, 0, 0.7);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #fff;
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            width: 40px;
            height: 40px;
            margin-right: 10px;
            border-radius: 50%;
        }

        .nav-link {
            color: #fff !important;
            font-weight: bold;
            margin-left: 15px;
            transition: 0.3s ease;
        }

        .nav-link:hover {
            color: #a8e063 !important;
        }

        .hero {
            text-align: center;
            padding: 100px 20px;
            flex: 1; /* agar mendorong footer ke bawah */
        }

        footer {
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 10px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('logo-MCC.png') }}" alt="Logo PT. Masato Catur Coating"> 
                PT. Masato Catur Coating
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/login">
                            <i class="fas fa-user"></i> Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <h1>Selamat Datang Di Sistem Informasi Manajemen Pemeliharaan Cathodic Electro Deposition Painting Pada PT Masato Catur Coating</h1>
        <p>Kelola data dan informasi perusahaan dengan mudah dan efisien menggunakan sistem ini.</p>
    </div>

    <!-- Footer -->
    <footer>
        <p class="mb-0">© 2025 PT Masato Catur Coating | Semua Hak Dilindungi</p>
    </footer>

    <!-- Link JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</body>
</html>
