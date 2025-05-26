<x-layout-dokter>
    <section class="mb-8">
        <h2 class="text-xl font-bold mb-4">Hai, Dokter {{ Auth::user()->name }}</h2>
        <p class="text-gray-700">Berikut adalah ringkasan jadwal dan konsultasi Anda.</p>
    </section>

    <section class="mb-8 bg-white rounded shadow p-6">
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <h3 class="text-lg font-semibold mb-3">Jadwal Konsultasi</h3>

        <table class="w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr class="bg-blue-100">
                    <th class="border border-gray-300 px-4 py-2 text-left">Tanggal</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Waktu</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Nama Pasien</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Aksi</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Status Pembayaran</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Price</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jadwalSemua as $jadwal)
                    <tr class="{{ $loop->even ? 'bg-gray-50' : '' }}">
                        <td class="border border-gray-300 px-4 py-2">
                            {{ \Carbon\Carbon::parse($jadwal->time)->format('Y-m-d') }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{ \Carbon\Carbon::parse($jadwal->time)->format('H:i') }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{ $jadwal->consultation->patient->user->name ?? '-' }}
                        </td>

                        <td class="border border-gray-300 px-4 py-2">
                            @if ($jadwal->consultation->status_konsultasi !== 'selesai')
                                <a href="{{ route('dokter.tindaklanjutedit.form', $jadwal->consultation->id) }}"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">
                                    Diagnosis
                                </a>
                            @else
                                <span class="text-gray-400 text-sm italic">Selesai</span>
                            @endif
                        </td>

                        <td
                            class="border border-gray-300 px-4 py-2 font-semibold 
                                                                {{ $jadwal->consultation->status_konsultasi === 'selesai' ? 'text-red-600' : 'text-green-600' }}">
                            {{ ucfirst($jadwal->consultation->status_konsultasi) }}
                        </td>

                        <td
                            class="border border-gray-300 px-4 py-2 font-semibold 
                                                                {{ $jadwal->consultation->status_pembayaran === 'paid' ? 'text-red-600' : 'text-green-600' }}">
                            {{ ucfirst($jadwal->consultation->status_pembayaran) }}
                        </td>

                        <td
                            class="border border-gray-300 px-4 py-2 font-semibold" >
                            {{ $jadwal->consultation->price }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="border border-gray-300 px-4 py-2 text-center text-gray-500">
                            Tidak ada jadwal konsultasi.
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </section>
</x-layout-dokter>