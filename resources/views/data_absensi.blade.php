@include ('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

.dashboard-header {
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    color: white;
    padding: 30px 40px;
    border-radius: 18px;

    max-width: 1250px;      
    margin: 30px auto;     
    
    box-shadow: 0 12px 35px rgba(0,0,0,0.15);
}

.header-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

.logo-section h1 {
    font-size: 28px;
    margin-bottom: 5px;
}

.logo-section p {
    font-size: 14px;
    opacity: 0.9;
}

.user-info {
    display: flex;
    align-items: center;
    background: rgba(255,255,255,0.15);
    padding: 12px 18px;
    border-radius: 12px;
}

.user-avatar {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: white;
    color: #2a5298;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 18px;
    margin-right: 12px;
}

.user-details h3 {
    font-size: 16px;
    margin-bottom: 3px;
}

.user-details .role {
    font-size: 13px;
    opacity: 0.9;
}

.welcome-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
            margin-top: 15px;
            padding-top: 15px;
    border-top: 1px solid rgba(255,255,255,0.2);
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

.current-time .time {
    font-size: 20px;
    font-weight: bold;
}

        
        body {
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .clear-btn {
    padding: 8px 18px;
    background: #6c757d;
    color: white;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s;
}

.clear-btn:hover {
    background: #5a6268;
}

        
        header {
            background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
            color: white;
            padding: 25px 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .logo {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .logo i {
            font-size: 32px;
            margin-right: 15px;
        }

        .filters-section {
    background-color: #f3f4f6;
    padding: 20px 30px;
    border-radius: 16px;
    margin: 30px auto;
    max-width: 1200px;
}

.filters-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    flex-wrap: wrap;
}

.filters-title {
    font-size: 20px;
    font-weight: 600;
    color: #1e3c72;
}

.export-actions {
    display: flex;
    gap: 15px;
}

.btn-export {
    border: none;
    padding: 8px 16px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 6px;
    transition: 0.3s;
}

/* PDF */
.btn-pdf {
    background: #e53935;
    color: white;
}
.btn-pdf:hover {
    background: #c62828;
}

/* Excel */
.btn-excel {
    background: #43a047;
    color: white;
}
.btn-excel:hover {
    background: #2e7d32;
}

/* Print */
.btn-print {
    background: #1e88e5;
    color: white;
}
.btn-print:hover {
    background: #1565c0;
}

.filters-controls {
    display: flex;
    align-items: center;
    gap: 15px;
}

.filter-label {
    font-size: 14px;
}

.filter-select {
    padding: 7px 12px;
    border-radius: 6px;
    border: 1px solid #ccc;
}

.apply-btn {
    padding: 8px 18px;
    background: #2a5298;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 600;
}

.print-header {
    display: none !important;
}
    .print-header img {
        width: 70px;
        height: auto;
    }



@media print {
    @page {
        size: A4 portrait;
        margin: 15mm;
    }

    body {
        background: white !important;
    }

    /* Sembunyikan semua elemen yang tidak diperlukan */
    .filters-section,
    .pagination,
    footer,
    .no-print,
    .export-actions,
    .apply-btn,
    .filter-group,
    .user-info,
    .welcome-section,
    .dashboard-header,
    .content-header,
    .page-title {
        display: none !important;
    }

    /* ===== PRINT HEADER: LOGO DI KIRI ATAS, TANPA GARIS ===== */
    .print-header {
        display: flex !important;
        align-items: flex-start !important;
        justify-content: flex-start !important;
        gap: 15px;
        margin-top: 0;
        margin-bottom: 25px;   /* jarak logo ke garis biru */
        padding: 0;
        border-bottom: none !important;  /* paksa hilangkan garis */
         flex-direction: column;      /* ubah jadi kolom agar logo di atas, judul di bawah */
        text-align: left !important;    /* rata kiri */
    }

    .print-header h2,
    .print-header img {
        margin-left: 0;
        text-align: left;
    }
    .print-header img {
        width: 70px;
        height: auto;
    }

    /* ===== GARIS BIRU DI ATAS TABEL ===== */
    .attendance-table {
        border-top: 2px solid #1e3c72 !important;
        padding-top: 20px;      /* jarak antara garis dan konten tabel */
        margin-top: 0;
        box-shadow: none;
        border-radius: 0;
    }

    /* ===== TABEL ===== */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        display: table-header-group;
        background: #2a5298 !important;
        color: white !important;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }

    .status {
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
}
.apply-btn:hover {
    background: #1e3c72;
}

        
        .logo h1 {
            font-size: 28px;
            font-weight: 700;
        }
        
        .subtitle {
            font-size: 16px;
            opacity: 0.9;
            margin-bottom: 15px;
        }
                        
        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 30px 0 25px 0;
        }
                
        .page-title {
            font-size: 24px;
            color: #2c3e50;
            font-weight: 700;
        }
        
        .page-title i {
            margin-right: 10px;
            color: #3498db;
        }
        
        .controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 15px;
        }
        
.filters-section {
    background: #f3f4f6;
    padding: 20px 30px;
    border-radius: 16px;
    margin: 30px auto;
    max-width: 1200px;
}

.filters-title {
    font-size: 20px;
    font-weight: 600;
    color: #1e3c72;
    margin-bottom: 15px;
}

.filters-row {
    display: flex;
    align-items: center;
    width: 100%;
}
/* LEFT SIDE */
.export-actions {
    display: flex;
    gap: 12px;
}

.filter-right {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
    margin-left: auto;   /* <<< INI YANG MEMINDAHKAN KE KANAN */
}
.filter-input {
    padding: 8px 14px;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 14px;
    min-width: 180px;
}

.filter-input:focus {
    outline: none;
    border-color: #2a5298;
}

.apply-btn {
    padding: 8px 18px;
    background: #2a5298;
    color: white;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
}

.apply-btn:hover {
    background: #1e3c72;
}
        
        .filter-box {
            background-color: white;
            padding: 10px 15px;
            border-radius: 8px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
        }
        
        .filter-box label {
            margin-right: 8px;
            font-weight: 600;
            color: #555;
        }
        
        .filter-box select, .filter-box input {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            min-width: 150px;
        }
        
        .action-buttons {
            display: flex;
            gap: 10px;
        }
        
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }
        
        .btn i {
            margin-right: 8px;
        }
        
        .btn-export {
            background-color: #27ae60;
            color: white;
        }
        
        .btn-print {
            background-color: #8e44ad;
            color: white;
        }
        
        .btn-refresh {
            background-color: #3498db;
            color: white;
        }
        
        .btn:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
        
        .attendance-table {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 40px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        thead {
            background: linear-gradient(to right, #3498db, #2c3e50);
            color: white;
        }
        
        th {
            padding: 18px 15px;
            text-align: left;
            font-weight: 600;
            font-size: 16px;
        }
        
        th i {
            margin-right: 8px;
        }
        
        tbody tr {
            border-bottom: 1px solid #f1f1f1;
            transition: background-color 0.2s ease;
        }
        
        tbody tr:hover {
            background-color: #f9f9f9;
        }
        
        td {
            padding: 16px 15px;
            color: #555;
        }
        
        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            text-align: center;
            min-width: 90px;
        }
        
        .status-hadir {
            background-color: #d5f4e6;
            color: #27ae60;
        }
        
        .status-terlambat {
            background-color: #fdebd0;
            color: #e67e22;
        }
        
        .status-izin {
            background-color: #e8f4fc;
            color: #3498db;
        }
        
        .status-alpha {
            background-color: #fadbd8;
            color: #e74c3c;
        }
        
.pagination {
    display: flex;
    justify-content: center;
    margin: 30px 0;
    gap: 10px;
}

.pagination button {
    background: white;
    border: 1px solid #ddd;
    padding: 8px 14px;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 600;
    transition: 0.2s;
}

.pagination button:hover {
    background: #f1f5f9;
}

.pagination button.active {
    background: #3498db;
    color: white;
    border-color: #3498db;
}
        
        footer {
            text-align: center;
            padding: 20px 0;
            color: #7f8c8d;
            font-size: 14px;
            border-top: 1px solid #eee;
            margin-top: 20px;
        }
        
        @media (max-width: 768px) {
            .controls {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .action-buttons {
                align-self: stretch;
                justify-content: space-between;
            }
            
            .btn {
                flex: 1;
                justify-content: center;
            }
            
            table {
                display: block;
                overflow-x: auto;
            }
            
            .content-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
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

    }
    </style>
</head>
<body>
    <div class="header">
<div class="dashboard-header">
    <div class="header-top">
        <div class="logo-section">
            <h1>AbsensiKu</h1>
            <p>Sistem Manajemen Kehadiran</p>
        </div>

        <div class="user-info">
            <div class="user-avatar">
                {{ strtoupper(substr(session('username'),0,1)) }}
            </div>
            <div class="user-details">
                <h3>{{ session('username') }}</h3>
                <span class="role">
                    @if(session('level') == 1)
                        Karyawan
                    @elseif(session('level') == 2)
                        Admin
                    @elseif(session('level') == 3)
                        Super Admin
                    @elseif(session('level') == 4)
                        Manajer
                    @endif
                </span>
            </div>
        </div>
    </div>

    <div class="welcome-section">
        <div class="welcome-text">
            <h2>Selamat Datang, {{ session('username') }}!</h2>
            <p>
                Anda login sebagai 
                <strong>
                    @if(session('level') == 1)
                        Karyawan
                    @elseif(session('level') == 2)
                        Admin
                    @elseif(session('level') == 3)
                        Super Admin
                    @elseif(session('level') == 4)
                        Manajer
                    @endif
                </strong>.
                Akses penuh untuk mengelola sistem absensi perusahaan.
            </p>
        </div>

        <div class="current-time">
            <div class="date" id="current-date"></div>
            <div class="time" id="current-time"></div>
        </div>
    </div>
</div>
    
    <main class="container print-area">
        <div class="content-header">
            <div class="page-title">
                <i class="fas fa-table"></i>
                Data Absensi Karyawan
            </div>
        </div>
        
<div class="filters-section">

    <h3 class="filters-title">Filter Laporan</h3>

<div class="filters-row">

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

    <!-- RIGHT : FILTER FORM -->
    <form method="GET" action="{{ url('/data_absensi') }}">
        <div class="filter-right">

            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   class="filter-input"
                   placeholder="Cari username...">

            <select name="status" class="filter-input">
                <option value="">Semua Status</option>
                <option value="hadir" {{ request('status')=='hadir'?'selected':'' }}>Hadir</option>
                <option value="terlambat" {{ request('status')=='terlambat'?'selected':'' }}>Terlambat</option>
                <option value="izin" {{ request('status')=='izin'?'selected':'' }}>Izin</option>
                <option value="alpha" {{ request('status')=='alpha'?'selected':'' }}>Alpha</option>
            </select>

            <input type="date"
                   name="tanggal"
                   value="{{ request('tanggal') }}"
                   class="filter-input">

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i> Cari
            </button>

            <a href="{{ url('/data_absensi') }}" class="clear-btn">
                Clear
            </a>

        </div>
    </form>

</div>
</div>
    
        <div class="print-area">
            <div class="print-header" style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #1e3c72;">
        <img src="{{ asset('images/logo.png') }}" alt="Logo AbsensiKu" style="width: 70px; height: auto;">
        <h2 style="margin: 0; font-size: 24px; color: #2c3e50; font-weight: 700; font-family: 'Segoe UI', sans-serif;">Data Absensi Karyawan</h2>
    </div>
            <div class="attendance-table">
                <table>
                    <thead>
                        <tr>
                            <th><i class="fas fa-hashtag"></i> No</th>
                            <th><i class="fas fa-user"></i> Username</th>
                            <th><i class="fas fa-calendar-day"></i> Tanggal</th>
                            <th><i class="fas fa-sign-in-alt"></i> Waktu Absensi</th>
                            <th><i class="fas fa-info-circle"></i> Status Absensi</th>
                        </tr>
                    </thead>
<tbody>
    @forelse($data as $index => $row)
        <tr>
            <td>{{ $data->firstItem() + $index }}</td>
            <td><strong>{{ $row->username }}</strong></td>
            <td>{{ $row->tanggal }}</td>
            <td>{{ $row->waktu_absensi }}</td>
            <td>
                <span class="status status-{{ $row->status_absensi }}">
                    {{ strtoupper($row->status_absensi) }}
                </span>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" style="text-align:center;">
                Tidak ada data absensi
            </td>
        </tr>
    @endforelse
</tbody>
                </table>
            </div>
        </div>
        
<div class="mt-3">
    {{ $data->withQueryString()->links() }}
</div>
    </main>
    
    <footer class="container">
        <p>© 2026 AbsensiKu - Sistem Manajemen Kehadiran. Hak Cipta Dilindungi.</p>
    </footer>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // 🔥 Update tanggal & jam realtime
    function updateDateTime() {
        const now = new Date();
        const optionsDate = { day: 'numeric', month: 'long', year: 'numeric' };

        const dateEl = document.getElementById('current-date');
        const timeEl = document.getElementById('current-time');

        if (dateEl) {
            dateEl.textContent = now.toLocaleDateString('id-ID', optionsDate);
        }

        if (timeEl) {
            timeEl.textContent = now.toLocaleTimeString('id-ID');
        }
    }

    updateDateTime();
    setInterval(updateDateTime, 1000);

    // 📄 Export Buttons
    const pdfBtn = document.getElementById('btnExportPDF');
    const excelBtn = document.getElementById('btnExportExcel');
    const wordBtn = document.getElementById('btnExportWord');

    if (pdfBtn) {
        pdfBtn.addEventListener('click', () => {
            window.location.href = '/export/laporan/pdf';
        });
    }

    if (excelBtn) {
        excelBtn.addEventListener('click', () => {
            window.location.href = '/export/laporan/excel';
        });
    }

    if (wordBtn) {
        wordBtn.addEventListener('click', () => {
            window.print();
        });
    }

});
</script>
@include ('footer')