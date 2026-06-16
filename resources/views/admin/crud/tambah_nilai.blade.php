<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIAKAD Dashboard</title>
  <link rel="icon" type="image/png" href="{{ asset('img/LOGO_POLTEKAD.png') }}">
  <script src="https://cdn.tailwindcss.com"></script>
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
        <a href="#" class="block py-2 px-4 rounded hover:bg-red-600 bg-red-500 text-center">
          🚪 Logout
        </a>
      </div>
    </aside>

    <!-- Main Content -->
<div class="flex-1 flex flex-col ml-64 left-64">
  <!-- Navbar -->
<header class="bg-white shadow p-4 flex justify-between items-center fixed left-64 w-[calc(100%-16rem)] z-10">
  <h1 class="text-xl font-bold">Nilai</h1>
  <div class="flex items-center space-x-3">
    <span class="text-gray-600">Raihan</span>
    <img src="https://ui-avatars.com/api/?name=Raihan&background=0D8ABC&color=fff" 
         alt="User  Avatar" 
         class="w-10 h-10 rounded-full">
  </div>
</header>

    <!-- Main wrapper -->
  <main class="flex-1 mt-16 p-6 bg-white rounded-xl shadow-lg overflow-y-auto">
    <h1 class="text-2xl font-bold mb-4 text-gray-700">📊 Data Nilai Mahasiswa</h1>

      <!-- Form Input Nilai -->
      <form class="grid grid-cols-2 gap-4 mb-6">
        <input type="text" placeholder="NIM" class="border p-2 rounded-lg w-full">
        <input type="text" placeholder="Nama Mahasiswa" class="border p-2 rounded-lg w-full">
        <input type="text" placeholder="Kode Mata Kuliah" class="border p-2 rounded-lg w-full">
        <input type="text" placeholder="Nama Mata Kuliah" class="border p-2 rounded-lg w-full">
        <input type="number" placeholder="SKS" class="border p-2 rounded-lg w-full">
        <input type="number" placeholder="Semester" class="border p-2 rounded-lg w-full">
        <input type="number" placeholder="Nilai Angka" class="border p-2 rounded-lg w-full">
        <input type="text" placeholder="Nilai Huruf" class="border p-2 rounded-lg w-full">
        <button type="submit" class="col-span-2 bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">➕ Tambah Nilai</button>
      </form>

      <!-- Tabel Nilai -->
      <div class="overflow-x-auto">
        <table class="w-full border border-gray-300 rounded-lg">
          <thead class="bg-blue-500 text-white">
            <tr>
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
            <tr>
                <td class="p-2 border">{{ $n->mahasiswa->nim }}</td>
                <td class="p-2 border">{{ $n->mahasiswa->nama }}</td>
                <td class="p-2 border">{{ $n->mataKuliah->kode_mk }}</td>
                <td class="p-2 border">{{ $n->mataKuliah->nama_mk }}</td>
                <td class="p-2 border">{{ $n->sks }}</td>
                <td class="p-2 border">{{ $n->semester }}</td>
                <td class="p-2 border">{{ $n->nilai_angka }}</td>
                <td class="p-2 border">{{ $n->nilai_huruf }}</td>
                <td class="p-2 border">{{ $n->indeks }}</td>
                <td class="p-2 border">
                    <form action="{{ route('nilai.destroy', $n->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Hapus</button>
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
