<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Mata Kuliah</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

  <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-4xl">
    <h1 class="text-2xl font-bold mb-6 text-center text-blue-600">Edit Mata Kuliah</h1>

 <form action="{{ route('matakuliah.update', $matakuliah->id) }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
  @csrf
  @method('PUT')

      <!-- NIM -->
      <div>
        <label for="kode_mk" class="block text-gray-700 font-medium">Kode Mata Kuliah</label>
        <input type="text" id="kode_mk" name="kode_mk" 
                value="{{ $matakuliah->kode_mk }}"
               class="w-full border rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none" 
               placeholder="Masukkan Kode Mata Kuliah">
      </div>

      <!-- Nama Lengkap -->
      <div>
        <label for="nama_mk" class="block text-gray-700 font-medium">Nama Mata Kuliah</label>
        <input type="text" id="nama_mk" name="nama_mk" 
                value="{{ $matakuliah->nama_mk }}"
               class="w-full border rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none" 
               placeholder="Masukkan nama mata kuliah">
      </div>

      <!-- SKS -->
      <div>
        <label for="sks" class="block text-gray-700 font-medium">SKS</label>
        <input type="text" id="sks" name="sks" 
                value="{{ $matakuliah->sks }}"
               class="w-full border rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none" 
               placeholder="Masukkan SKS">
      </div>

      <!-- Angkatan -->
      <div>
        <label for="semester" class="block text-gray-700 font-medium">Semester</label>
        <input type="text" id="semester" name="semester" 
                value="{{ $matakuliah->semester }}"
               class="w-full border rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none" 
               placeholder="Masukkan Semester">
      </div>

      <!-- Email -->
      <div>
        <label for="dosen_pengampu" class="block text-gray-700 font-medium">Dosen Pengampu</label>
        <input type="text" id="dosen_pengampu" name="dosen_pengampu" 
                value="{{ $matakuliah->dosen_pengampu }}"
               class="w-full border rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none" 
               placeholder="Masukkan dosen pengampu">
      </div>

      <!-- Tombol (full width, 2 kolom) -->
      <div class="col-span-1 md:col-span-2 flex justify-between items-center mt-6">
        <a href="{{ route('matakuliah.index') }}" 
   class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition">Kembali</a>
        <button type="submit" 
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Simpan</button>
      </div>
    </form>
  </div>

</body>
</html>
