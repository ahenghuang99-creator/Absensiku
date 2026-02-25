@include('header')

<style>
    .custom-thead th {
        background-color: #2a5298 !important;
        color: white !important;
        border-color: #2a5298 !important;
    }
</style>

    </style>

<div class="container mt-5 pt-3">

    <!-- Section Title -->
    <div class="d-flex justify-content-between align-items-center mb-3">

        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-clipboard-check fs-4 text-primary"></i>
            <h4 class="mb-0 fw-bold">List Pengajuan Izin</h4>
        </div>

        <a href="/pengajuan_izin" class="btn btn-primary px-4">
            <i class="bi bi-plus-lg"></i> Ajukan Izin
        </a>

    </div>

    <!-- Card Table -->
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table align-middle text-center mb-0">

                    <!-- Table Head -->
<thead class="custom-thead">
    <tr>
        <th style="width:60px;">No</th>
        <th><i class="bi bi-person"></i> Username</th>
        <th><i class="bi bi-calendar-event"></i> Tanggal</th>
        <th>Keterangan</th>
        <th>Status</th>
    </tr>
</thead>

                    <!-- Table Body -->
                    <tbody>
                        @forelse($data as $index => $p)
                        <tr>
                            <td class="fw-semibold">{{ $index + 1 }}</td>
                            <td class="fw-semibold">{{ session('username') }}</td>
                            <td class="fw-semibold">
                                {{ \Carbon\Carbon::parse($p->tanggal)->format('d-m-Y') }}
                            </td>
                            <td class="fw-semibold">{{ $p->keterangan }}</td>
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
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-4 text-muted">
                                Belum ada pengajuan izin.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

@include('footer')
