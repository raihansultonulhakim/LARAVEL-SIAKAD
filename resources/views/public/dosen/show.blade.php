<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Dosen - {{ $dosen->nama }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
          <img src="{{ asset('img/LOGO_POLTEKAD.png') }}" alt="logo" width="40" height="40" class="me-2">
          <span class="fw-bold">SIAKAD</span>
        </a>
        <div class="ms-auto d-flex gap-2">
          <a href="{{ route('public.dosen.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
          <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-sm">Beranda</a>
        </div>
      </div>
    </nav>

    <div class="container py-5">
      <div class="row gy-4">
        <div class="col-12">
          <div class="card shadow-sm">
            <div class="card-body d-flex flex-column flex-lg-row align-items-center gap-4">
              <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width:120px;height:120px;font-size:2rem;">
                {{ strtoupper(substr($dosen->nama, 0, 1)) }}
              </div>
              <div class="flex-fill">
                <h2 class="mb-1">{{ $dosen->nama }}</h2>
                <p class="mb-1 text-muted">NIP: {{ $dosen->nip }}</p>
                <p class="mb-1"><i class="bi bi-envelope me-2"></i>{{ $dosen->email }}</p>
                <p class="mb-0"><i class="bi bi-phone me-2"></i>{{ $dosen->nomor_hp }}</p>
              </div>
              <div class="text-lg-end">
                <span class="badge bg-secondary">Program Studi: {{ $dosen->prodi }}</span><br>
                <span class="badge bg-info text-dark mt-2">{{ $dosen->jabatan_akademik }}</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-xl-6">
          <div class="card shadow-sm">
            <div class="card-header">
              <i class="bi bi-book-half me-2"></i>Mata Kuliah yang Diajarkan
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-hover mb-0">
                  <thead class="table-light">
                    <tr>
                      <th>Kode</th>
                      <th>Nama Mata Kuliah</th>
                      <th>SKS</th>
                      <th>Semester</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($dosen->mataKuliah as $matkul)
                      <tr>
                        <td>{{ $matkul->kode_mk }}</td>
                        <td>{{ $matkul->nama_mk }}</td>
                        <td>{{ $matkul->sks }}</td>
                        <td>{{ $matkul->semester }}</td>
                      </tr>
                    @empty
                      <tr><td colspan="4" class="text-center py-3">Belum ada mata kuliah.</td></tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-xl-6">
          <div class="card shadow-sm">
            <div class="card-header">
              <i class="bi bi-calendar-event-fill me-2"></i>Jadwal Mengajar
            </div>
            <div class="card-body">
              @if($jadwal->count())
                @foreach($jadwal as $semester => $matkulGroup)
                  <div class="mb-4">
                    <h6 class="mb-3">Semester {{ $semester }}</h6>
                    <div class="list-group">
                      @foreach($matkulGroup as $matkul)
                        <div class="list-group-item list-group-item-action">
                          <div class="d-flex justify-content-between align-items-center">
                            <div>
                              <div class="fw-bold">{{ $matkul->nama_mk }}</div>
                              <small class="text-muted">{{ $matkul->kode_mk }} · {{ $matkul->sks }} SKS</small>
                            </div>
                            <span class="badge bg-primary">{{ $matkul->semester }}</span>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                @endforeach
              @else
                <div class="text-center text-muted">Jadwal mengajar belum tersedia.</div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
