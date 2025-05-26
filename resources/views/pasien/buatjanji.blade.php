<x-layoutpasien :nama="Auth::user()->name">
        <!-- Header -->
            <h1 class="text-xl font-semibold text-gray-800">Konsultasikan keluhan anda</h1>

        <!-- Main Body -->
        <main class="p-6">

            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white p-6 rounded-xl shadow-md max-w-2xl mx-auto">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Buat Janji</h2>

                <form action="{{ route('konsultasi-pasien-online') }}" method="POST" class="space-y-6">
                    @csrf
                    <!-- Keluhan -->
                    <div class="mb-5">
                        <label for="keluhan" class="block text-sm font-medium text-gray-700">Keluhan Anda</label>
                        <textarea id="keluhan" name="keluhan" rows="5" required
                            class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm p-2 outline-none"></textarea>
                    </div>

                    <!-- Dokter -->
                    <div class="mb-5">
                        <label for="dokter_id" class="block text-sm font-medium text-gray-700">Daftar Dokter</label>
                        <select id="dokter_id" name="dokter_id" required
                            class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm p-2 outline-none">
                            <option value="" disabled selected>Pilih Dokter</option>
                            @foreach ($doctors as $dokter)
                                <option value="{{ $dokter->id }}">{{ $dokter->name }} -- dokter {{ $dokter->specialization }} -- {{ $dokter->id }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- tanggal -->
                     <div class="mb-5">
                        <label for="tanggal" class="block text-sm font-medium text-gray-700">Pilih Tanggal</label>
                        <input type="date" id="jadwal" name="tanggal" required
                            class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm p-2 outline-none">
                    </div>

                    <!-- waktu -->
                     <div class="mb-5">
                        <label for="jadwal" class="block text-sm font-medium text-gray-700">Buat Jadwal</label>
                        <input type="time" id="jadwal" name="jadwal" required 
                            class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm p-2 outline-none">
                    </div>

                    <!-- Tombol Submit -->
                    <div>
                        <button type="submit"
                            class="bg-teal-600 hover:bg-teal-700 text-white font-semibold px-6 py-2 rounded-md transition">
                            Buat Janji
                        </button>
                    </div>
                </form>
            </div>
        </main>
</x-layoutpasien>