<?php

namespace App\Http\Controllers;
use App\Models\Absensi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class control extends Controller
{
        public function logout(Request $request){
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login');
        } 



    public function Login(){
        return view('login');
        }
    


public function aksi_login(Request $request)
{
    // ========================
    // VALIDASI CAPTCHA
    // ========================
    if ($request->math_answer != $request->math_result) {
        return back()->with('error', 'Captcha salah');
    }

    // ========================
    // CARI USER BERDASARKAN USERNAME SAJA
    // ========================
    $user = DB::table('user')
        ->where('username', $request->input('u'))
        ->first();

    // ========================
    // CEK USER & PASSWORD HASH
    // ========================
    if ($user && Hash::check($request->input('p'), $user->password)) {

        // Simpan session TANPA password
        $request->session()->put('id_user', $user->id_user);
        $request->session()->put('username', $user->username);
        $request->session()->put('level', $user->level);

        // Ambil data karyawan kalau ada
        $karyawan = DB::table('karyawan')
            ->where('id_user', $user->id_user)
            ->first();

        if ($karyawan) {
            $request->session()->put('id_karyawan', $karyawan->id_karyawan);
        }

        return redirect('/home');
    }

    return back()->with('error', 'Username atau password salah');
}
    
    public function Sign_in(){
        return view('sign_in');
    }

public function aksi_sign(Request $request)
{
    try {
        // Validasi captcha
        if ($request->math_answer != $request->math_result) {
            return back()->with('error', 'Captcha salah');
        }

        // Cek email
        $cek = DB::table('user')->where('email', $request->input('e'))->first();
        if ($cek) {
            return back()->with('error', 'Email sudah terdaftar, silakan login.');
        }

        // Data untuk tabel user
        $userData = [
            'username' => $request->input('u'),
            'email' => $request->input('e'),
            'password' => Hash::make($request->input('p')),
            'level' => '1'
        ];

        // Insert ke tabel user dan ambil ID
        $userId = DB::table('user')->insertGetId($userData);

        if (!$userId) {
            return back()->with('error', 'Gagal membuat akun di tabel user');
        }

        // Insert ke tabel karyawan
        $karyawanInsert = DB::table('karyawan')->insert([
            'id_user' => $userId,
            'username' => $request->input('u'),
            'email' => $request->input('e'),
            'password' => Hash::make($request->input('p')),
        ]);

        if (!$karyawanInsert) {
            return back()->with('error', 'Gagal membuat karyawan');
        }

        // Set session
        $request->session()->put('id_user', $userId);
        $request->session()->put('username', $request->input('u'));
        $request->session()->put('email', $request->input('e'));
        $request->session()->put('level', '1');

        return redirect('/home');
    } catch (\Exception $e) {
        return back()->with('error', 'Error: ' . $e->getMessage());
    }
}
        
    
        public function Home(){

        $jam = date('H:i:s');
        $tanggal = date('Y-m-d');

        $absenHariIni = DB::table('absensi')
            ->where('id_user', session('id_user'))
            ->where('tanggal', $tanggal)
            ->first();

            if (session('id_user')>0){
                return view('home', compact('absenHariIni', 'jam'));
            } else {
                return redirect('/login');
            }
        }

public function Riwayat_absensi()
{
    if (!session()->has('id_user')) {
        return redirect('/login');
    }

    $id_user = session('id_user');

    // =========================
    // Ambil data absensi user
    // =========================
    $absensi = DB::table('absensi')
        ->where('id_user', $id_user)
        ->orderBy('tanggal', 'desc')
        ->get();

    // =========================
    // Hitung jumlah per status
    // =========================
    $hadir = $absensi->where('status_absensi', 'hadir')->count();
    $terlambat = $absensi->where('status_absensi', 'terlambat')->count();
    $izin = $absensi->where('status_absensi', 'izin')->count();
    $alpha = $absensi->where('status_absensi', 'alpha')->count();

    return view('riwayat_absensi', [
        'absensi' => $absensi,
        'hadir' => $hadir,
        'terlambat' => $terlambat,
        'izin' => $izin,
        'alpha' => $alpha
    ]);
}
        public function Laporan_absensi()
        {
            if (!session()->has('id_user')) {
                return redirect('/login');
            }

            $this->checkPermission('laporan_absensi');

            return view('laporan_absensi');
        }

public function Data_absensi(Request $request)
{
    if (!session()->has('id_user')) {
        return redirect('/login');
    }

    $query = DB::table('absensi');

    // 🔎 Search username
    if ($request->search) {
        $query->where('username', 'like', '%' . $request->search . '%');
    }

    // 📅 Filter tanggal
    if ($request->tanggal) {
        $query->whereDate('tanggal', $request->tanggal);
    }

    // 📌 Filter status
    if ($request->status) {
        $query->where('status_absensi', $request->status);
    }

    $data = $query->orderBy('tanggal', 'desc')
                       ->paginate(10)
                       ->withQueryString();

    return view('data_absensi', compact('data'));
}
        public function dashboard()
{
    $today = Carbon::today();
    $now   = Carbon::now();

    /* =====================
       ABSENSI HARI INI (PIE)
    ===================== */
    $hariIni = DB::table('absensi')
        ->select(
            'status_absensi',
            DB::raw('COUNT(*) as total')
        )
        ->whereDate('tanggal', $today)
        ->groupBy('status_absensi')
        ->get();

    /* =====================
       ABSENSI HARIAN (BULAN BERJALAN)
    ===================== */
    $harian = DB::table('absensi')
        ->select(
            DB::raw('DAY(tanggal) as hari'),
            DB::raw("SUM(status_absensi = 'hadir') as hadir"),
            DB::raw("SUM(status_absensi = 'terlambat') as terlambat")
        )
        ->whereMonth('tanggal', $now->month)
        ->whereYear('tanggal', $now->year)
        ->groupBy('hari')
        ->orderBy('hari')
        ->get();

    /* =====================
       ABSENSI MINGGUAN (REAL TIME)
    ===================== */
    $mingguan = DB::table('absensi')
        ->select(
            DB::raw('WEEK(tanggal, 1) as minggu'),
            DB::raw("SUM(status_absensi = 'hadir') as hadir")
        )
        ->whereMonth('tanggal', $now->month)
        ->whereYear('tanggal', $now->year)
        ->groupBy('minggu')
        ->orderBy('minggu')
        ->get();

    return response()->json([
        'hari_ini' => $hariIni,
        'harian'   => $harian,
        'mingguan' => $mingguan
    ]);
}

public function data_karyawan(Request $request)
{
    $search = $request->search;

    $query = DB::table('karyawan');

    if ($search) {
        $query->where('username', 'like', $search . '%');

    }

    $karyawans = $query->paginate(5)->withQueryString();

    return view('data_karyawan', compact('karyawans'));
}

public function Tambah_karyawan(){
    return view('tambah_karyawan');
    }

public function aksi_akaryawan(Request $request)
{
    // Insert ke users dulu
    $id_user = DB::table('user')->insertGetId([
        'username'     => $request->username,
        'password' => Hash::make($request->input('p')),
        'email' => $request->email,
        'level'    => 1
    ]);

    // Insert ke karyawan pakai id_user tadi
    DB::table('karyawan')->insert([
        'username' => $request->username,
        'email'    => $request->email,
        'password' => Hash::make($request->input('p')),
        'id_user'  => $id_user
    ]);

    return redirect('data_karyawan');
}         

            public function edit_karyawan($id){
            $model = new Absensi();
            $where = ['id_karyawan' => $id];
            $a = $model->aksi('karyawan', $where);
            return view('edit_karyawan', ['bebas' => $a]);
         }

public function aksi_ekaryawan(Request $request, $id_user)
{
    $model = new Absensi();

    $karyawan = $model->aksi('karyawan', ['id_user' => $id_user]);

    if ($karyawan) {

        $data_karyawan = [
            'username' => $request->username,
            'email'    => $request->email
        ];

        // ✅ hanya update password jika diisi
        if (!empty($request->password)) {
            $data_karyawan['password'] = Hash::make($request->password);
        }

        // update tabel karyawan
        $model->edit('karyawan', ['id_user' => $id_user], $data_karyawan);


        $data_user = [
            'username' => $request->username,
            'email'    => $request->email
        ];

        // ✅ hash juga untuk tabel user
        if (!empty($request->password)) {
            $data_user['password'] = Hash::make($request->password);
        }

        // update tabel user
        $model->edit('user', ['id_user' => $id_user], $data_user);
    }

    return redirect('data_karyawan');
}
    

         
public function aksi_hkaryawan($id)
{
    $model = new Absensi();

    $where = ['id_karyawan' => $id];
    $karyawan = $model->aksi('karyawan', $where);

    if ($karyawan) {

        $id_user = $karyawan->id_user;
        $model->hapus('karyawan', ['id_karyawan' => $id]);
        $model->hapus('user', ['id_user' => $id_user]);
    }

    return redirect('data_karyawan');
}

public function data_admin(Request $request)
{
    $search = $request->search;

    $query = DB::table('admin');

    if ($search) {
        $query->where('username', 'like', $search . '%');

    }

    $admins = $query->paginate(5)->withQueryString();

    return view('data_admin', compact('admins'));
}


public function Tambah_admin(){
    return view('tambah_admin');
    }

public function aksi_aadmin(Request $request)
{
    // Insert ke users dulu
    $id_user = DB::table('user')->insertGetId([
        'username'     => $request->username,
        'password' => Hash::make($request->password),
        'email' => $request->email,
        'level'    => 2
    ]);

    // Insert ke admin pakai id_user tadi
    DB::table('admin')->insert([
        'username' => $request->username,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
        'id_user'  => $id_user
    ]);

    return redirect('data_admin');
}         

            public function edit_admin($id){
            $model = new Absensi();
            $where = ['id_admin' => $id];
            $a = $model->aksi('admin', $where);
            return view('edit_admin', ['bebas' => $a]);
         }

public function aksi_eadmin(Request $request, $id_user)
{
    $model = new Absensi();

    $admin = $model->aksi('admin', ['id_user' => $id_user]);

    if ($admin) {

        $data_admin = [
            'username' => $request->username,
            'email'    => $request->email
        ];

        if (!empty($request->password)) {
            $data_admin['password'] = Hash::make($request->password);
        }

        $model->edit('admin', ['id_user' => $id_user], $data_admin);

        $data_user = [
            'username' => $request->username,
            'email'    => $request->email
        ];

        if (!empty($request->password)) {
            $data_user['password'] = Hash::make($request->password);
        }

        $model->edit('user', ['id_user' => $id_user], $data_user);
    }

    return redirect('data_admin');
}
    

         
public function aksi_hadmin($id)
{
    $model = new Absensi();

    $where = ['id_admin' => $id];
    $admin = $model->aksi('admin', $where);

    if ($admin) {

        $id_user = $admin->id_user;
        $model->hapus('admin', ['id_admin' => $id]);
        $model->hapus('user', ['id_user' => $id_user]);
    }

    return redirect('data_admin');
}

public function pengaturan_akses()
{
    // Hanya superadmin yang boleh masuk
    if (session('level') != 3) {
        abort(403);
    }

    $levels = [
        2 => 'Admin',
        3 => 'Superadmin',
        4 => 'Manager'
    ];

    $menus = [
        'data_absensi',
        'data_karyawan',
        'data_admin',
        'laporan_absensi'
    ];

    $permissions = DB::table('permissions')->get();

    return view('pengaturan_akses', compact('levels', 'menus', 'permissions'));
}

public function pengajuan()
{
    $data = DB::table('pengajuan_izin')
        ->where('id_user', session('id_user'))
        ->orderBy('tanggal', 'desc')
        ->get();

    return view('pengajuan', compact('data'));
}

public function pengajuan_izin()
{
    return view('pengajuan_izin');

}

public function aksi_izin(Request $request)
{
    if (!session()->has('id_user')) {
        return redirect('/login');
    }

    $request->validate([
        'keterangan' => 'required|string'
    ]);

    DB::transaction(function () use ($request) {

        $idUser     = session('id_user');
        $idKaryawan = session('id_karyawan');
        $username   = session('username');
        $tanggal    = now()->toDateString();
        $sekarang   = now();

        DB::table('pengajuan_izin')->insert([
            'id_user'     => $idUser,
            'id_karyawan' => $idKaryawan,
            'username'    => $username,
            'pengajuan'   => 'izin',
            'keterangan'  => $request->keterangan,
            'tanggal'     => $tanggal,
            'status'      => 'menunggu'
        ]);

        DB::table('absensi')->insert([
            'id_user'        => $idUser,
            'id_karyawan'    => $idKaryawan,
            'username'       => $username,
            'tanggal'        => $tanggal,
            'waktu_absensi'  => $sekarang,
            'status_absensi' => 'izin',
            'keterangan'     => $request->keterangan
        ]);
    });

    return redirect('/pengajuan')
        ->with('success', 'Pengajuan izin berhasil dikirim!');
}


public function data_pengajuan_izin(Request $request)
{
    if(session('level') != 2){
        return redirect('/home');
    }

    $query = DB::table('pengajuan_izin');

    // Jika ada search username
    if($request->username){
        $query->where('username', 'like', '%' . $request->username . '%');
    }

    $pengajuans = $query
        ->orderBy('tanggal','desc')
        ->paginate(10)
        ->withQueryString(); // supaya pagination tetap membawa search

    return view('data_pengajuan_izin', compact('pengajuans'));
}

public function setujui_izin($id)
{
    DB::table('pengajuan_izin')
        ->where('id', $id)
        ->update([
            'status' => 'disetujui',
        ]);

    return back()->with('success', 'Pengajuan berhasil disetujui.');
}

public function tolak_izin($id)
{
    DB::table('pengajuan_izin')
        ->where('id', $id)
        ->update([
            'status' => 'ditolak',
        ]);

    return back()->with('success', 'Pengajuan berhasil ditolak.');
}

public function Akun(){

        $username = session('username');

        $user = DB::table('user')->where('username', $username)->first();
            
    if (session('id_user')>0){
        return view('akun', compact('user'));
    } else {
        return redirect('/home');
    }

}

public function updateAkun(Request $request)
{
    $username = session('username');

    $user = DB::table('user')->where('username', $username)->first();

    if (!$user) {
        return redirect()->back()->with('error', 'User tidak ditemukan.');
    }

    DB::transaction(function () use ($request, $user) {

        // =========================
        // UPDATE TABLE USER
        // =========================
        $dataUser = [
            'email' => $request->email,
        ];

        if (!empty($request->password)) {
            $dataUser['password'] = Hash::make($request->password);
        }

        DB::table('user')
            ->where('id_user', $user->id_user)
            ->update($dataUser);


        // =========================
        // UPDATE TABLE KARYAWAN
        // =========================
        $dataKaryawan = [
            'email' => $request->email,
        ];

        if (!empty($request->password)) {
            $dataKaryawan['password'] = Hash::make($request->password);
        }

        DB::table('karyawan')
            ->where('id_user', $user->id_user)
            ->update($dataKaryawan);

    });

    // Update session email saja
    session([
        'email' => $request->email,
    ]);

    return redirect('home');
}

public function proses_absen()
{
    if (!session()->has('id_user')) {
        return redirect('/login');
    }    

    if (!session()->has('username')) {
            return redirect('/login');
    }

    // Khusus karyawan
    if (session('level') != 1) {
        return redirect('/home');
    }

    $username = session('username');
    $tanggal = date('Y-m-d');
    $jam = date('H:i:s');

    // Cek apakah sudah absen hari ini
    $cek = DB::table('absensi')
        ->where('username', $username)
        ->where('tanggal', $tanggal)
        ->first();

    if ($cek) {
        return redirect('/home')->with('error', 'Anda sudah absen hari ini.');
    }

    // Tentukan status berdasarkan jam
    if ($jam >= '06:00:00' && $jam <= '08:00:00') {
        $status = 'hadir';
    } elseif ($jam > '08:00:00' && $jam <= '12:00:00') {
        $status = 'terlambat';
    } else {
        return redirect('/home')->with('error', 'Waktu absensi sudah berakhir.');
    }

DB::table('absensi')->insert([
    'id_user' => session('id_user'),
    'id_karyawan' => session('id_karyawan'),
    'username' => session('username'),
    'tanggal' => $tanggal,
    'waktu_absensi' => $jam,
    'status_absensi' => $status,
    'keterangan' => '-'
]);
    return redirect('/home');
}

private function checkPermission($menu)
{
    $allowedMenus = DB::table('permissions')
        ->where('level', session('level'))
        ->pluck('menu_key')
        ->toArray();

    if (!in_array($menu, $allowedMenus)) {
        abort(403);
    }
}

public function update_pengaturan_akses(Request $request)
{
    if (session('level') != 3) {
        abort(403);
    }

    $inputPermissions = $request->input('permissions', []);

    // Hapus semua permission
    DB::table('permissions')->delete();

    // Insert ulang
    foreach ($inputPermissions as $level => $menus) {

        foreach ($menus as $menuKey) {

            DB::table('permissions')->insert([
                'level' => $level,
                'menu_key' => $menuKey
            ]);
        }
    }

    // Paksa superadmin tetap punya akses
    if (!DB::table('permissions')
        ->where('level', 3)
        ->where('menu_key', 'pengaturan_akses')
        ->exists()) {

        DB::table('permissions')->insert([
            'level' => 3,
            'menu_key' => 'pengaturan_akses'
        ]);
    }

    return redirect('/pengaturan_akses')
        ->with('success', 'Pengaturan akses berhasil diperbarui.');
}

public function updatePassword(Request $request)
{
    $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|min:5|confirmed',
    ]);

    $id_user = session('id_user');

    $user = DB::table('user')
        ->where('id_user', $id_user)
        ->first();

    if (!$user) {
        return back()->with('error', 'User tidak ditemukan!');
    }

    // cek password lama (hash check)
    if (!Hash::check($request->old_password, $user->password)) {
        return back()->with('error', 'Password lama salah!');
    }

    DB::transaction(function () use ($request, $id_user) {

        $newPassword = Hash::make($request->new_password);

        // update tabel user
        DB::table('user')
            ->where('id_user', $id_user)
            ->update([
                'password' => $newPassword
            ]);

        // update tabel karyawan
        DB::table('karyawan')
            ->where('id_user', $id_user)
            ->update([
                'password' => $newPassword
            ]);
    });

    return redirect('/home')->with('success', 'Password berhasil diperbarui!');
}

public function ganti_password()
{
        if (session('id_user')>0){
            return view('ganti_password');
        } else {
            return redirect('/login');
        }
}
}