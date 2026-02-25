    @include ('header')
    
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* Main Content */
        .main-content {
            margin-top: 20px;
            padding: 25px;
            min-height: calc(100vh - 90px);
            background-color: #f5f7fa;
        }

        .btn-warning {
    background: #f1c40f;
    color: black;
}

.btn-primary-custom {
    background: #1e88e5;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 600;
    transition: 0.3s;
}

.btn-primary-custom:hover {
    background: #1565c0;
}

        .btn-success {
    background: #2ecc71;
}

.btn-disabled {
    background: #95a5a6;
    cursor: not-allowed;
}

        
        
        /* Welcome Banner */
        .welcome-banner {
            background: linear-gradient(135deg, #283593 0%, #3949ab 100%);
            color: white;
            padding: 30px 25px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 5px 20px rgba(40, 53, 147, 0.2);
        }
        
        .welcome-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 8px;
        }
        
        .welcome-subtitle {
            font-size: 1rem;
            opacity: 0.95;
            margin-bottom: 0;
            font-weight: 400;
        }
        
        body {
            background-color: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Alert Messages */
        .alert {
            border-radius: 10px;
            border: none;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        
        .alert-success {
            background: linear-gradient(135deg, #4CAF50, #2E7D32);
            color: white;
        }
        
        .alert-danger {
            background: linear-gradient(135deg, #f44336, #c62828);
            color: white;
        }
        
        .alert .btn-close {
            filter: invert(1);
        }

        .absen-card {
    background: white;
    padding: 25px 30px;
    border-radius: 15px;
    margin: 0 30px 30px 30px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);

    display: flex;
    justify-content: space-between;
    align-items: center;
}

.absen-card h3 {
    margin: 0;
    font-weight: 600;
    color: #1e3c72;
}
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
    .welcome-banner {
        padding: 20px;
    }
    
    .welcome-title {
        font-size: 1.7rem;
    }
    
    .welcome-subtitle {
        font-size: 1rem;
    }
}

@media (max-width: 576px) {
    .welcome-banner {
        padding: 15px;
    }
    
    .welcome-title {
        font-size: 1.5rem;
    }
    
    .welcome-subtitle {
        font-size: 0.9rem;
    }
}

.header {
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    color: white;
    padding: 25px 30px;
    border-radius: 12px;
    margin: 30px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
}
        
        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .logo h1 {
            font-size: 28px;
            margin-bottom: 5px;
        }
        
        .logo p {
            font-size: 14px;
            opacity: 0.9;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.15);
            padding: 12px 18px;
            border-radius: 12px;
        }
        
        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background-color: white;
            color: #2a5298;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            margin-right: 12px;
        }
        
        .user-details h3 {
            font-size: 16px;
            margin-bottom: 3px;
        }
        
        .user-details .role {
            font-size: 12px;
            opacity: 0.9;
        }
        
        .welcome-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .welcome-text h2 {
            font-size: 22px;
            margin-bottom: 8px;
        }
        
        .welcome-text p {
            font-size: 14px;
            opacity: 0.9;
        }
        
        .current-time {
            text-align: right;
        }
        
        .current-time .date {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .badge-hadir { color: #2ecc71; font-weight: bold; }
.badge-terlambat { color: #f1c40f; font-weight: bold; }
.badge-alpha { color: #e74c3c; font-weight: bold; }

        
    </style>
</head>
<body>

    <div class="header">
            <div class="header-top">
                <div class="logo">
                    <h1>AbsensiKu</h1>
                    <p>Sistem Manajemen Kehadiran</p>
                </div>
                
                <div class="user-info">
                    <div class="user-avatar">
                {{ strtoupper(substr(session('username'),0,1)) }}
                    </div>

                    <div class="user-details">
                        <h3 id="user-name">{{ session('username') }}</h3>
                        <span class="role" id="user-role">@if(session('level') == 1)
                        Karyawan
                    @elseif(session('level') == 2)
                        Admin
                    @elseif(session('level') == 3)
                        Super Admin
                    @elseif(session('level') == 4)
                        Manajer
                    @else
                    @endif</span>
                    </div>
                </div>
            </div>
            
            <div class="welcome-section">
                <div class="welcome-text">
                    <h2>Selamat Datang, {{ session('username') }}!</h2>
                    <p>Anda login sebagai <strong>{{ session('level') == 1 ? 'Karyawan' : (session('level') == 2 ? 'Admin' : (session('level') == 3 ? 'Super Admin' : 'Manajer')) }}</strong>. Akses penuh untuk mengelola sistem absensi perusahaan.</p>
                </div>
                
                <div class="current-time">
                    <div class="date" id="current-date">10 Februari 2026</div>
                    <div class="time" id="current-time">12:58:50</div>
                </div>
            </div>
        </div>

@if(session('level') == 1)

<div class="absen-card">
    <h3>Silakan lakukan absensi hari ini</h3>

@if($absenHariIni)
    @if($absenHariIni->status_absensi == 'hadir')
        <button class="btn-absen btn-success text-white" disabled>
            Hadir
        </button>
    @else
        <button class="btn-absen btn-warning text-white" disabled>
            Terlambat
        </button>
    @endif

@elseif($jam > '12:00:00')
    <button class="btn-absen btn-disabled text-white" disabled>
        Waktu Absen Sudah Berakhir
    </button>

@else
    <form action="{{ url('/proses_absen') }}" method="GET">
        <button type="submit" class="btn-absen btn-primary-custom">
            ABSEN SEKARANG
        </button>
    </form>
@endif
</div>
@endif

<script>
    // Script untuk jam live
    document.addEventListener('DOMContentLoaded', function() {
        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            
            document.getElementById('liveClock').textContent = `${hours}:${minutes}:${seconds}`;
        }
        
        function updateDate() {
            const now = new Date();
            const options = { day: 'numeric', month: 'long', year: 'numeric' };
            const dateString = now.toLocaleDateString('id-ID', options);
            document.getElementById('currentDate').textContent = dateString;
        }
        
        updateClock();
        updateDate();
        
        setInterval(updateClock, 1000);
        setInterval(updateDate, 24 * 60 * 60 * 1000);
    });

    function updateDateTime() {
            const now = new Date();
            
            // Format tanggal
            const optionsDate = { day: 'numeric', month: 'long', year: 'numeric' };
            const formattedDate = now.toLocaleDateString('id-ID', optionsDate);
            document.getElementById('current-date').textContent = formattedDate;
            
            // Format waktu
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('current-time').textContent = `${hours}:${minutes}:${seconds}`;
        }
</script>

@include('footer');