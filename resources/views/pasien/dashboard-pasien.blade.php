    <x-layoutpasien :nama="Auth::user()->name">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Card 1 -->
            <a href="{{ route('jadwal.konsultasi') }}"
                class="bg-white rounded-xl shadow hover:bg-teal-50 p-6 border-l-4 border-teal-500 transition">
                <h2 class="text-lg font-bold mb-1">Jadwal Rekam Medis</h2>
                <p class="text-sm text-gray-600">Lihat catatan dan hasil medis Anda</p>
            </a>

            <!-- Card 3 -->
            <a href="{{ route('buatjanji') }}"
                class="bg-white rounded-xl shadow hover:bg-teal-50 p-6 border-l-4 border-teal-500 transition">
                <h2 class="text-lg font-bold mb-1">Buat Janji</h2>
                <p class="text-sm text-gray-600">Buat janji dengan dokter</p>
            </a>

        </div>
    </x-layoutpasien>