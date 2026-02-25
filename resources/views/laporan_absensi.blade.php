@include ('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
    gap: 8px;
}

.pagination button {
    padding: 6px 12px;
    border: none;
    background: #2a5298;
    color: white;
    border-radius: 6px;
    cursor: pointer;
}

.pagination button.active {
    background: #1e3c72;
}

.filters-row {
    display: flex;
    align-items: center;
    width: 100%;
}

/* EXPORT di kiri */
.export-actions {
    display: flex;
    gap: 12px;
}

/* FILTER dipaksa ke kanan */
.filter-right {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
    margin-left: auto;   /* <<< INI YANG MEMINDAHKAN KE KANAN */
}


    .btn-export {
    border-radius: 8px;
    padding: 8px 14px;
    font-weight: 600;
    font-size: 0.85rem;
    display: flex;
    align-items: center;
    gap: 6px;
    border: none;
    transition: all 0.3s ease;
}

/* PDF */
.btn-pdf {
    background: linear-gradient(135deg, #e53935, #c62828);
    color: white;
}
.btn-pdf:hover {
    background: linear-gradient(135deg, #c62828, #b71c1c);
    transform: translateY(-2px);
}

/* Excel */
.btn-excel {
    background: linear-gradient(135deg, #43a047, #2e7d32);
    color: white;
}
.btn-excel:hover {
    background: linear-gradient(135deg, #2e7d32, #1b5e20);
    transform: translateY(-2px);
}

/* Print */
.btn-print {
    background: linear-gradient(135deg, #1e88e5, #1565c0);
    color: white;
}
.btn-print:hover {
    background: linear-gradient(135deg, #1565c0, #0d47a1);
    transform: translateY(-2px);
}

        
        body {
            background-color: #f5f7fa;
            color: #333;
            min-height: 100vh;
        }
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* Header */
        .header {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 25px 30px;
            border-radius: 12px;
            margin-bottom: 30px;
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
            padding: 10px 15px;
            border-radius: 8px;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: white;
            color: #2a5298;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: bold;
            margin-right: 10px;
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

        @media print {

    /* Sembunyikan semua dulu */
    body * {
        visibility: hidden;
    }

    /* Tampilkan hanya tabel laporan */
    .table-section,
    .table-section * {
        visibility: visible;
    }

    /* Posisikan tabel ke atas */
    .table-section {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        box-shadow: none !important;
    }

    /* Hilangkan elemen yang bikin halaman pecah */
    .charts-section,
    .dashboard-cards,
    .header,
    .filters-section,
    .footer {
        display: none !important;
    }

    /* Hilangkan tombol */
    .no-print,
    .export-actions,
    button {
        display: none !important;
    }

}

.print-header {
    display: none;
}

@media print {

    @page {
        size: A4 portrait;
        margin: 15mm;
    }

    /* Header custom */
    .print-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 15px;
    }

    .print-header img {
        width: 70px;
        height: auto;
    }

    .print-title h3 {
        margin: 0;
        font-size: 16px;
    }

    .print-title small {
        color: #555;
        font-size: 11px;
    }

    /* Sembunyikan elemen lain */
    body * {
        visibility: hidden;
    }

    .print-header,
    .print-header *,
    .table-section,
    .table-section * {
        visibility: visible;
    }

    .table-section {
        position: absolute;
        top: 80px;
        left: 0;
        width: 100%;
        box-shadow: none;
    }



    /* Jangan tampilkan dashboard dll */
    .header,
    .dashboard-cards,
    .charts-section,
    .filters-section,
    .footer,
    button {
        display: none !important;
    }



}

.filter-right {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: nowrap;
    margin-left: auto;
}

.filter-input {
    padding: 8px 12px;
    border-radius: 8px;
    border: 1px solid #dce3ec;
    font-size: 14px;
    min-width: 150px;
    transition: all 0.25s ease;
}

.filter-input:focus {
    outline: none;
    border-color: #2a5298;
    box-shadow: 0 0 0 2px rgba(42, 82, 152, 0.15);
}

.apply-btn {
    padding: 8px 18px;
    border-radius: 8px;
    background: linear-gradient(135deg, #2a5298, #1e3c72);
    color: #fff;
    border: none;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 6px;
}

.apply-btn:hover {
    transform: translateY(-1px);
    opacity: 0.95;
}

.clear-btn {
    padding: 8px 12px;
    border-radius: 8px;
    background: #555;
    border: 1px solid #dce3ec;
    cursor: pointer;
    color: #555;
}

.clear-btn:hover {
    background: #e4ebf3;
}



        
        .current-time .time {
            font-size: 24px;
            font-weight: bold;
        }
        
        /* Dashboard Cards */
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .dashboard-card {
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            transition: transform 0.3s ease;
        }
        
        .dashboard-card:hover {
            transform: translateY(-5px);
        }
        
        .card-icon {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 24px;
            color: white;
        }
        
        .icon-today {
            background-color: #3498db;
        }
        
        .icon-weekly {
            background-color: #9b59b6;
        }
        
        .icon-monthly {
            background-color: #2ecc71;
        }
        
        .icon-yearly {
            background-color: #e74c3c;
        }
        
        .card-info h3 {
            font-size: 28px;
            color: #1e3c72;
            margin-bottom: 5px;
        }
        
        .card-info p {
            color: #666;
            font-size: 14px;
        }
        
        /* Charts Section */
        .charts-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(600px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }
        
        @media (max-width: 1300px) {
            .charts-section {
                grid-template-columns: 1fr;
            }
        }
        
        .chart-container {
            background-color: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #f0f4f8;
        }
        
        .chart-title h3 {
            font-size: 18px;
            color: #1e3c72;
            margin-bottom: 5px;
        }
        
        .chart-title p {
            color: #666;
            font-size: 14px;
        }
        
        .chart-actions {
            display: flex;
            gap: 10px;
        }
        
        .chart-action-btn {
            padding: 6px 12px;
            background-color: #f0f4f8;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .chart-action-btn:hover {
            background-color: #e1e8f0;
        }
        
        .chart-action-btn.active {
            background-color: #2a5298;
            color: white;
        }
        
        .chart-wrapper {
            height: 300px;
            position: relative;
        }
        
        /* Filters */
        .filters-section {
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }
        
        .filters-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .filters-title h3 {
            font-size: 18px;
            color: #1e3c72;
        }
        
        .filters-controls {
            display: flex;
            gap: 15px;
            align-items: center;
        }
        
        .filter-group {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        
        .filter-label {
            font-size: 14px;
            color: #555;
        }
        
        .filter-select {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            background-color: white;
            font-size: 14px;
            min-width: 150px;
        }
        
        .apply-btn {
            padding: 8px 20px;
            background-color: #2a5298;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.3s;
        }
        
        .apply-btn:hover {
            background-color: #1e3c72;
        }
        
        /* Table */
        .table-section {
            background-color: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }
        
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .table-title h3 {
            font-size: 18px;
            color: #1e3c72;
            margin-bottom: 5px;
        }
        
        .table-title p {
            color: #666;
            font-size: 14px;
        }
        
        .export-btn {
            padding: 8px 20px;
            background-color: #2ecc71;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background-color 0.3s;
        }
        
        .export-btn:hover {
            background-color: #27ae60;
        }
        
        .attendance-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        
        .attendance-table th {
            background-color: #2a5298;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: white;
            border-bottom: 2px solid #f0f4f8;
        }
        
        .attendance-table td {
            padding: 15px;
            border-bottom: 1px solid #f0f4f8;
        }
        
        .attendance-table tr:last-child td {
            border-bottom: none;
        }
        
        .attendance-table tr:hover {
            background-color: #f9fbfd;
        }
        
        .status {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            display: inline-block;
        }
        
        .status.hadir {
            background-color: #e7f7ef;
            color: #2ecc71;
        }
        
        .status.terlambat {
            background-color: #fff4e6;
            color: #f39c12;
        }
        
        .status.izin {
            background-color: #e8f4fc;
            color: #3498db;
        }
        
        .status.cuti {
            background-color: #f3e5f5;
            color: #8e44ad;
        }
        
        .status.alpha {
            background-color: #fdeaea;
            color: #e74c3c;
        }
        
        /* Footer */
        .footer {
            text-align: center;
            padding: 20px;
            color: #777;
            font-size: 14px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
            
            .header {
                padding: 20px;
            }
            
            .header-top {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .user-info {
                margin-top: 15px;
            }
            
            .welcome-section {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .current-time {
                margin-top: 15px;
                text-align: left;
            }
            
            .charts-section {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .chart-container {
                padding: 20px;
            }
            
            .chart-wrapper {
                height: 250px;
            }
            
            .filters-controls {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .filter-group {
                width: 100%;
            }
            
            .filter-select {
                flex-grow: 1;
            }
            
            .dashboard-cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 576px) {
            .dashboard-cards {
                grid-template-columns: 1fr;
            }
            
            .chart-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .chart-actions {
                margin-top: 10px;
            }
            
            .table-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .export-btn {
                margin-left: 8px;
            }
            
            .attendance-table {
                display: block;
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
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
        
        <!-- Dashboard Cards -->
        <div class="dashboard-cards">
            <div class="dashboard-card">
                <div class="card-icon icon-today">
                    <i class="fas fa-calendar-day"></i>
                </div>
                <div class="card-info">
                    <h3 id="today-count">87%</h3>
                    <p>Kehadiran Hari Ini</p>
                </div>
            </div>
            
            <div class="dashboard-card">
                <div class="card-icon icon-weekly">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="card-info">
                    <h3 id="weekly-count">85%</h3>
                    <p>Rata-rata Mingguan</p>
                </div>
            </div>
            
            <div class="dashboard-card">
                <div class="card-icon icon-monthly">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="card-info">
                    <h3 id="monthly-count">86%</h3>
                    <p>Rata-rata Bulanan</p>
                </div>
            </div>
            
            <div class="dashboard-card">
                <div class="card-icon icon-yearly">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <div class="card-info">
                    <h3 id="yearly-count">88%</h3>
                    <p>Rata-rata Tahunan</p>
                </div>
            </div>
        </div>
        
        
        <!-- Charts Section -->
        <div class="charts-section">
            <!-- Today's Attendance Chart -->
            <div class="chart-container">
                <div class="chart-header">
                    <div class="chart-title">
                        <h3>Absensi Hari Ini (15 Karyawan)</h3>
                        <p>Distribusi status kehadiran karyawan hari ini</p>
                    </div>
                    <div class="chart-actions">
                        <button class="chart-action-btn active" data-chart="pie">Pie</button>
                        <button class="chart-action-btn" data-chart="doughnut">Donat</button>
                    </div>
                </div>
                <div class="chart-wrapper">
                    <canvas id="todayChart"></canvas>
                </div>
            </div>
            
            <!-- Daily Attendance Chart -->
            <div class="chart-container">
                <div class="chart-header">
                    <div class="chart-title">
                        <h3>Absensi Harian</h3>
                        <p>Trend kehadiran harian selama bulan berjalan</p>
                    </div>
                    <div class="chart-actions">
                        <button class="chart-action-btn active" data-chart="line">Garis</button>
                        <button class="chart-action-btn" data-chart="bar">Batang</button>
                    </div>
                </div>
                <div class="chart-wrapper">
                    <canvas id="dailyChart"></canvas>
                </div>
            </div>
            
            <!-- Weekly Attendance Chart -->
            <div class="chart-container">
                <div class="chart-header">
                    <div class="chart-title">
                        <h3>Absensi Mingguan</h3>
                        <p>Rata-rata kehadiran per minggu</p>
                    </div>
                    <div class="chart-actions">
                        <button class="chart-action-btn active" data-chart="bar">Batang</button>
                        <button class="chart-action-btn" data-chart="line">Garis</button>
                    </div>
                </div>
                <div class="chart-wrapper">
                    <canvas id="weeklyChart"></canvas>
                </div>
            </div>
            
            <!-- Yearly Attendance Chart -->
            <div class="chart-container">
                <div class="chart-header">
                    <div class="chart-title">
                        <h3>Absensi Tahunan (2023-2026)</h3>
                        <p>Trend kehadiran per bulan dalam beberapa tahun</p>
                    </div>
                    <div class="chart-actions">
                        <button class="chart-action-btn active" data-chart="line">Garis</button>
                        <button class="chart-action-btn" data-chart="bar">Batang</button>
                    </div>
                </div>
                <div class="chart-wrapper">
                    <canvas id="yearlyChart"></canvas>
                </div>
            </div>
        </div>
        
        <div class="print-header">
    <img src="{{ asset('images/logo.png') }}" alt="Logo">
    <div class="print-title">
        <h3>Laporan Absensi</h3>
        <small>{{ date('d F Y') }}</small>
    </div>
        </div>

        <div class="table-section">

<div class="filters-section">

    <h3 class="filters-title">Filter Laporan</h3>

    <div class="filters-row">
@if(session('level') == 2 || session('level') == 3)

        <!-- LEFT : EXPORT -->
        <div class="export-actions no-print">
            <button class="btn btn-danger" id="btnExportPDF">
                <i class="fas fa-file-pdf"></i> PDF
            </button>
            <button class="btn btn-success" id="btnExportExcel">
                <i class="fas fa-file-excel"></i> Excel
            </button>
            <button class="btn btn-primary" id="btnExportWord">
                <i class="fas fa-print"></i> Print
            </button>
        </div>
@endif

<div class="filter-right">

    <!-- Username -->
    <input type="text"
           id="searchUsername"
           class="filter-input"
           placeholder="Username">

    <!-- Jam Masuk / Pulang -->
    <input type="text"
           id="searchTime"
           class="filter-input"
           placeholder="Jam masuk / pulang">

    <!-- Status -->
    <select id="statusFilter" class="filter-input">
        <option value="">Semua Status</option>
        <option value="hadir">Hadir</option>
        <option value="terlambat">Terlambat</option>
        <option value="izin">Izin</option>
        <option value="alpha">Alpha</option>
    </select>

    <!-- Tanggal -->
    <input type="date" id="dateFilter" class="filter-input">

    <!-- Action -->
    <button class="btn btn-primary" onclick="applyFilters()">
        <i class="fas fa-search"></i> Cari
    </button>

    <button class="btn btn-secondary" onclick="clearFilters()">
    Clear
    </button>

</div>


    </div>
</div>

            <table class="attendance-table" id="attendanceTable">
                <thead>
                    <tr>
                        <th>username</th>
                        <th>Departemen</th>
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Jam Pulang</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody id="attendance-data">
                    <!-- Data akan dimasukkan melalui JavaScript -->
                </tbody>
            </table>
        </div>

        <div class="pagination" id="pagination"></div>
        
        <!-- Footer -->
        <div class="footer">
            <p>&copy; 2026 AbsensiKu - Sistem Manajemen Kehadiran. Hak Cipta Dilindungi.</p>
        </div>
    </div>

    <script>
        // Data untuk grafik dan tabel untuk 15 karyawan
        const attendanceData = {
            today: {
                hadir: 13,
                terlambat: 2,
                izin: 0,
                cuti: 0,
                alpha: 0
            },
            daily: [
                { date: '1 Feb', hadir: 15, terlambat: 0, izin: 0 },
                { date: '2 Feb', hadir: 14, terlambat: 1, izin: 0 },
                { date: '3 Feb', hadir: 15, terlambat: 0, izin: 0 },
                { date: '4 Feb', hadir: 13, terlambat: 2, izin: 0 },
                { date: '5 Feb', hadir: 15, terlambat: 0, izin: 0 },
                { date: '6 Feb', hadir: 14, terlambat: 1, izin: 0 },
                { date: '7 Feb', hadir: 15, terlambat: 0, izin: 0 },
                { date: '8 Feb', hadir: 15, terlambat: 0, izin: 0 },
                { date: '9 Feb', hadir: 12, terlambat: 2, izin: 1 },
                { date: '10 Feb', hadir: 13, terlambat: 2, izin: 0 },
                { date: '11 Feb', hadir: 14, terlambat: 1, izin: 0 },
                { date: '12 Feb', hadir: 15, terlambat: 0, izin: 0 },
                { date: '13 Feb', hadir: 15, terlambat: 0, izin: 0 },
                { date: '14 Feb', hadir: 13, terlambat: 1, izin: 1 },
                { date: '15 Feb', hadir: 15, terlambat: 0, izin: 0 }
            ],
            weekly: [
                { week: 'Minggu 1', attendance: 94 },
                { week: 'Minggu 2', attendance: 88 },
                { week: 'Minggu 3', attendance: 92 },
                { week: 'Minggu 4', attendance: 90 }
            ],
            yearly: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                2023: [85, 87, 88, 86, 89, 84, 82, 90, 91, 88, 87, 86],
                2024: [87, 89, 90, 88, 91, 88, 85, 92, 93, 91, 90, 89],
                2025: [89, 91, 92, 90, 93, 91, 88, 94, 95, 93, 92, 91],
                2026: [91, 87, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
            },
            tableData: [
                { name: 'Ahmad Santoso', department: 'IT', date: '2026-02-10', checkIn: '07:55', checkOut: '16:45', status: 'hadir', note: '-' },
                { name: 'Budi Pratama', department: 'HRD', date: '2026-02-10', checkIn: '08:20', checkOut: '16:50', status: 'terlambat', note: 'Macet di tol' },
                { name: 'Citra Dewi', department: 'Keuangan', date: '2026-02-11', checkIn: '07:50', checkOut: '16:30', status: 'hadir', note: '-' },
                { name: 'Dian Sari', department: 'Marketing', date: '2026-02-11', checkIn: '08:05', checkOut: '17:00', status: 'hadir', note: '-' },
                { name: 'Eko Wijaya', department: 'Produksi', date: '2026-02-12', checkIn: '08:25', checkOut: '16:55', status: 'terlambat', note: 'Ban bocor' },
            ]
        };

        // Variabel untuk menyimpan instance chart
        let todayChart, dailyChart, weeklyChart, yearlyChart;
        
        // Update waktu real-time
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
        
        // Hitung persentase kehadiran hari ini
        function calculateTodayPercentage() {
            const total = attendanceData.today.hadir + attendanceData.today.terlambat + 
                         attendanceData.today.izin + attendanceData.today.cuti + attendanceData.today.alpha;
            const present = attendanceData.today.hadir + attendanceData.today.terlambat;
            return Math.round((present / total) * 100);
        }
        
        // Render Today Chart (Pie/Donut)
        function renderTodayChart(type = 'pie') {
            const ctx = document.getElementById('todayChart').getContext('2d');
            
            // Hancurkan chart sebelumnya jika ada
            if (todayChart) todayChart.destroy();
            
            const data = {
                labels: ['Hadir', 'Terlambat', 'Izin', 'Cuti', 'Alpha'],
                datasets: [{
                    data: [
                        attendanceData.today.hadir,
                        attendanceData.today.terlambat,
                        attendanceData.today.izin,
                        attendanceData.today.cuti,
                        attendanceData.today.alpha
                    ],
                    backgroundColor: [
                        '#2ecc71',
                        '#f39c12',
                        '#3498db',
                        '#9b59b6',
                        '#e74c3c'
                    ],
                    borderWidth: 1,
                    borderColor: '#fff'
                }]
            };
            
            const options = {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            usePointStyle: true
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = Math.round((value / total) * 100);
                                return `${label}: ${value} karyawan (${percentage}%)`;
                            }
                        }
                    }
                }
            };
            
            todayChart = new Chart(ctx, {
                type: type,
                data: data,
                options: options
            });
        }
        
        // Render Daily Chart (Line/Bar)
        function renderDailyChart(type = 'line') {
            const ctx = document.getElementById('dailyChart').getContext('2d');
            
            if (dailyChart) dailyChart.destroy();
            
            const dates = attendanceData.daily.map(item => item.date);
            const hadirData = attendanceData.daily.map(item => item.hadir);
            const terlambatData = attendanceData.daily.map(item => item.terlambat);
            
            dailyChart = new Chart(ctx, {
                type: type,
                data: {
                    labels: dates,
                    datasets: [
                        {
                            label: 'Hadir',
                            data: hadirData,
                            borderColor: '#2ecc71',
                            backgroundColor: type === 'bar' ? '#2ecc71' : 'transparent',
                            fill: type === 'line',
                            tension: 0.4
                        },
                        {
                            label: 'Terlambat',
                            data: terlambatData,
                            borderColor: '#f39c12',
                            backgroundColor: type === 'bar' ? '#f39c12' : 'transparent',
                            fill: type === 'line',
                            tension: 0.4
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 16,
                            title: {
                                display: true,
                                text: 'Jumlah Karyawan'
                            }
                        }
                    }
                }
            });
        }
        
        // Render Weekly Chart (Bar/Line)
        function renderWeeklyChart(type = 'bar') {
            const ctx = document.getElementById('weeklyChart').getContext('2d');
            
            if (weeklyChart) weeklyChart.destroy();
            
            const weeks = attendanceData.weekly.map(item => item.week);
            const attendanceDataValues = attendanceData.weekly.map(item => item.attendance);
            
            weeklyChart = new Chart(ctx, {
                type: type,
                data: {
                    labels: weeks,
                    datasets: [{
                        label: 'Persentase Kehadiran',
                        data: attendanceDataValues,
                        backgroundColor: type === 'bar' ? '#9b59b6' : 'transparent',
                        borderColor: '#9b59b6',
                        borderWidth: type === 'bar' ? 0 : 3,
                        fill: type === 'line'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100,
                            title: {
                                display: true,
                                text: 'Persentase (%)'
                            }
                        }
                    }
                }
            });
        }
        
        // Render Yearly Chart (Line/Bar)
        function renderYearlyChart(type = 'line') {
            const ctx = document.getElementById('yearlyChart').getContext('2d');
            
            if (yearlyChart) yearlyChart.destroy();
            
            yearlyChart = new Chart(ctx, {
                type: type,
                data: {
                    labels: attendanceData.yearly.labels,
                    datasets: [
                        {
                            label: '2023',
                            data: attendanceData.yearly[2023],
                            borderColor: '#e74c3c',
                            backgroundColor: type === 'bar' ? '#e74c3c' : 'transparent',
                            fill: false,
                            tension: 0.4
                        },
                        {
                            label: '2024',
                            data: attendanceData.yearly[2024],
                            borderColor: '#3498db',
                            backgroundColor: type === 'bar' ? '#3498db' : 'transparent',
                            fill: false,
                            tension: 0.4
                        },
                        {
                            label: '2025',
                            data: attendanceData.yearly[2025],
                            borderColor: '#2ecc71',
                            backgroundColor: type === 'bar' ? '#2ecc71' : 'transparent',
                            fill: false,
                            tension: 0.4
                        },
                        {
                            label: '2026',
                            data: attendanceData.yearly[2026],
                            borderColor: '#f39c12',
                            backgroundColor: type === 'bar' ? '#f39c12' : 'transparent',
                            fill: false,
                            tension: 0.4,
                            borderDash: [5, 5]
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100,
                            title: {
                                display: true,
                                text: 'Persentase Kehadiran (%)'
                            }
                        }
                    }
                }
            });
        }
        
        // Render tabel data
        function renderTableData() {
            const tbody = document.getElementById('attendance-data');
            tbody.innerHTML = '';
            
            attendanceData.tableData.forEach(item => {
                const row = document.createElement('tr');
                
row.innerHTML = `
    <td class="col-username">${item.name}</td>
    <td>${item.department}</td>
    <td class="col-date">${item.date}</td>
    <td class="col-in">${item.checkIn}</td>
    <td class="col-out">${item.checkOut}</td>
    <td class="col-status">
        <span class="status ${item.status}">
            ${item.status.charAt(0).toUpperCase() + item.status.slice(1)}
        </span>
    </td>
    <td>${item.note}</td>
`;
                
                tbody.appendChild(row);
            });
        }
        
        // Setup chart type toggle buttons
        function setupChartToggles() {
            document.querySelectorAll('.chart-action-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const chartContainer = this.closest('.chart-container');
                    const chartId = chartContainer.querySelector('canvas').id;
                    const chartType = this.getAttribute('data-chart');
                    
                    // Update active button
                    const buttons = chartContainer.querySelectorAll('.chart-action-btn');
                    buttons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Render chart dengan type baru
                    switch(chartId) {
                        case 'todayChart':
                            renderTodayChart(chartType);
                            break;
                        case 'dailyChart':
                            renderDailyChart(chartType);
                            break;
                        case 'weeklyChart':
                            renderWeeklyChart(chartType);
                            break;
                        case 'yearlyChart':
                            renderYearlyChart(chartType);
                            break;
                    }
                });
            });
        }
        
        // Setup filter functionality
        function setupFilters() {
            document.getElementById('apply-filters').addEventListener('click', function() {
                const department = document.getElementById('filter-department').value;
                const period = document.getElementById('filter-period').value;
                
                // Simulasikan filter data
                alert(`Filter diterapkan:\nDepartemen: ${department}\nPeriode: ${period}\n\nDalam implementasi nyata, data akan difilter dan grafik diperbarui.`);
                
                // Update dashboard cards berdasarkan filter
                document.getElementById('today-count').textContent = '87%';
                document.getElementById('weekly-count').textContent = '85%';
                document.getElementById('monthly-count').textContent = '86%';
                document.getElementById('yearly-count').textContent = '88%';
            });
        }

function applyFilters() {
    const username = document.getElementById('searchUsername').value.toLowerCase();
    const time = document.getElementById('searchTime').value.toLowerCase();
    const status = document.getElementById('statusFilter').value.toLowerCase();
    const date = document.getElementById('dateFilter').value;

    const rows = document.querySelectorAll('#attendanceTable tbody tr');

    rows.forEach(row => {
        const colUsername = row.querySelector('.col-username').innerText.toLowerCase();
        const colIn = row.querySelector('.col-in').innerText.toLowerCase();
        const colOut = row.querySelector('.col-out').innerText.toLowerCase();
        const colStatus = row.querySelector('.col-status').innerText.toLowerCase();
        const colDate = row.querySelector('.col-date').innerText;

        let isVisible = true;

        if (username && !colUsername.includes(username)) isVisible = false;

        if (time && !(colIn.includes(time) || colOut.includes(time))) isVisible = false;

        if (status && !colStatus.includes(status)) isVisible = false;

        if (date && colDate !== date) isVisible = false;

        row.style.display = isVisible ? '' : 'none';
    });

    updatePagination();
}


function clearFilters() {
    document.getElementById('searchUsername').value = '';
    document.getElementById('searchTime').value = '';
    document.getElementById('statusFilter').value = '';
    document.getElementById('dateFilter').value = '';

    const rows = document.querySelectorAll('#attendanceTable tbody tr');
    rows.forEach(row => row.style.display = '');
}
        
        // Setup export button
        function setupExport() {
            document.getElementById('export-data').addEventListener('click', function() {
                // Simulasi ekspor data
                alert('Data berhasil diekspor dalam format CSV.\nFile akan diunduh secara otomatis.');
            });
        }
        
        // Inisialisasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Update waktu setiap detik
            updateDateTime();
            setInterval(updateDateTime, 1000);
            
            // Hitung dan update persentase
            const todayPercentage = calculateTodayPercentage();
            document.getElementById('today-count').textContent = `${todayPercentage}%`;
            
            // Render semua grafik
            renderTodayChart('pie');
            renderDailyChart('line');
            renderWeeklyChart('bar');
            renderYearlyChart('line');
            
            // Render tabel
            renderTableData();
            
            // Setup interaksi
            setupChartToggles();
            setupFilters();
            setupExport();
            updatePagination();

        });

        document.getElementById('btnExportPDF').onclick = () => {
    window.location.href = '/export/laporan/pdf';
};

document.getElementById('btnExportExcel').onclick = () => {
    window.location.href = '/export/laporan/excel';
};

document.getElementById('btnExportWord').onclick = () => {
    showPrint();
    setTimeout(() => {
        window.print();
    }, 300);
};

document.getElementById('btnExportWord').addEventListener('click', function () {
        window.print();
    });

let currentPage = 1;
const rowsPerPage = 5;

function updatePagination() {

    const rows = Array.from(
        document.querySelectorAll("#attendanceTable tbody tr")
    ).filter(row => row.style.display !== "none");

    const pagination = document.getElementById("pagination");
    pagination.innerHTML = "";

    const totalPages = Math.ceil(rows.length / rowsPerPage);

    function showPage(page) {
        currentPage = page;

        rows.forEach(row => row.style.display = "none");

        const start = (page - 1) * rowsPerPage;
        const end = start + rowsPerPage;

        for (let i = start; i < end && i < rows.length; i++) {
            rows[i].style.display = "";
        }

        document.querySelectorAll(".pagination button").forEach(btn => {
            btn.classList.remove("active");
        });

        document.getElementById(`page-${page}`)?.classList.add("active");
    }

    for (let i = 1; i <= totalPages; i++) {
        const button = document.createElement("button");
        button.innerText = i;
        button.id = `page-${i}`;

        button.addEventListener("click", function () {
            showPage(i);
        });

        pagination.appendChild(button);
    }

    if (totalPages > 0) {
        showPage(1);
    }
}

document.addEventListener("DOMContentLoaded", function () {
    updatePagination();
});
        
    </script>

@include ('footer');