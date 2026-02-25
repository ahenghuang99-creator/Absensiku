<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Exports\AbsensiExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function exportPDF()
    {
        $data = Absensi::all();

        $pdf = Pdf::loadView('export.pdf', compact('data'))
                  ->setPaper('A4', 'portrait');

        return $pdf->download('laporan-absensi.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(
            new AbsensiExport,
            'laporan-absensi.xlsx'
        );
    }

    public function exportWord()
    {
        $data = Absensi::all();

        $content = view('export.word', compact('data'))->render();

        return Response::make($content, 200, [
            "Content-Type" => "application/msword",
            "Content-Disposition" => "attachment; filename=laporan-absensi.doc"
        ]);
    }
}
