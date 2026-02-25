<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Control;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\LaporanController;

Route::get('/login', [Control::class, 'Login']);
Route::post('/aksi_login', [Control::class, 'aksi_login'])->name('login');

Route::get('/sign_in', [Control::class, 'Sign_in']);
Route::post('/aksi_sign', [Control::class, 'aksi_sign'])->name('Sign_in');

Route::get('/home', [Control::class, 'Home']);
Route::get('/logout', [Control::class, 'Logout']);

Route::get('/riwayat_absensi', [Control::class, 'Riwayat_absensi']);
Route::get('/laporan_absensi', [Control::class, 'Laporan_absensi']);
Route::get('/data_absensi', [Control::class, 'Data_absensi']);

Route::get('/export/laporan/pdf', [LaporanController::class, 'exportPDF']);
Route::get('/export/laporan/excel', [LaporanController::class, 'exportExcel']);
Route::get('/export/laporan/print', [LaporanController::class, 'exportWord']);

Route::get('/data_karyawan', [Control::class, 'Data_karyawan']);

Route::get('/tambah_karyawan', [Control::class, 'Tambah_karyawan']);
Route::post('/aksi_akaryawan', [Control::class, 'aksi_akaryawan'])->name('tambah_karyawan');
Route::get('/edit_karyawan/{id_user}', [Control::class, 'Edit_karyawan']);
Route::post('/aksi_ekaryawan/{id_user}', [Control::class, 'aksi_ekaryawan']);
Route::get('/hapus_karyawan/{id_user}', [Control::class, 'aksi_hkaryawan']);

Route::get('/data_admin', [Control::class, 'Data_admin']);

Route::get('/tambah_admin', [Control::class, 'Tambah_admin']);
Route::post('/aksi_aadmin', [Control::class, 'aksi_aadmin'])->name('tambah_admin');
Route::get('/edit_admin/{id_user}', [Control::class, 'Edit_admin']);
Route::post('/aksi_eadmin/{id_user}', [Control::class, 'aksi_eadmin']);
Route::get('/hapus_admin/{id_user}', [Control::class, 'aksi_hadmin']);

Route::get('/pengajuan', [Control::class, 'Pengajuan']);
Route::get('/pengajuan_izin', [Control::class, 'Pengajuan_izin']);
Route::post('/aksi_pengajuan', [Control::class, 'aksi_pengajuan'])->name('pengajuan_izin');

Route::post('/aksi_izin', [Control::class, 'aksi_izin']);

Route::get('/data_pengajuan_izin', [Control::class, 'Data_pengajuan_izin']);
Route::get('/setujui_izin/{id}', [Control::class, 'setujui_izin']);
Route::get('/tolak_izin/{id}', [Control::class, 'tolak_izin']);

Route::get('/akun', [Control::class, 'Akun']);
Route::post('/pengaturan/akun/update', [control::class, 'updateAkun']);
Route::get('/proses_absen', [Control::class, 'proses_absen']);

Route::get('/laporan_absensi', [Control::class, 'Laporan_absensi'])
    ->middleware('permission:laporan_absensi');

Route::get('/pengaturan_akses', [Control::class, 'pengaturan_akses'])
    ->middleware('permission:pengaturan_akses');

Route::post('/pengaturan_akses/update', [Control::class, 'update_pengaturan_akses']);

Route::get('/ganti_password', [Control::class, 'ganti_password'])->name('ganti.password');

Route::post('/update-password', [Control::class, 'updatePassword'])
    ->name('update.password');

