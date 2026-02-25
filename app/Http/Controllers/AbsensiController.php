<?php

namespace App\Http\Controllers;
use App\Models\Absensi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use Carbon\Carbon;

class AbsensiController extends Controller
{
    public function dashboard()
    {
        return response()->json([
            'hari_ini' => [],
            'harian' => [],
            'mingguan' => []
        ]);
    }
}
