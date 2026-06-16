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
    <aside class="w-64 bg-blue-800 text-white flex flex-col">
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
  <div class="flex-1 flex flex-col">
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

    <!-- Tabel -->
<div class="p-6">
      <div class="bg-white rounded-xl shadow p-4">
        <h3 class="font-semibold text-lg mb-4">Mata Kuliah</h3>
        <a href="tambah mata kuliah">
          <button class="mb-4 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded flex items-center gap-2">
  <span>➕</span> Tambah
</button>
        </a>
        <table class="w-full border-collapse border border-gray-200 text-sm">
          <thead class="bg-gray-100">
            <tr>
              <th class="p-2 border">No</th>
              <th class="border px-4 py-2">Kode Mata Kuliah</th>
              <th class="border px-4 py-2">Nama Mata Kuliah</th>
              <th class="border px-4 py-2">SKS</th>
              <th class="border px-4 py-2">Semester</th>
              <th class="border px-4 py-2">Dosen Pengampu</th>
              <th class="border px-4 py-2">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($matakuliah as $mk)
<tr class="text-center">
    <td class="p-2 border">{{ $loop->iteration }}</td> <!-- nomor otomatis -->
    <td class="border px-4 py-2">{{ $mk->kode_mk }}</td>
    <td class="border px-4 py-2">{{ $mk->nama_mk }}</td>
    <td class="border px-4 py-2">{{ $mk->sks }}</td>
    <td class="border px-4 py-2">{{ $mk->semester }}</td>
    <td class="border px-4 py-2">{{ $mk->dosen_pengampu }}</td>
    <td class="border px-4 py-2 flex gap-2 justify-center">
    <a href="{{ route('matakuliah.edit', $mk->id) }}" class="bg-yellow-400 px-2 py-1 rounded">✏️ Edit</a>

    <form action="{{ route('matakuliah.destroy', $mk->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 px-2 py-1 rounded">🗑️ Hapus</button>
    </form>
</td>
</tr>
@endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>

</body>
</html>
