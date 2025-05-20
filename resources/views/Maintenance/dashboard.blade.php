@extends('Layouts.main')

@section('content')
    <style>
        .dashboard-container {
            background: linear-gradient(135deg, #f0f2f5 60%, #e1e5ea 100%);
            /* Gradien lembut */
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .welcome-card {
            background-color: #ffffff;
            padding: 60px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .welcome-icon {
            font-size: 72px;
            color: #007bff;
            /* Warna primer yang menarik */
            margin-bottom: 20px;
        }

        .welcome-title {
            font-size: 2.5rem;
            color: #343a40;
            /* Warna teks utama */
            margin-bottom: 15px;
            font-weight: 600;
        }

        .welcome-subtitle {
            font-size: 1.1rem;
            color: #6c757d;
            /* Warna teks sekunder */
        }
    </style>

    <div class="dashboard-container">
        <div class="welcome-card">
            <i class="fas fa-tachometer-alt welcome-icon"></i>
            <h1 class="welcome-title">Selamat Datang di Dashboard Dep Maintenance</h1>
            <p class="welcome-subtitle">Hanya digunakan oleh Dep Maintenance</p>
        </div>
    </div>
@endsection
