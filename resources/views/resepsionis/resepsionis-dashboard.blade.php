<x-layout-resepsionis>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Card 2 -->
        <a href="{{ route('dashboard.konsultasi') }}"
            class="bg-white rounded-xl shadow hover:bg-teal-50 p-6 border-l-4 border-teal-500 transition">
            <h2 class="text-lg font-bold mb-1">List Konsultasi</h2>
            <p class="text-sm text-gray-600">Semua daftar konsultasi</p>
        </a>

        <!-- Card 3 -->
        <a href="{{ route('dashboard.add.pasien') }}"
            class="bg-white rounded-xl shadow hover:bg-teal-50 p-6 border-l-4 border-teal-500 transition">
            <h2 class="text-lg font-bold mb-1">Tambah Pasien</h2>
            <p class="text-sm text-gray-600">Buat biodata pasien</p>
        </a>

        <!-- Card 4 -->
        <a href="{{ route('dashboard.view.scheduls') }}"
            class="bg-white rounded-xl shadow hover:bg-teal-50 p-6 border-l-4 border-teal-500 transition">
            <h2 class="text-lg font-bold mb-1">Buat Jadwal Konsultasi</h2>
            <p class="text-sm text-gray-600">Mencocokkan antara pasien dengan dokter</p>
        </a>

    </div>
</x-layout-resepsionis>