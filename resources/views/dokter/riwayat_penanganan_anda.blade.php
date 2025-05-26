<x-layout-dokter>
    <section class="mb-8">
        <h2 class="text-xl font-bold mb-4">Hai, Dokter {{ Auth::user()->name }}</h2>
        <p class="text-gray-700">Berikut adalah riwayat penanganan Anda.</p>
    </section>

    <section class="mb-8 bg-white rounded shadow p-6">
        <h3 class="text-lg font-semibold mb-3">History Penanganan</h3>

        <table class="w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr class="bg-blue-100">
                    <th class="border border-gray-300 px-4 py-2 text-left">Tanggal</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Waktu</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Nama Pasien</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Diagnosa</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jadwalSelesai as $jadwal)
                    <tr class="{{ $loop->even ? 'bg-gray-50' : '' }}">
                        <td class="border border-gray-300 px-4 py-2">
                            {{ \Carbon\Carbon::parse($jadwal->date)->format('Y-m-d') }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{ \Carbon\Carbon::parse($jadwal->time)->format('H:i') }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{ $jadwal->consultation->patient->user->name ?? '-' }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{ Str::limit($jadwal->consultation->diagnosis ?? '-', 50, '...') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="border border-gray-300 px-4 py-2 text-center text-gray-500">
                            Belum ada penanganan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>
</x-layout-dokter>