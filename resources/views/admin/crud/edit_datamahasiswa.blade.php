<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Mahasiswa</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

  <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-4xl">
    <h1 class="text-2xl font-bold mb-6 text-center text-blue-600">Edit Mahasiswa</h1>

   <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
  @csrf
  @method('PUT')

  <!-- NIM -->
  <div>
    <label for="nim" class="block text-gray-700 font-medium">NIM</label>
    <input type="text" id="nim" name="nim" 
           value="{{ $mahasiswa->nim }}"
           class="w-full border rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none" 
           placeholder="Masukkan NIM">
  </div>

  <!-- Nama -->
  <div>
    <label for="nama" class="block text-gray-700 font-medium">Nama Lengkap</label>
    <input type="text" id="nama" name="nama"
           value="{{ $mahasiswa->nama }}"
           class="w-full border rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none" 
           placeholder="Masukkan nama lengkap">
  </div>

  <!-- Prodi -->
  <div>
    <label for="jurusan" class="block text-gray-700 font-medium">Prodi</label>
    <select id="jurusan" name="jurusan"
            class="w-full border rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none">
      <option value="">-- Pilih Prodi --</option>
      <option value="TI" {{ $mahasiswa->jurusan == 'TI' ? 'selected' : '' }}>Teknik Informatika</option>
      <option value="SI" {{ $mahasiswa->jurusan == 'SI' ? 'selected' : '' }}>Sistem Informasi</option>
      <option value="TE" {{ $mahasiswa->jurusan == 'TE' ? 'selected' : '' }}>Teknik Elektro</option>
    </select>
  </div>

  <!-- Angkatan -->
  <div>
    <label for="angkatan" class="block text-gray-700 font-medium">Angkatan</label>
    <input type="text" id="angkatan" name="angkatan" 
           value="{{ $mahasiswa->angkatan }}"
           class="w-full border rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none" 
           placeholder="Masukkan angkatan">
  </div>

  <!-- Email -->
  <div>
    <label for="email" class="block text-gray-700 font-medium">Email</label>
    <input type="email" id="email" name="email" 
           value="{{ $mahasiswa->email }}"
           class="w-full border rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none" 
           placeholder="Masukkan email">
  </div>

  <!-- Nomor HP -->
  <div>
    <label for="no_hp" class="block text-gray-700 font-medium">Nomor HP</label>
    <input type="text" id="no_hp" name="no_hp"
           value="{{ $mahasiswa->no_hp }}"
           class="w-full border rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none" 
           placeholder="Masukkan nomor">
  </div>

  <!-- Tombol -->
  <div class="col-span-1 md:col-span-2 flex justify-between items-center mt-6">
    <a href="{{ route('mahasiswa.index') }}" 
       class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition">Kembali</a>
    <button type="submit" 
            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Simpan</button>
  </div>
</form>

  </div>

</body>
</html>
