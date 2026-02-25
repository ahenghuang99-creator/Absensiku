<?php

namespace App\Exports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AbsensiExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Absensi::select(
            'username',
            'tanggal',
            'waktu_absensi',
            'status_absensi'
        )->get();
    }

    public function headings(): array
    {
        return [
            'username',
            'Tanggal',
            'Waktu Absensi',
            'Status Absensi'
        ];
    }
}
