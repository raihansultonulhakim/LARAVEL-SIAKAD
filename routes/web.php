<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NilaiController;
use Illuminate\Support\Facades\Route; 

Route::get('/', function () {
    return view('landing'); // halaman awal
});

Route::get('profil', function () {
    return view('admin.profil');
})->middleware('auth')->name('admin.profil');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin', fn() => "Halaman Admin")
    ->middleware(['auth', 'role:admin']);

Route::get('/dosen', fn() => "Halaman Dosen")
    ->middleware(['auth', 'role:dosen']);

Route::get('/mahasiswa', fn() => "Halaman Mahasiswa")
    ->middleware(['auth', 'role:mahasiswa']);

// Route::get('/dashboard admin', function () {
//     return view('admin.dashboard_siakad');
// });

Route::get('/dashboardadmin', [DashboardController::class, 'index']);

Route::get('/data mahasiswa', function () {
    return view('admin.data_mahasiswa');
});

Route::get('/data dosen', function () {
    return view('admin.data_dosen');
});

Route::get('/mata kuliah', function () {
    return view('admin.mata_kuliah');
});

Route::get('/nilai', function () {
    return view('admin.nilai');
});


// SISTEM CRUD TAMBAH

Route::get('/tambah data mahasiswa', function () {
    return view('admin.crud.tambah_datamahasiswa');
});

Route::get('/tambah data dosen', function () {
    return view('admin.crud.tambah_datadosen');
});

Route::get('/tambah mata kuliah', function () {
    return view('admin.crud.tambah_matakuliah');
});

Route::get('/tambah nilai', function () {
    return view('admin.crud.tambah_nilai');
});


// SISTEM CRUD EDIT

Route::get('/edit data mahasiswa', function () {
    return view('admin.crud.edit_datamahasiswa');
});

Route::get('/edit data dosen', function () {
    return view('admin.crud.edit_datadosen');
});

Route::get('/edit mata kuliah', function () {
    return view('admin.crud.edit_matakuliah');
});

Route::get('/edit nilai', function () {
    return view('admin.crud.edit_nilai');
});

Route::resource('mahasiswa', MahasiswaController::class);

Route::get('/data mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');

Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');

Route::get('/mahasiswa/{mahasiswa}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::put('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');

Route::resource('data dosen', DosenController::class);

Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosen.create');
Route::post('/dosen', [DosenController::class, 'store'])->name('dosen.store');

Route::get('/dosen/{dosen}/edit', [DosenController::class, 'edit'])->name('dosen.edit');
Route::put('/dosen/{dosen}', [DosenController::class, 'update'])->name('dosen.update');

Route::resource('dosen', DosenController::class);


//MATA KULIAH
Route::resource('matakuliah', MatakuliahController::class);

Route::get('/mata kuliah', [MatakuliahController::class, 'index'])->name('matakkuliah.index');

Route::get('/matakuliah/create', [MatakuliahController::class, 'create'])->name('matakuliah.create');
Route::post('/matakuliah', [MatakuliahController::class, 'store'])->name('matakuliah.store');

Route::get('/matakuliah/{matakuliah}/edit', [MatakuliahController::class, 'edit'])->name('matakuliah.edit');
Route::put('/matakuliah/{matakuliah}', [MatakuliahController::class, 'update'])->name('matakuliah.update');


// NILAI
Route::resource('nilai', NilaiController::class);

// Route::get('/nilai/create', [NilaiController::class, 'create'])->name('nilai.create');
// Route::post('/nilai/store', [NilaiController::class, 'store'])->name('nilai.store');


require __DIR__.'/auth.php';