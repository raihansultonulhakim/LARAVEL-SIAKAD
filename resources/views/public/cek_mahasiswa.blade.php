<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cek Data Mahasiswa - SIAKAD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
      .avatar-placeholder { width:120px;height:120px;border-radius:50%;background:#f1f5f9;display:flex;align-items:center;justify-content:center;font-weight:700;color:#334155;}
    </style>
  </head>
  <body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
          <img src="{{ asset('img/LOGO_POLTEKAD.png') }}" alt="logo" width="40" height="40" class="me-2">
          <span class="fw-bold">SIAKAD</span>
        </a>
        <div class="ms-auto">
          <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
        </div>
      </div>
    </nav>

    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8">
          <div class="card shadow-sm mb-4">
            <div class="card-body">
              <h5 class="card-title"><i class="bi bi-search me-2"></i>Cek Data Mahasiswa</h5>
              <p class="text-muted mb-3">Masukkan NIM mahasiswa untuk melihat biodata, jadwal, dan nilai.</p>

              <form class="row g-2" method="get" action="{{ route('public.mahasiswa.search') }}">
                <div class="col-9">
                  <input name="nim" value="{{ old('nim', $nim ?? '') }}" class="form-control form-control-lg" placeholder="Masukkan NIM (contoh: 2023001)" aria-label="NIM">
                </div>
                <div class="col-3 d-grid">
                  <button class="btn btn-primary btn-lg" type="submit"><i class="bi bi-search me-1"></i>Cari</button>
                </div>
              </form>

            </div>
          </div>

          @if(isset($nim) && !$mahasiswa)
            <div class="alert alert-warning">Data mahasiswa dengan NIM <strong>{{ $nim }}</strong> tidak ditemukan.</div>
          @endif

          @if($mahasiswa)
            <div class="row g-4">
              <div class="col-12">
                <div class="card shadow-sm">
                  <div class="card-body d-flex gap-4 align-items-center">
                    <div>
                      @if(file_exists(public_path('img/LOGO_POLTEKAD.png')))
                        <img src="{{ asset('img/LOGO_POLTEKAD.png') }}" alt="avatar" class="avatar-placeholder">
                      @else
                        <div class="avatar-placeholder">{{ strtoupper(substr($mahasiswa->nama,0,1)) }}</div>
                      @endif
                    </div>
                    <div class="flex-fill">
                      <h4 class="mb-1">{{ $mahasiswa->nama }} <small class="text-muted">({{ $mahasiswa->nim }})</small></h4>
                      <p class="mb-0"><i class="bi bi-geo-alt-fill me-1"></i>Program Studi: <strong>{{ $mahasiswa->jurusan ?? '-' }}</strong></p>
                      <p class="mb-0"><i class="bi bi-calendar-event me-1"></i>Angkatan: <strong>{{ $mahasiswa->angkatan ?? '-' }}</strong></p>
                      <p class="mb-0"><i class="bi bi-phone me-1"></i>Email / HP: <strong>{{ $mahasiswa->email ?? '-' }} / {{ $mahasiswa->no_hp ?? '-' }}</strong></p>
                    </div>
                    <div class="text-end">
                      <p class="mb-1 text-muted">Semester</p>
                      <h5 class="fw-bold">{{ $semester ?? '-' }}</h5>
                      @if($ipk)
                        <p class="mb-0 text-muted">IPK</p>
                        <h5 class="text-success">{{ $ipk }}</h5>
                      @endif
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12 col-lg-6">
                <div class="card shadow-sm">
                  <div class="card-header">
                    <i class="bi bi-calendar3 me-2"></i>Jadwal Kuliah (Semester {{ $semester ?? '-' }})
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped mb-0">
                        <thead class="table-light">
                          <tr>
                            <th>Kode</th>
                            <th>Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Dosen</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse($jadwal as $mk)
                            <tr>
                              <td>{{ $mk->kode_mk ?? '-' }}</td>
                              <td>{{ $mk->nama_mk ?? '-' }}</td>
                              <td>{{ $mk->sks ?? '-' }}</td>
                              <td>{{ $mk->dosen_pengampu ?? '-' }}</td>
                            </tr>
                          @empty
                            <tr><td colspan="4" class="text-center py-3">Tidak ada jadwal untuk semester ini.</td></tr>
                          @endforelse
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12 col-lg-6">
                <div class="card shadow-sm">
                  <div class="card-header">
                    <i class="bi bi-journal-text me-2"></i>Nilai Mata Kuliah
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped mb-0">
                        <thead class="table-light">
                          <tr>
                            <th>Kode</th>
                            <th>Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Semester</th>
                            <th>Nilai</th>
                            <th>Index</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse($nilaiList as $n)
                            <tr>
                              <td>{{ $n->matakuliah->kode_mk ?? '-' }}</td>
                              <td>{{ $n->matakuliah->nama_mk ?? '-' }}</td>
                              <td>{{ $n->sks ?? '-' }}</td>
                              <td>{{ $n->semester ?? '-' }}</td>
                              <td>{{ $n->nilai_angka ?? '-' }}</td>
                              <td>{{ $n->nilai_huruf ?? $n->indeks ?? '-' }}</td>
                            </tr>
                          @empty
                            <tr><td colspan="6" class="text-center py-3">Belum ada nilai.</td></tr>
                          @endforelse
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          @endif

        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
