@include('header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            color: #333;
            padding-bottom: 20px;
        }
        
        
        
    
        .user-info {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #4a6fc1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: bold;
            margin-right: 10px;
        }
        
        .user-details h3 {
            font-size: 16px;
            margin-bottom: 2px;
        }
        
        .user-details .role {
            font-size: 12px;
            opacity: 0.9;
            background-color: rgba(255, 255, 255, 0.15);
            padding: 2px 8px;
            border-radius: 20px;
            display: inline-block;
        }
        
        .logout-btn a {
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 6px;
            transition: all 0.3s;
        }
        
        .logout-btn a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #ffcc00;
        }
        
        .logout-btn i {
            margin-right: 8px;
        }
        
        /* Main Content */
        .main-content {
            padding: 30px;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .header h2 {
            font-size: 28px;
            color: #1e3c72;
        }
        
        .date-time {
            text-align: right;
            color: #555;
        }
        
        .date-time .date {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .date-time .time {
            font-size: 24px;
            font-weight: 700;
            color: #2a5298;
        }
        
        /* Attendance History */
        .attendance-container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 25px;
            margin-bottom: 30px;
        }
        
        .section-title {
            font-size: 20px;
            color: #1e3c72;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f4f8;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .filter-options {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .filter-btn {
            padding: 8px 20px;
            background-color: #f0f4f8;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .filter-btn.active {
            background-color: #2a5298;
            color: white;
        }
        
        .filter-btn:hover:not(.active) {
            background-color: #e1e8f0;
        }
        
        /* Table */
        .attendance-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        
        .attendance-table th {
            background-color: #f8fafc;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: #1e3c72;
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
        
        /* Summary Cards */
        .summary-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .summary-card {
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
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
        
        .icon-hadir {
            background-color: #2ecc71;
        }
        
        .icon-terlambat {
            background-color: #f39c12;
        }
        
        .icon-izin {
            background-color: #3498db;
        }
        
        .icon-cuti {
            background-color: #8e44ad;
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
        
        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 25px;
            gap: 10px;
        }
        
        .pagination-btn {
            padding: 8px 15px;
            background-color: #f0f4f8;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .pagination-btn.active {
            background-color: #2a5298;
            color: white;
        }
        
        .pagination-btn:hover:not(.active) {
            background-color: #e1e8f0;
        }
        
        /* Footer */
        .footer {
            text-align: center;
            padding: 20px;
            color: #777;
            font-size: 14px;
            border-top: 1px solid #eee;
            margin-top: 30px;
        }
                    
            .user-info {
                margin-right: 0;
            }
        
        
        @media (max-width: 768px) {
            .main-content {
                padding: 20px;
            }
            
            .header {
                flex-direction: column;
                align-items: flex-start;
                margin-bottom: 20px;
            }
            
            .date-time {
                margin-top: 10px;
                text-align: left;
            }
            
            .filter-options {
                flex-wrap: wrap;
            }
            
            .attendance-table {
                display: block;
                overflow-x: auto;
            }
            
            .summary-cards {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .section-title {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .filter-options {
                margin-top: 15px;
            }
        }
        
        @media (max-width: 576px) {
            
            .summary-cards {
                grid-template-columns: 1fr;
            }
                        
            .user-details h3 {
                font-size: 14px;
            }
            
            .logo h1 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    
    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h2>Riwayat Absensi</h2>
            <div class="date-time">
                <div class="date" id="current-date">10 Februari 2026</div>
                <div class="time" id="current-time">09:20:18</div>
            </div>
        </div>
        
        <!-- Summary Cards -->
        <div class="summary-cards">
            <div class="summary-card">
                <div class="card-icon icon-hadir">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="card-info">
                    <h3>{{ $hadir }}</h3>
                    <p>Hadir</p>
                </div>
            </div>
            
            <div class="summary-card">
                <div class="card-icon icon-terlambat">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="card-info">
                    <h3>{{ $terlambat }}</h3>
                    <p>Terlambat</p>
                </div>
            </div>
            
            <div class="summary-card">
                <div class="card-icon icon-izin">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="card-info">
                    <h3>{{ $izin }}</h3>
                    <p>Izin</p>
                </div>
            </div>
            
            <div class="summary-card">
                <div class="card-icon icon-cuti">
                    <i class="fas fa-umbrella-beach"></i>
                </div>
                <div class="card-info">
                    <h3>{{ $alpha }}</h3>
                    <p>Alpha</p>
                </div>
            </div>
        </div>
        
        <!-- Attendance History -->
        <div class="attendance-container">
            <div class="section-title">
                <span>Riwayat Kehadiran Bulan Februari 2026</span>
                <div class="filter-options">
                    <button class="filter-btn active" data-filter="all">Semua</button>
                    <button class="filter-btn" data-filter="hadir">Hadir</button>
                    <button class="filter-btn" data-filter="terlambat">Terlambat</button>
                    <button class="filter-btn" data-filter="izin">Izin</button>
                    <button class="filter-btn" data-filter="alpha">Alpha</button>
                </div>
            </div>
            
            <table class="attendance-table">
    <thead>
        <tr>
            <th>Username</th>
            <th>Tanggal</th>
            <th>waktu absensi</th>
            <th>Status</th>
            <th>Keterangan</th>
        </tr>
    </thead>
<tbody>
@forelse($absensi as $a)
<tr class="row-data" data-status="{{ strtolower($a->status_absensi) }}">
    <td>{{ $a->username }}</td>
    <td>{{ \Carbon\Carbon::parse($a->tanggal)->format('d-m-Y') }}</td>
    <td>{{ $a->waktu_absensi ?? '-' }}</td>
    <td style="color: {{ $a->status_absensi == 'alpha' ? 'red' : ($a->status_absensi == 'hadir' ? 'green' : 'blue') }}">
        {{ ucfirst($a->status_absensi) }}
    </td>
    <td>{{ $a->keterangan ?? '-' }}</td>
</tr>
@empty
<tr>
    <td colspan="6" style="text-align:center;">Tidak ada data absensi</td>
</tr>
@endforelse
</tbody>
</table>

            
            <div class="pagination">
                <button class="pagination-btn active">1</button>
                <button class="pagination-btn">2</button>
                <button class="pagination-btn">3</button>
                <button class="pagination-btn">4</button>
                <button class="pagination-btn">5</button>
            </div>
        </div>
        
        <div class="footer">
            <p>&copy; 2026 AbsensiKu - Sistem Manajemen Kehadiran. Hak Cipta Dilindungi.</p>
        </div>
    </div>

    <script>
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
        
        // Format tanggal untuk ditampilkan
        function formatDateDisplay(dateString) {
            const date = new Date(dateString);
            const day = String(date.getDate()).padStart(2, '0');
            const month = date.toLocaleString('id-ID', { month: 'short' });
            const year = date.getFullYear();
            return `${day} ${month} ${year}`;
        }
        
        // Format status untuk ditampilkan dengan kapitalisasi pertama
        function formatStatus(status) {
            return status.charAt(0).toUpperCase() + status.slice(1);
        }
        
        // Tampilkan data absensi ke tabel
        function renderAttendanceData(filter = 'all') {
            const tbody = document.getElementById('attendance-data');
            tbody.innerHTML = '';
            
            // Filter data berdasarkan status
            const filteredData = filter === 'all' 
                ? attendanceData 
                : attendanceData.filter(item => item.status === filter);
            
            // Urutkan data berdasarkan tanggal (terbaru pertama)
            filteredData.sort((a, b) => new Date(b.date) - new Date(a.date));
            
            // Tambahkan setiap baris data ke tabel
            filteredData.forEach(item => {
                const row = document.createElement('tr');
                
                row.innerHTML = `
                    <td>${formatDateDisplay(item.date)}</td>
                    <td>${item.checkIn}</td>
                    <td>${item.checkOut}</td>
                    <td><span class="status ${item.status}">${formatStatus(item.status)}</span></td>
                    <td>${item.note}</td>
                `;
                
                tbody.appendChild(row);
            });
            
            // Jika tidak ada data yang cocok dengan filter
            if (filteredData.length === 0) {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td colspan="5" style="text-align: center; padding: 30px;">
                        Tidak ada data absensi untuk status "${filter}" pada bulan ini.
                    </td>
                `;
                tbody.appendChild(row);
            }
        }
        
        // Inisialisasi filter
        function initFilters() {
            const filterBtns = document.querySelectorAll('.filter-btn');
            
            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    // Hapus kelas active dari semua tombol filter
                    filterBtns.forEach(b => b.classList.remove('active'));
                    
                    // Tambahkan kelas active ke tombol yang diklik
                    this.classList.add('active');
                    
                    // Render data dengan filter yang dipilih
                    const filter = this.getAttribute('data-filter');
                    renderAttendanceData(filter);
                });
            });
        }
        
        // Inisialisasi pagination
        function initPagination() {
            const paginationBtns = document.querySelectorAll('.pagination-btn');
            
            paginationBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    // Hapus kelas active dari semua tombol pagination
                    paginationBtns.forEach(b => b.classList.remove('active'));
                    
                    // Tambahkan kelas active ke tombol yang diklik
                    this.classList.add('active');
                    
                    // Di sini biasanya akan memuat data halaman yang sesuai
                    // Untuk contoh ini, kita hanya menunjukkan perubahan visual
                });
            });
        }
        
        // Inisialisasi saat halaman dimuat
document.addEventListener("DOMContentLoaded", function() {

    const filterButtons = document.querySelectorAll(".filter-btn");
    const rows = document.querySelectorAll(".row-data");

    filterButtons.forEach(button => {
        button.addEventListener("click", function() {

            // hapus active dari semua tombol
            filterButtons.forEach(btn => btn.classList.remove("active"));
            this.classList.add("active");

            const filterValue = this.getAttribute("data-filter");

            rows.forEach(row => {
                const status = row.getAttribute("data-status");

                if (filterValue === "all" || status === filterValue) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });

        });
    });

});
</script>
@include ('footer');