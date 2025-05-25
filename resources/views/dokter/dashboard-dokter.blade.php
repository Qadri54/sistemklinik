<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <title>Dashboard Dokter</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-gray-100 min-h-screen">

        <header class="bg-blue-600 text-white p-4 flex items-center justify-between">
            <h1 class="text-2xl font-semibold">Selamat datang dokter {{ Auth::user()->name }}</h1>
            <a type="submit" href="{{ route('logout') }}"
                class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded transition">
                Logout
            </a>
        </header>


        <main class="max-w-5xl mx-auto p-6">

            <section class="mb-8">
                <h2 class="text-xl font-bold mb-4">Hai, Dokter {{ Auth::user()->name }}</h2>
                <p class="text-gray-700">Berikut adalah ringkasan jadwal dan konsultasi Anda.</p>
            </section>

            <section class="mb-8 bg-white rounded shadow p-6">
                <h3 class="text-lg font-semibold mb-3">Jadwal Konsultasi</h3>

                <table class="w-full table-auto border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-blue-100">
                            <th class="border border-gray-300 px-4 py-2 text-left">Tanggal</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Waktu</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Nama Pasien</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
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
                                <td
                                    class="border border-gray-300 px-4 py-2 font-semibold 
                                {{ $jadwal->consultation->status_konsultasi === 'selesai' ? 'text-red-600' : 'text-green-600' }}">
                                    {{ ucfirst($jadwal->consultation->status_konsultasi) }}
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

            <section class="bg-white rounded shadow p-6">
                <h3 class="text-lg font-semibold mb-3">Daftar Konsultasi Baru</h3>

                @foreach ($konsultasiBaru as $konsultasi)
                    <div class="p-4 border border-gray-300 rounded">
                        <p><strong>Pasien:</strong> {{ $konsultasi->patient->user->name }}</p>
                        <p><strong>Keluhan:</strong> {{ $konsultasi->description }}</p>
                        <a href="{{ route('dokter.tindaklanjutedit.form', $konsultasi->id) }}"
                            class="mt-2 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Tindak Lanjut
                        </a>
                    </div>
                @endforeach
            </section>

        </main>

    </body>

</html>