<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD - Sistem Informasi Akademik</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Navbar -->
   <nav class="bg-blue-600 p-4 shadow">
    <div class="container mx-auto flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <img src="{{ asset('img/LOGO_POLTEKAD.png') }}" alt="Logo SIAKAD" class="w-10 h-10">
            <h1 class="text-white text-xl font-bold">SIAKAD</h1>
        </div>
        <div class="flex items-center">
            <a href="{{ route('public.dosen.index') }}" class="bg-white text-blue-600 px-4 py-2 rounded-lg mr-2">Data Dosen</a>
            <a href="{{ route('public.mahasiswa.search') }}" class="bg-white text-blue-600 px-4 py-2 rounded-lg mr-2">Cek Data Mahasiswa</a>
            <a href="{{ route('login') }}" class="bg-white text-blue-600 px-4 py-2 rounded-lg mr-2">Login</a>
            <a href="{{ route('register') }}" class="bg-yellow-400 text-white px-4 py-2 rounded-lg">Register</a>
        </div>
    </div>
</nav>


    <!-- Hero Section -->
    <section class="text-center py-20 bg-gradient-to-r from-blue-500 to-indigo-600 text-white">
        <h2 class="text-4xl font-bold mb-4">Selamat Datang di SIAKAD</h2>
        <p class="text-lg mb-6">Sistem Informasi Akademik untuk Mahasiswa, Dosen, dan Admin.</p>
        <a href="{{ route('login') }}" class="bg-white text-blue-600 px-6 py-3 rounded-lg shadow hover:bg-gray-200">Mulai Sekarang</a>
    </section>

    <!-- Fitur -->
    <section class="py-12 container mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="font-bold text-xl mb-2">📚 Mahasiswa</h3>
            <p>Lihat jadwal kuliah, nilai, dan KRS dengan mudah.</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="font-bold text-xl mb-2">👨‍🏫 Dosen</h3>
            <p>Kelola data nilai, absensi, dan mata kuliah yang diajar.</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="font-bold text-xl mb-2">⚙️ Admin</h3>
            <p>Manajemen data akademik, mahasiswa, dan dosen secara terpusat.</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4">
        <p>&copy; {{ date('Y') }} SIAKAD - Sistem Informasi Akademik</p>
    </footer>

</body>
</html>
