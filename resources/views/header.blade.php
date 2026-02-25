<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AbsensiKu</title>

<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* Navbar Custom Styling */
        .navbar-absensiku {
            background: linear-gradient(135deg, #ffffff 0%, #283593 100%);
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.2);
            padding: 8px 0;
        }
        
        .navbar-brand-absensi {
            display: flex;
            align-items: center;
            gap: 15px;
            padding-left: 20px;
            text-decoration: none !important;
        }
        
        /* Logo Besar */
        .navbar-brand-absensi img {
            width: 100px; /* Ukuran tetap besar */
            height: 100px;
            object-fit: contain;
            transition: transform 0.3s ease;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
        }
        
        .navbar-brand-absensi:hover img {
            transform: scale(1.05) rotate(5deg);
        }
        
        .brand-text-container {
            display: flex;
            flex-direction: column;
        }
        
        .brand-text-main {
            color: #ffffff;
            font-weight: 800;
            font-size: 2rem;
            margin: 0;
            line-height: 1;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
            letter-spacing: 1px;
        }
        
        .brand-text-sub {
            color: linear-gradient(#ffffff);
            font-size: 0.85rem;
            margin: 3px 0 0 0;
            font-weight: 500;
            letter-spacing: 0.5px;
        }
        
        /* Navbar Links */
        .nav-link-custom {
            color: #e3f2fd !important;
            padding: 12px 18px !important;
            border-radius: 8px;
            margin: 0 4px;
            transition: all 0.3s ease;
            font-weight: 600;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .nav-link-custom:hover, .nav-link-custom.active {
            background: rgba(255, 255, 255, 0.15);
            color: #ffffff !important;
            transform: translateY(-1px);
        }
        
        /* Badge untuk level */
        .level-badge {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-left: 5px;
        }
                
        /* Dropdown Menu */
        .dropdown-menu-custom {
            background: linear-gradient(135deg, #2c387e 0%, #3949ab 100%);
            border: none;
            border-radius: 10px;
            margin-top: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            min-width: 220px;
        }
        
        .dropdown-item-custom {
            color: #e8eaf6;
            padding: 12px 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.2s ease;
            border-radius: 6px;
            margin: 2px 6px;
            font-weight: 500;
        }
        
        .dropdown-item-custom:hover {
            background: rgba(255, 255, 255, 0.15);
            color: #ffffff;
            transform: translateX(5px);
        }
        
        .dropdown-divider-custom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin: 8px 12px;
        }
        
        /* User Info */
        .user-info-container {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 10px 15px;
            margin-right: 10px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .user-avatar-large {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #ff4081, #7b1fa2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.2rem;
            border: 3px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }
        
        .user-details {
            color: white;
        }
        
        .user-name {
            font-weight: 700;
            font-size: 0.95rem;
            margin-bottom: 2px;
        }
        
        .user-role {
            font-size: 0.8rem;
            color: #001eff;
            font-weight: 500;
        }
        

        .nav-link-custom:hover, 
.nav-link-custom.active {
    background: rgba(255, 255, 255, 0.15);
    color: #ffffff !important;
    transform: translateY(-1px);
}
        
.btn-logout-custom:hover {
    background: rgba(255, 255, 255, 0.15);
    color: #ffffff !important;
    transform: translateY(-1px);
}        
        /* Toggle Button */
        .navbar-toggler-custom {
            border: 2px solid rgba(255, 255, 255, 0.3);
            padding: 6px 10px;
            border-radius: 6px;
        }
        
        .navbar-toggler-custom .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.9%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        
        /* Mobile Responsive */
        @media (max-width: 992px) {
            .navbar-nav {
                padding: 15px 0;
            }
            
            .nav-link-custom {
                margin: 5px 0;
                padding: 10px 15px !important;
            }
            
            .dropdown-menu-custom {
                position: static !important;
                margin-top: 5px;
                width: 100%;
                background: #2c387e;
            }
            
            .user-info-container {
                margin: 10px 0;
                width: 100%;
            }
                        
            /* Adjust logo size on mobile */
            .navbar-brand-absensi img {
                width: 70px;
                height: 70px;
            }
            
            .brand-text-main {
                font-size: 1.7rem;
            }
        }
        
        @media (max-width: 576px) {
            .navbar-brand-absensi {
                padding-left: 10px;
            }
            
            .navbar-brand-absensi img {
                width: 60px;
                height: 60px;
            }
            
            .brand-text-main {
                font-size: 1.5rem;
            }
            
            .brand-text-sub {
                font-size: 0.75rem;
            }
        }
        
        /* Print styles */
        @media print {
            .navbar {
                display: none !important;
            }
            
            body * {
                visibility: hidden;
            }

            .print-area, .print-area * {
                visibility: visible;
            }

            .print-area {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }

            .btn, .no-print {
                display: none !important;
            }
        }
        
        /* Main Content */
        .main-content {
            margin-top: 20px;
            padding: 25px;
            min-height: calc(100vh - 90px);
            background-color: #f5f7fa;
        }
        
        /* Welcome Banner */
        .welcome-banner {
            background: linear-gradient(135deg, #283593 0%, #3949ab 100%);
            color: white;
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 5px 20px rgba(40, 53, 147, 0.2);
        }
        
        .welcome-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .welcome-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 15px;
        }

        /* Tambahkan di akhir style */
body > nav.navbar-absensiku ~ nav.navbar-absensiku {
    display: none !important;
}

body > .container-fluid.main-content ~ .container-fluid.main-content {
    display: none !important;
}
        
        body {
            background-color: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Hapus logo user ungu */
.user-avatar-large {
    display: none !important;
}
    </style>
</head>
<body>
@php
$allowedMenus = [];

if(session('level')) {
    $allowedMenus = DB::table('permissions')
        ->where('level', session('level'))
        ->pluck('menu_key')
        ->toArray();
}
@endphp
<!-- Navbar Horizontal -->
<nav class="navbar navbar-expand-lg navbar-absensiku">
    <div class="container-fluid">
        <!-- Logo dan Brand -->
        <a class="navbar-brand-absensi" href="/home">
            <img src="{{ asset('images/logo.png') }}" alt="Logo AbsensiKu">
            <div class="brand-text-container">
                <div class="brand-text-main">AbsensiKu</div>
                <div class="brand-text-sub">Sistem Manajemen Kehadiran</div>
            </div>
        </a>
        
        <!-- Toggle Button untuk Mobile -->
        <button class="navbar-toggler navbar-toggler-custom" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Navbar Menu -->
        <div class="collapse navbar-collapse" id="navbarMain">
            <div class="navbar-nav ms-auto align-items-center">
                
                <!-- User Info -->
                <div class="user-info-container d-flex align-items-center me-3">
                    <div class="user-avatar-large me-3">
                        {{ substr(session('username') ?? 'U', 0, 1) }}
                    </div>
                    <div class="user-details">
                        <div class="user-name">{{ session('username') ?? 'User' }}</div>
                        <div class="user-role">
                            @if(session('level') == 1)
                                Karyawan <span ></span>
                            @elseif(session('level') == 2)
                                Admin <span ></span>
                            @elseif(session('level') == 3)
                                Super Admin <span ></span>
                            @elseif(session('level') == 4)
                                Manajer <span ></span>
                            @else
                                Guest
                            @endif
                        </div>
                    </div>
                </div>
                
                <!-- Menu berdasarkan Level User -->
                @if(session('level') == 1)
                    <!-- Karyawan (Level 1) Menu -->
                    <li class="nav-item">
                        <a class="nav-link-custom" href="/riwayat_absensi">
                            <i class="bi bi-clock-history"></i> Riwayat Absensi
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link-custom" href="/pengajuan">
                            <i class="bi bi-send-check"></i> Pengajuan izin
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link-custom" href="/akun">
                            <i class="bi bi-person-circle"></i> Akun
                        </a>
                    </li>
                    
                @elseif(session('level') == 2)
                    <!-- Admin (Level 2) Menu -->
                    @if(in_array('data_karyawan', $allowedMenus))
                    <li class="nav-item">
                        <a class="nav-link-custom" href="/data_karyawan">
                            <i class="bi bi-people-fill"></i> Data Karyawan
                        </a>
                    </li>
                    @endif  

                    @if(in_array('data_absensi', $allowedMenus))
                    <li class="nav-item">
                        <a class="nav-link-custom" href="/data_absensi">
                            <i class="bi bi-calendar-check"></i> Data Absensi
                        </a>
                    </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link-custom" href="/data_pengajuan_izin">
                            <i class="bi bi-clipboard-check"></i> Data Pengajuan izin
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link-custom" href="/laporan_absensi">
                            <i class="bi bi-file-earmark-bar-graph"></i> Laporan Absensi
                        </a>
                    </li>
                    
                @elseif(session('level') == 3)
                    <!-- Super Admin (Level 3) Menu -->
                    @if(in_array('data_karyawan', $allowedMenus))
                    <li class="nav-item">
                        <a class="nav-link-custom" href="/data_karyawan">
                            <i class="bi bi-people-fill"></i> Data Karyawan
                        </a>
                    </li>
                    @endif                    

                    @if(in_array('data_admin', $allowedMenus))
                    <li class="nav-item">
                        <a class="nav-link-custom" href="/data_admin">
                            <i class="bi bi-person-badge"></i> Data Admin
                        </a>
                    </li>
                    @endif       

                    @if(in_array('data_absensi', $allowedMenus))
                    <li class="nav-item">
                        <a class="nav-link-custom" href="/data_absensi">
                            <i class="bi bi-calendar-check"></i> Data Absensi
                        </a>
                    </li>
                    @endif                    

                    @if(in_array('laporan_absensi', $allowedMenus))
                    <li class="nav-item">
                        <a class="nav-link-custom" href="/laporan_absensi">
                            <i class="bi bi-file-earmark-bar-graph"></i> Laporan Absensi
                        </a>
                    </li>
                    @endif                    

                @if(in_array('pengaturan_akses', $allowedMenus))
                <li class="nav-item">
                    <a class="nav-link-custom" href="/pengaturan_akses">
                        <i class="bi bi-gear"></i> Pengaturan Akses
                    </a>
                </li>
                @endif                    
                
                @elseif(session('level') == 4)
                    <!-- Manajer (Level 4) Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link-custom" href="/laporan_absensi">
                            <i class="bi bi-file-earmark-bar-graph"></i> Laporan Absensi
                        </a>
                    </li>
                    
                @endif
                
                <!-- Logout Button untuk semua level -->
                <li class="nav-item">
                <a href="/logout" class="nav-link-custom">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>                </li>
            </div>
        </div>
    </div>
</nav>
    
    <!-- Area konten dinamis -->
    <div class="mt-4">
        <!-- Flash Messages -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        
        <!-- Konten halaman akan dimuat di sini -->
        @yield('content')
    </div>
</div>

<script>
    // Script untuk navbar aktif
    document.addEventListener('DOMContentLoaded', function() {
        // Menandai link aktif berdasarkan URL saat ini
        const currentPath = window.location.pathname;
        const navLinks = document.querySelectorAll('.nav-link-custom, .dropdown-item-custom');
        
        navLinks.forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('active');
                
                // Jika ini adalah dropdown item, aktifkan juga dropdown toggle
                if (link.classList.contains('dropdown-item-custom')) {
                    const dropdownMenu = link.closest('.dropdown-menu-custom');
                    if (dropdownMenu) {
                        const dropdownToggle = dropdownMenu.previousElementSibling;
                        if (dropdownToggle && dropdownToggle.classList.contains('dropdown-toggle')) {
                            dropdownToggle.classList.add('active');
                        }
                    }
                }
            }
        });
        
        // Mobile menu close on click (untuk dropdown)
        const dropdownItems = document.querySelectorAll('.dropdown-item-custom');
        const navbarToggler = document.querySelector('.navbar-toggler-custom');
        const navbarCollapse = document.querySelector('.navbar-collapse');
        
        dropdownItems.forEach(item => {
            item.addEventListener('click', function() {
                if (window.innerWidth < 992) {
                    navbarCollapse.classList.remove('show');
                }
            });
        });
        
function updateClock() {
    const dateEl = document.getElementById('current-date');
    const timeEl = document.getElementById('current-time');
    if (!dateEl || !timeEl) return;

    const now = new Date();
    dateEl.textContent = now.toLocaleDateString('id-ID', {
        day: 'numeric', month: 'long', year: 'numeric'
    });
    timeEl.textContent = now.toLocaleTimeString('id-ID');
}
        
        updateClock();
        setInterval(updateClock, 1000);
        
        const logo = document.querySelector('.navbar-brand-absensi img');
        if (logo) {
            logo.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.05) rotate(5deg)';
            });
            
            logo.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1) rotate(0deg)';
            });
        }
    });
</script>
