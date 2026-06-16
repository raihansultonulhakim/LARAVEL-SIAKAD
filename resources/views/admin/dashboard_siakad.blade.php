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
          <h1 class="text-xl font-bold">Dashboard</h1>
          
          @auth
          <a href="{{ route('admin.profil') }}" class="flex items-center space-x-3">
            <span class="text-gray-600">{{ Auth::user()->name }}</span>
            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=0D8ABC&color=fff"
                 alt="User Avatar"
                 class="w-10 h-10 rounded-full">
          </a>
          @endauth
      </header>

      <!-- Page Content -->
      <main class="flex-1 p-6 overflow-y-auto space-y-6">
  <!-- Welcome Card -->
  <div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-lg font-semibold mb-2">Selamat Datang di SIAKAD 🎉</h2>
    <p class="text-gray-600">
      Pilih menu di sidebar untuk mulai mengelola data mahasiswa, dosen, mata kuliah, atau nilai.
    </p>
  </div>

  <!-- Statistik -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-xl shadow">
      <h3 class="font-semibold text-lg mb-1">Data Mahasiswa</h3>
      <p class="text-gray-600">Total: {{ $totalMahasiswa }}</p>
    </div>
    <div class="bg-white p-6 rounded-xl shadow">
      <h3 class="font-semibold text-lg mb-1">Data Dosen</h3>
      <p class="text-gray-600">Total: {{ $totalDosen }}</p>
    </div>
    <div class="bg-white p-6 rounded-xl shadow">
      <h3 class="font-semibold text-lg mb-1">Mata Kuliah</h3>
      <p class="text-gray-600">Total: {{ $totalMataKuliah }}</p>
    </div>
  </div>

</main>

  </div>
</body>
</html> 