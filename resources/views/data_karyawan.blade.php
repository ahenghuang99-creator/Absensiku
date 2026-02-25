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

.attendance-table td:last-child {
    display: flex;
    gap: 10px;          /* jarak antar tombol */
    align-items: center;
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

        .color-white {
            color: white !important;
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
        
        .filter-section {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
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
            table-layout: fixed;
        }
        
        .attendance-table table {
    border-collapse: collapse;
}

    .attendance-table thead {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    }

        
        .attendance-table thead tr {
    background: inherit;
}

.attendance-table thead th {
    background: transparent;
    color: white;
}

        th {
            padding: 18px 15px;
            text-align: left;
            font-weight: 600;
            font-size: 16px;
            overflow-wrap: break-word;
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
<div class="content-header" style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:15px;">

    <!-- KIRI -->
    <div style="display:flex; align-items:center; gap:15px;">
        <div class="page-title">
            <i class="fas fa-table"></i> Data Karyawan
        </div>

        <a href="{{ url('/tambah_karyawan') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>

    <!-- KANAN -->
    <form action="{{ url('/data_karyawan') }}" method="GET" style="display:flex; align-items:center; gap:10px;">
        <span style="font-weight:600;">Username :</span>

        <input type="text"
               name="search"
               value="{{ request('search') }}"
               placeholder="Cari username..."
               style="padding:8px 12px; border-radius:6px; border:1px solid #ccc;">

        <button type="submit" class="apply-btn">
            <i class="fas fa-search"></i> Cari
        </button>
    </form>

</div>
    
    
    <!-- PRINT AREA (LOGO + JUDUL + TABEL) -->
    <div class="print-area">
        <div class="print-header" style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #1e3c72;">
            <img src="{{ asset('images/logo.png') }}" alt="Logo AbsensiKu" style="width: 70px; height: auto;">
            <h2 style="margin: 0; font-size: 24px; color: #2c3e50; font-weight: 700;">Data Karyawan</h2>
        </div>
        
<div class="attendance-table">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th><i class="fas fa-user"></i> Username</th>
                <th><i class="fas fa-lock"></i> Password</th>
                <th><i class="fas fa-envelope"></i> Email</th>
                <th>
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($karyawans as $index => $karyawan)
                <tr>
                    <td>{{ $karyawans->firstItem() + $index }}</td>
                    <td><strong>{{ $karyawan->username ?? '-' }}</strong></td>
                    <td>******</td>
                    <td>{{ $karyawan->email ?? '-' }}</td>
                    <td>
                        <a href="/edit_karyawan/<?= $karyawan->id_karyawan ?>" class="btn btn-warning color-white">
                            <i class="fas fa-edit color-white"></i> Edit
                        </a>
                        <a href="/hapus_karyawan/<?= $karyawan->id_karyawan ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data karyawan ini?');">
                    <i class="fas fa-trash"></i> Delete
                </a>
            </td>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center; padding: 20px 10px;">
                        <i class="fas fa-database"></i> Belum ada data karyawan.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="pagination">
        {{ $karyawans->links() }}
    </div>
</div>
    
</main>    <footer class="container">
        <p>© 2026 AbsensiKu - Sistem Manajemen Kehadiran. Hak Cipta Dilindungi.</p>
    </footer>

    <script>
    // Fungsi update waktu real-time
    function updateDateTime() {
        const now = new Date();
        const optionsDate = { day: 'numeric', month: 'long', year: 'numeric' };
        document.getElementById('current-date').textContent = now.toLocaleDateString('id-ID', optionsDate);
        document.getElementById('current-time').textContent = now.toLocaleTimeString('id-ID');
    }

    // Inisialisasi
    document.addEventListener('DOMContentLoaded', function() {
        updateDateTime();
        setInterval(updateDateTime, 1000);
    });    document.addEventListener('DOMContentLoaded', function () {
        updateDateTime();
        setInterval(updateDateTime, 1000);
    });
const rowsPerPage = 10;
let currentPage = 1;

function renderAttendanceData(data) {
    const tableBody = document.getElementById('attendanceData');
    tableBody.innerHTML = '';

    data.forEach((item, index) => {
        let statusClass = '';
        switch(item.status) {
            case 'hadir': statusClass = 'status-hadir'; break;
            case 'terlambat': statusClass = 'status-terlambat'; break;
            case 'izin': statusClass = 'status-izin'; break;
            case 'alpha': statusClass = 'status-alpha'; break;
        }

        const row = `
            <tr>
                <td>${(currentPage - 1) * rowsPerPage + index + 1}</td>
                <td><strong>${item.username}</strong></td>
                <td>${item.tanggal}</td>
                <td>${item.jamMasuk}</td>
                <td>${item.jamPulang}</td>
                <td><span class="status ${statusClass}">${item.status.toUpperCase()}</span></td>
            </tr>
        `;

        tableBody.innerHTML += row;
    });
}

function renderPagination() {
    const pagination = document.getElementById("pagination");
    pagination.innerHTML = "";

    const totalPages = Math.ceil(attendanceData.length / rowsPerPage);

    for (let i = 1; i <= totalPages; i++) {
        const button = document.createElement("button");
        button.innerText = i;

        if (i === currentPage) {
            button.classList.add("active");
        }

        button.addEventListener("click", () => {
            currentPage = i;
            renderTable();
        });

        pagination.appendChild(button);
    }
}

function renderTable() {
    const start = (currentPage - 1) * rowsPerPage;
    const end = start + rowsPerPage;
    const pageData = attendanceData.slice(start, end);

    renderAttendanceData(pageData);
    renderPagination();
}

function updateDateTime() {
    const now = new Date();
    const optionsDate = { day: 'numeric', month: 'long', year: 'numeric' };

    document.getElementById('current-date').textContent =
        now.toLocaleDateString('id-ID', optionsDate);

    document.getElementById('current-time').textContent =
        now.toLocaleTimeString('id-ID');
};

    </script>

@include ('footer')