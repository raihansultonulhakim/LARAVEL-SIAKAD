<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIAKAD Dashboard</title>
  <link rel="icon" type="image/png" href="{{ asset('img/LOGO_POLTEKAD.png') }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100">

  <div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-blue-800 text-white flex flex-col fixed h-screen">
      <div class="p-6 text-2xl font-bold border-b border-blue-700">
        📚 SIAKAD
      </div>
      <nav class="flex-1 p-4 space-y-3">
        <a href="dashboardadmin" class="block py-2 px-4 rounded hover:bg-blue-700">🏛️ Dashboard</a>
        <a href="data mahasiswa" class="block py-2 px-4 rounded hover:bg-blue-700">🏫 Data Mahasiswa</a>
        <a href="data dosen" class="block py-2 px-4 rounded hover:bg-blue-700">👨‍🏫 Data Dosen</a>
        <a href="mata kuliah" class="block py-2 px-4 rounded hover:bg-blue-700">📖 Mata Kuliah</a>
        <a href="nilai" class="block py-2 px-4 rounded hover:bg-blue-700">📝 Nilai</a>
      </nav>
      <div class="p-4 border-t border-blue-700">
        <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" 
        class="w-full block text-left bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg text-center">
        🚪Logout
    </button>
</form>
      </div>
    </aside>

    <!-- Main Content -->
<div class="flex-1 flex flex-col ml-64 left-64">
  <!-- Navbar -->
<header class="bg-white shadow p-4 flex justify-between items-center">
          <h1 class="text-xl font-bold">Profile</h1>
          
          @auth
          <a href="{{ route('admin.profil') }}" class="flex items-center space-x-3">
            <span class="text-gray-600">{{ Auth::user()->name }}</span>
            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=0D8ABC&color=fff"
                 alt="User Avatar"
                 class="w-10 h-10 rounded-full">
          </a>
          @endauth
      </header>

@if(session('success'))
  <script>
  Swal.fire({
      icon: 'success',
      title: 'Berhasil!',
      text: '{{ session('success') }}',
      showConfirmButton: false,
      timer: 2000
  });
  </script>
  @endif

  @if(session('error'))
  <script>
  Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: '{{ session('error') }}',
  });
  </script>
  @endif


@if(session('error'))
<script>
    Swal.fire({
        toast: true,
        position: 'top',
        icon: 'error',
        title: '{{ session('error') }}',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true
    })
</script>
@endif

    
    <!-- Main wrapper -->
  <main class="flex-1 mt-16 p-6 bg-white rounded-xl shadow-lg overflow-y-auto">
    <h1 class="text-2xl font-bold mb-4 text-gray-700">📊 Data Nilai Mahasiswa</h1>

      <!-- Form Input Nilai -->
<form action="{{ route('nilai.store') }}" method="POST" class="grid grid-cols-2 gap-4 mb-6">
    @csrf
    
    <!-- Mahasiswa -->
    <div>
        <label for="mahasiswa_id" class="block mb-1 font-medium">Mahasiswa (NIM - Nama)</label>
        <select name="mahasiswa_id" id="mahasiswa_id" 
                class="border p-2 rounded-lg w-full">
            <option value="">-- Pilih Mahasiswa --</option>
            @foreach($mahasiswa as $m)
                <option value="{{ $m->id }}">{{ $m->nim }} - {{ $m->nama }}</option>
            @endforeach
        </select>
    </div>

    <!-- Mata Kuliah -->
    <div>
        <label for="mata_kuliah_id" class="block mb-1 font-medium">Mata Kuliah (Kode - Nama)</label>
        <select name="mata_kuliah_id" id="mata_kuliah_id" 
                class="border p-2 rounded-lg w-full">
            <option value="">-- Pilih Mata Kuliah --</option>
            @foreach($matakuliah as $mk)
                <option value="{{ $mk->id }}">{{ $mk->kode_mk }} - {{ $mk->nama_mk }}</option>
            @endforeach
        </select>
    </div>

    <!-- SKS -->
    <div>
        <label for="sks" class="block mb-1 font-medium">SKS</label>
        <input type="number" name="sks" placeholder="SKS" class="border p-2 rounded-lg w-full" required>
    </div>

    <!-- Semester -->
    <div>
        <label for="semester" class="block mb-1 font-medium">Semester</label>
        <!-- <input type="number" name="semester" placeholder="Semester" class="border p-2 rounded-lg w-full" required> -->
         <select id=semester" name="semester"
          class="w-full border rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none">
    <option value="">-- Pilih Semester --</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="3">4</option>
    <option value="3">5</option>
  </select>
    </div>

    <!-- Nilai Angka -->
    <div>
        <label for="nilai_angka" class="block mb-1 font-medium">Nilai Angka</label>
        <input type="number" step="0.01" name="nilai_angka" placeholder="Nilai Angka" class="border p-2 rounded-lg w-full" required>
    </div>

    <!-- Nilai Huruf -->
    <div>
        <label for="nilai_huruf" class="block mb-1 font-medium">Nilai Huruf</label>
        <!-- <input type="text" name="nilai_huruf" placeholder="Nilai Huruf" maxlength="2" class="border p-2 rounded-lg w-full" required> -->
         <select id=nilai_huruf" name="nilai_huruf"
          class="w-full border rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none">
    <option value="">-- Pilih Nilai Huruf --</option>
    <option value="A+">A+</option>
    <option value="A">A</option>
    <option value="A-">A-</option>
    <option value="B+">B+</option>
    <option value="B">B</option>
    <option value="B-">B-</option>
    <option value="C+">C+</option>
    <option value="C">C</option>
    <option value="C-">C-</option>
  </select>
    </div>

    <!-- Indeks -->
    <div>
        <label for="indeks" class="block mb-1 font-medium">Indeks</label>
        <input type="number" step="0.01" name="indeks" placeholder="Indeks" class="border p-2 rounded-lg w-full" required>
    </div>

    <!-- Tombol Submit full width -->
    <div class="col-span-2">
        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">
            ➕ Tambah Nilai
        </button>
    </div>
</form>



      <!-- Tabel Nilai -->
      <div class="overflow-x-auto">
        <table class="w-full border border-gray-300 rounded-lg">
          <thead class="bg-blue-500 text-white">
            <tr>
              <th class="p-2 border">No</th>
              <th class="p-2 border">NIM</th>
              <th class="p-2 border">Nama</th>
              <th class="p-2 border">Kode MK</th>
              <th class="p-2 border">Mata Kuliah</th>
              <th class="p-2 border">SKS</th>
              <th class="p-2 border">Semester</th>
              <th class="p-2 border">Nilai Angka</th>
              <th class="p-2 border">Nilai Huruf</th>
              <th class="p-2 border">Indeks</th>
              <th class="p-2 border">Aksi</th>
            </tr>
          </thead>
      <tbody>
            @foreach($nilai as $n)
            <tr class="text-center">
                <td class="p-2 border">{{ $loop->iteration }}</td> <!-- nomor otomatis -->
                <td class="p-2 border">{{ $n->mahasiswa->nim }}</td>
                <td class="p-2 border">{{ $n->mahasiswa->nama }}</td>
                <td class="p-2 border">{{ $n->matakuliah->kode_mk }}</td>
                <td class="p-2 border">{{ $n->matakuliah->nama_mk }}</td>
                <td class="p-2 border">{{ $n->sks }}</td>
                <td class="p-2 border">{{ $n->semester }}</td>
                <td class="p-2 border">{{ $n->nilai_angka }}</td>
                <td class="p-2 border">{{ $n->nilai_huruf }}</td>
                <td class="p-2 border">{{ $n->indeks }}</td>
                <td class="p-2 border">
                    <form action="{{ route('nilai.destroy', $n->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">🗑️ Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
      </div>
    </main>

  </div>

</body>
</html>
