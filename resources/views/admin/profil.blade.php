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
    <!-- <aside class="w-64 bg-blue-800 text-white flex flex-col">
      <div class="p-6 text-2xl font-bold border-b border-blue-700">
        📚 SIAKAD
      </div>
      <nav class="flex-1 p-4 space-y-3">
        <a href="dashboardadmin" class="block py-2 px-4 rounded hover:bg-blue-700">🏛️ Dashboard</a>
        <a href="{{ route('mahasiswa.index') }}" class="block py-2 px-4 rounded hover:bg-blue-700">🏫 Data Mahasiswa</a>
        <a href="data dosen" class="block py-2 px-4 rounded hover:bg-blue-700">👨‍🏫 Data Dosen</a>
        <a href="mata kuliah" class="block py-2 px-4 rounded hover:bg-blue-700">📖 Mata Kuliah</a>
        <a href="nilai" class="block py-2 px-4 rounded hover:bg-blue-700">📝 Nilai</a>
      </nav>
      <div class="p-4 border-t border-blue-700">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" 
              class="w-full block text-left bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg text-center">
              🚪 Logout
          </button>
        </form>
      </div>
    </aside> -->

<aside class="w-64 bg-blue-800 text-white flex flex-col fixed h-screen">
  <div class="p-6 text-2xl font-bold border-b border-blue-700">
    📚 SIAKAD
  </div>
  <nav class="flex-1 p-4 space-y-3">
    <a href="dashboardadmin" class="block py-2 px-4 rounded hover:bg-blue-700">🏛️ Dashboard</a>
    <a href="{{ route('mahasiswa.index') }}" class="block py-2 px-4 rounded hover:bg-blue-700">🏫 Data Mahasiswa</a>
    <a href="data dosen" class="block py-2 px-4 rounded hover:bg-blue-700">👨‍🏫 Data Dosen</a>
    <a href="mata kuliah" class="block py-2 px-4 rounded hover:bg-blue-700">📖 Mata Kuliah</a>
    <a href="nilai" class="block py-2 px-4 rounded hover:bg-blue-700">📝 Nilai</a>
  </nav>
  <div class="p-4 border-t border-blue-700">
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" 
          class="w-full block text-left bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg text-center">
          🚪 Logout
      </button>
    </form>
  </div>
</aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col ml-64">
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

      <!-- Profile Form -->
      <div class="min-h-screen w-full bg-gray-100 text-gray-900 overflow-y-auto p-6">

    {{-- Update Profile Information --}}
    <div class="p-6 bg-white shadow rounded-lg mb-8">
        <h2 class="text-lg font-bold">Profile Information</h2>
        <p class="mt-1 text-sm text-gray-600">
            Update your account's profile information and email address.
        </p>

        <form method="POST" action="{{ route('profile.update') }}" class="mt-6 space-y-4">
            @csrf
            @method('PATCH')

            {{-- Name --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input id="name" name="name" type="text"
                    value="{{ old('name', Auth::user()->name) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 text-gray-900 p-2 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email"
                    value="{{ old('email', Auth::user()->email) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 text-gray-900 p-2 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Save
            </button>
        </form>
    </div>

    {{-- Update Password --}}
    <div class="p-6 bg-white shadow rounded-lg mb-8">
        <h2 class="text-lg font-bold">Update Password</h2>
        <p class="mt-1 text-sm text-gray-600">
            Ensure your account is using a long, random password to stay secure.
        </p>

        <form method="POST" action="{{ route('password.update') }}" class="mt-6 space-y-4">
            @csrf
            @method('PUT')

            {{-- Current Password --}}
            <div>
                <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                <input id="current_password" name="current_password" type="password"
                    class="mt-1 block w-full rounded-md border-gray-300 text-gray-900 p-2 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- New Password --}}
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                <input id="password" name="password" type="password"
                    class="mt-1 block w-full rounded-md border-gray-300 text-gray-900 p-2 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Confirm Password --}}
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password"
                    class="mt-1 block w-full rounded-md border-gray-300 text-gray-900 p-2 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Save
            </button>
        </form>
    </div>

    {{-- Delete Account --}}
    <div class="p-6 bg-white shadow rounded-lg">
        <h2 class="text-lg font-bold">Delete Account</h2>
        <p class="mt-1 text-sm text-gray-600">
            Once your account is deleted, all of its resources and data will be permanently deleted.
        </p>

        <form method="POST" action="{{ route('profile.destroy') }}" class="mt-6">
            @csrf
            @method('DELETE')

            <button type="submit"
                onclick="return confirm('Are you sure you want to delete your account?')"
                class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                Delete Account
            </button>
        </form>
    </div>

</div>
      
    </div>
  </div>
</body>
</html>
