<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Dosen</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

  <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-4xl">
    <h1 class="text-2xl font-bold mb-6 text-center text-blue-600">Edit Dosen</h1>

  <form action="{{ route('dosen.update', $dosen->id) }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
  @csrf
  @method('PUT')

      <!-- NIM -->
      <div>
        <label for="nip" class="block text-gray-700 font-medium">NIP/NIDN</label>
        <input type="text" id="nip" name="nip"
                value="{{ $dosen->nip }}" 
               class="w-full border rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none" 
               placeholder="Masukkan NIP/NIDN">
      </div>

      <!-- Nama Lengkap -->
      <div>
        <label for="nama" class="block text-gray-700 font-medium">Nama Lengkap</label>
        <input type="text" id="nama" name="nama"
                value="{{ $dosen->nama }}" 
               class="w-full border rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none" 
               placeholder="Masukkan nama lengkap">
      </div>

      <!-- Prodi -->
      <div>
        <label for="prodi" class="block text-gray-700 font-medium">Prodi</label>
        <select id="prodi" name="prodi"
                class="w-full border rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none">
          <option value="">-- Pilih Prodi --</option>
            <option value="TI" {{ $dosen->prodi == 'TI' ? 'selected' : '' }}>Teknik Informatika</option>
            <option value="SI" {{ $dosen->prodi == 'SI' ? 'selected' : '' }}>Sistem Informasi</option>
            <option value="TE" {{ $dosen->prodi == 'TE' ? 'selected' : '' }}>Teknik Elektro</option>
        </select>
      </div>

      <!-- Angkatan -->
      <div>
        <label for="jabatan_akademik" class="block text-gray-700 font-medium">Jabatan Akademik</label>
        <input type="text" id="jabatan_akademik" name="jabatan_akademik" 
                value="{{ $dosen->jabatan_akademik }}"
               class="w-full border rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none" 
               placeholder="Masukkan Jabatan Akademik">
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-gray-700 font-medium">Email</label>
        <input type="email" id="email" name="email"
                value="{{ $dosen->email }}" 
               class="w-full border rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none" 
               placeholder="Masukkan email">
      </div>

      <!-- Nomor HP -->
      <div>
        <label for="nomor_hp" class="block text-gray-700 font-medium">Nomor HP</label>
        <input type="text" id="nomor_hp" name="nomor_hp"
                value="{{ $dosen->nomor_hp }}" 
               class="w-full border rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-blue-400 outline-none" 
               placeholder="Masukkan nomor">
      </div>

      <!-- Tombol (full width, 2 kolom) -->
      <div class="col-span-1 md:col-span-2 flex justify-between items-center mt-6">
        <a href="{{ route('dosen.index') }}" 
   class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition">Kembali</a>
        <button type="submit" 
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Simpan</button>
      </div>
    </form>
  </div>

</body>
</html>
