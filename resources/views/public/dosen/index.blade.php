<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Dosen - SIAKAD</title>
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
        <div class="ms-auto">
          <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
        </div>
      </div>
    </nav>

    <div class="container py-5">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h1 class="h3 mb-1">Data Dosen</h1>
          <p class="text-muted mb-0">Lihat semua dosen dan mata kuliah yang diajar tanpa login.</p>
        </div>
      </div>

      <div class="row g-4">
        @forelse($dosenList as $dosen)
          <div class="col-12 col-md-6 col-xl-4">
            <div class="card shadow-sm h-100">
              <div class="card-body d-flex flex-column">
                <div class="d-flex align-items-center gap-3 mb-3">
                  <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width:64px;height:64px;font-size:1.5rem;">{{ strtoupper(substr($dosen->nama, 0, 1)) }}</div>
                  <div>
                    <h5 class="mb-0">{{ $dosen->nama }}</h5>
                    <small class="text-muted">NIP: {{ $dosen->nip }}</small>
                  </div>
                </div>

                <p class="mb-2"><i class="bi bi-envelope me-2"></i>{{ $dosen->email ?? '-' }}</p>
                <p class="mb-3"><i class="bi bi-phone me-2"></i>{{ $dosen->nomor_hp ?? '-' }}</p>

                <div class="mb-3">
                  <h6 class="mb-1">Mata Kuliah</h6>
                  <div class="small text-muted">
                    @if($dosen->mataKuliah->count())
                      @foreach($dosen->mataKuliah->take(3) as $matkul)
                        {{ $matkul->nama_mk }}@if(!$loop->last), @endif
                      @endforeach
                      @if($dosen->mataKuliah->count() > 3)+{{ $dosen->mataKuliah->count() - 3 }} lainnya @endif
                    @else
                      <span class="text-muted">Belum ada mata kuliah</span>
                    @endif
                  </div>
                </div>

                <div class="mt-auto text-end">
                  <a href="{{ route('public.dosen.show', $dosen) }}" class="btn btn-outline-primary btn-sm">Lihat Detail <i class="bi bi-chevron-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12">
            <div class="alert alert-info">Belum ada data dosen untuk ditampilkan.</div>
          </div>
        @endforelse
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
