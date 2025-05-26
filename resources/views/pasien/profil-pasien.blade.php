<x-layoutpasien :nama="Auth::user()->name">
  <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6">

    <!-- Avatar -->
    <div
      class="w-24 h-24 bg-indigo-100 text-indigo-700 flex items-center justify-center text-3xl font-bold rounded-full">
      <img class="rounded-full" src="{{ asset('Storage/images/profile.jpg') }}" alt="profile">
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

  <script>
    function toggleModal() {
      document.getElementById('editModal').classList.toggle('hidden');
      document.getElementById('editModal').classList.toggle('flex');
    }
  </script>

</x-layoutpasien>