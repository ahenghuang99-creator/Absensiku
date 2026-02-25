@include('header')

<style>
    .custom-thead th {
        background-color: #2a5298 !important;
        color: white !important;
        border-color: #2a5298 !important;
    }

    .table tbody tr:hover {
        background-color: #f5f7fb;
        transition: 0.2s;
    }

    .card {
        border-radius: 18px;
    }
</style>

<main class="container mt-5 pt-3">

    <!-- Header Section -->
<div class="d-flex justify-content-between align-items-center mb-4">

    <!-- Judul -->
    <div class="d-flex align-items-center gap-2">
        <i class="bi bi-clipboard-check fs-4 text-primary"></i>
        <h4 class="mb-0 fw-bold">Data Pengajuan Izin</h4>
    </div>

    <!-- Search -->
<form id="searchForm" 
      action="{{ url('/data_pengajuan_izin') }}" 
      method="GET" 
      class="d-flex align-items-center gap-2">

    <input type="text"
           id="searchInput"
           name="username"
           class="form-control"
           placeholder="Cari username..."
           value="{{ request('username') }}"
           style="width:260px; height:38px;">

    <button type="submit" 
            class="btn btn-primary px-4"
            style="height:38px;">
        <i class="bi bi-search"></i> Cari
    </button>

    <button type="button"
            class="btn btn-secondary px-3"
            style="height:38px;"
            onclick="clearSearch()">
        Clear
    </button>

</form>

<script>
function clearSearch() {
    document.getElementById('searchInput').value = '';
    window.location.href = "{{ url('/data_pengajuan_izin') }}";
}
</script>

</div>

    <!-- Card Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table align-middle text-center mb-0">

                    <!-- THEAD -->
                    <thead class="custom-thead">
                        <tr>
                            <th style="width:60px;">No</th>
                            <th><i class="bi bi-person"></i> Username</th>
                            <th><i class="bi bi-calendar-event"></i> Tanggal</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th style="width:150px;">Aksi</th>
                        </tr>
                    </thead>

                    <!-- TBODY -->
                    <tbody>
                        @forelse($pengajuans as $index => $p)
                        <tr>
                            <td>{{ $pengajuans->firstItem() + $index }}</td>

                            <td class="fw-semibold">
                                {{ $p->username }}
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($p->tanggal)->format('d-m-Y') }}
                            </td>

                            <td>{{ $p->keterangan }}</td>

                            <td>
                                @if($p->status == 'menunggu')
                                    <span class="badge bg-warning text-dark px-3 py-2">
                                        Diproses
                                    </span>
                                @elseif($p->status == 'disetujui')
                                    <span class="badge bg-success px-3 py-2">
                                        Disetujui
                                    </span>
                                @else
                                    <span class="badge bg-danger px-3 py-2">
                                        Ditolak
                                    </span>
                                @endif
                            </td>

                            <td>
                                @if($p->status == 'menunggu')
                                    <a href="/setujui_izin/{{ $p->id }}"
                                       class="btn btn-success btn-sm"
                                       onclick="return confirm('Setujui pengajuan ini?')">
                                        <i class="bi bi-check-lg"></i>
                                    </a>

                                    <a href="/tolak_izin/{{ $p->id }}"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Tolak pengajuan ini?')">
                                        <i class="bi bi-x-lg"></i>
                                    </a>
                                @else
                                    <span class="text-muted">Selesai</span>
                                @endif
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="py-4 text-muted">
                                Belum ada pengajuan izin.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</main>

@include('footer')
