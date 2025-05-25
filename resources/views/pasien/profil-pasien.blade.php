<!DOCTYPE html>
<html lang="id">

  <head>
    <meta charset="UTF-8" />
    <title>Dashboard Pasien</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@heroicons/vue@2.0.16/dist/heroicons.min.js"></script>
  </head>

  <body class="bg-gray-100 text-gray-800">

    <div class="flex min-h-screen">

      <!-- Sidebar -->
      <aside class="bg-teal-700 text-white w-64 hidden md:block flex-shrink-0">
        <div class="p-6 text-2xl font-bold">Selamat datang {{ $patient->name }}</div>
        <nav class="mt-6 space-y-2">
          <a href="{{ route('dashboard.pasien') }}" class="block hover:bg-teal-800 px-6 py-3 rounded">🏠
            Home</a>
          <a href="{{ route('jadwal.konsultasi') }}" class="block px-6 py-3 hover:bg-teal-800 transition">🗓️ Jadwal
            Rekam Medis</a>
          <a href="{{ route('konsultasi.pasien') }}" class="block px-6 py-3 hover:bg-teal-800 transition">💬
            Buat
            Konsultasi Baru</a>
          <a href="{{ route('pembayaran.pasien') }}" class="block px-6 py-3 hover:bg-teal-800 transition">💬
            Pembayaran</a>
          <a href="{{ route('profil.pasien') }}" class="block hover:bg-teal-800 px-6 py-3 rounded"><svg
              xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"
              class="inline">
              <path d="M0 0h24v24H0z" fill="none" />
              <path
                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
            </svg> Profil Pasien</a>
          <a href="{{ route('logout') }}" class="block hover:bg-teal-800 px-6 py-3 rounded">🚪 Log Out</a>

        </nav>
      </aside>

      <!-- Main Content -->
      <div class="flex-1">
        <!-- Header -->
        <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
          <h1 class="text-xl font-semibold text-gray-800">Profil {{ $patient->name }}</h1>

          <!-- Mobile Menu Button -->
          <div class="md:hidden">
            <button onclick="document.getElementById('mobileMenu').classList.toggle('hidden')" class="text-gray-700">
              ☰
            </button>
          </div>
        </header>

        <!-- Mobile Sidebar -->
        <div id="mobileMenu" class="md:hidden bg-teal-700 text-white px-4 py-4 space-y-2 hidden">
          <a href="{{ route('dashboard.pasien') }}" class="block hover:bg-teal-800 px-4 py-2 rounded">🏥 Home</a>
          <a href="" class="block hover:bg-teal-800 px-4 py-2 rounded">🏥 Jadwal Rekam Medis</a>
          <a href="#" class="block hover:bg-teal-800 px-4 py-2 rounded">🗓️ Jadwal Konsultasi</a>
          <a href="{{ route('konsultasi.pasien') }}" class="block hover:bg-teal-800 px-4 py-2 rounded">💬 Buat
            Konsultasi Baru</a>
          <a href="{{ route('profil.pasien') }}" class="block hover:bg-teal-800 px-4 py-2 rounded"><svg
              xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"
              class="inline">
              <path d="M0 0h24v24H0z" fill="none" />
              <path
                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
            </svg> Profil Pasien</a>
          <a href="{{ route('logout') }}" class="block hover:bg-teal-800 px-4 py-2 rounded">🚪 Log Out</a>
        </div>

        <!-- Main Body -->
        <main class="p-6">
          <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6">

            <!-- Avatar -->
            <div
              class="w-24 h-24 bg-indigo-100 text-indigo-700 flex items-center justify-center text-3xl font-bold rounded-full">
              <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill=#000000""
                class="inline">
                <path d="M0 0h24v24H0z" fill="none" />
                <path
                  d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
              </svg>
            </div>


            <!-- Info Pasien -->
            <div class="flex-1">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                  <label class="text-sm text-gray-500">Nama Lengkap</label>
                  <p class="font-semibold">{{ $patient->name }}</p>
                </div>

                <div>
                  <label class="text-sm text-gray-500">Email</label>
                  <p class="font-semibold">{{$patient->user->email}}</p>
                </div>

                <div>
                  <label class="text-sm text-gray-500">Tanggal Lahir</label>
                  <p class="font-semibold">{{ $patient->birth_date }}</p>
                </div>

                <div>
                  <label class="text-sm text-gray-500">Tipe Konsultasi</label>
                  <p class="font-semibold">{{$patient->tipe}}</p>
                </div>

                <div class="md:col-span-2">
                  <label class="text-sm text-gray-500">Alamat</label>
                  <p class="font-semibold">{{ $patient->address }}</p>
                </div>

              </div>
            </div>
          </div>

          <!-- Edit Button -->
          <div class="mt-8 text-right">
            <button onclick="toggleModal()"
              class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg transition">
              Edit Profil
            </button>
          </div>
      </div>
      </main>
    </div>
    </div>


    <!-- Modal -->
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
      <div class="bg-white rounded-2xl shadow-lg w-full max-w-xl p-8 space-y-6">

        <!-- Header -->
        <div class="flex justify-between items-center border-b pb-4">
          <h2 class="text-xl font-semibold text-gray-800">Edit Profil Pasien</h2>
          <button onclick="toggleModal()" class="text-gray-400 hover:text-gray-600 text-xl">&times;</button>
        </div>

        <!-- Form -->
        <form action="{{ route('profil-pasien.update') }}" method="POST" class="space-y-5">
          @csrf
          @method('PUT')

          <!-- Nama Lengkap -->
          <div>
            <label for="name" class="block text-sm font-medium text-gray-600">Nama Lengkap</label>
            <input type="text" name="name" id="name" value="{{ $patient->name }}" required
              class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm" />
          </div>

          <!-- Tanggal Lahir -->
          <div>
            <label for="birth_date" class="block text-sm font-medium text-gray-600">Tanggal Lahir</label>
            <input type="date" name="birth_date" id="birth_date" value="{{ $patient->birth_date }}" required
              class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm" />
          </div>

          <!-- Alamat -->
          <div>
            <label for="address" class="block text-sm font-medium text-gray-600">Alamat</label>
            <textarea name="address" id="address" rows="3"
              class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm resize-none">{{ $patient->address }}</textarea>
          </div>

          <!-- Email -->
          <div>
            <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
            <input type="email" name="email" id="email" rows="3"
              class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm resize-none"
              value="{{ $patient->user->email }}">
          </div>

          <!-- Tipe Konsultasi -->
          <div>
            <label for="tipe" class="block text-sm font-medium text-gray-600">Tipe Konsultasi</label>
            <select name="tipe" id="tipe"
              class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
              <option value="online" {{ $patient->tipe === 'online' ? 'selected' : '' }}>Online</option>
              <option value="offline" {{ $patient->tipe === 'offline' ? 'selected' : '' }}>Offline</option>
            </select>
          </div>

          <!-- Tombol Aksi -->
          <div class="flex justify-end space-x-3 pt-4 border-t">
            <button type="button" onclick="toggleModal()"
              class="px-4 py-2 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 text-sm">Batal</button>
            <button type="submit"
              class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium shadow-sm transition">Simpan
              Perubahan</button>
          </div>
        </form>
      </div>
    </div>




  </body>

  <script>
    function toggleModal() {
      document.getElementById('editModal').classList.toggle('hidden');
      document.getElementById('editModal').classList.toggle('flex');
    }
  </script>


</html>