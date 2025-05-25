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
                    <a href="{{ route('jadwal.konsultasi') }}" class="block px-6 py-3 hover:bg-teal-800 transition">🗓️
                        Jadwal Rekam Medis</a>
                    <a href="{{ route('konsultasi.pasien') }}" class="block px-6 py-3 hover:bg-teal-800 transition">💬
                        Buat
                        Konsultasi Baru</a>
                    <a href="{{ route('pembayaran.pasien') }}" class="block px-6 py-3 hover:bg-teal-800 transition">💬
                        Pembayaran</a>
                    <a href="{{ route('profil.pasien') }}" class="block hover:bg-teal-800 px-6 py-3 rounded"><svg
                            xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                            fill="#FFFFFF" class="inline">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg> Profil Pasien</a>
                    <a href="{{ route('logout') }}" class="block hover:bg-teal-800 px-6 py-3 rounded">🚪 Log Out</a>

                </nav>
            </aside>

            <!-- Main Content -->
            <div class="flex-1 p-5">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Rekam Medis</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-2">
                    @forelse ($patient->consultations as $consultation)
                        <div class="bg-white border rounded-xl shadow-sm p-4 hover:shadow-md transition-all duration-200">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm text-gray-500">{{ $consultation->created_at->format('d M Y') }}</span>
                                <span
                                    class="px-2 py-0.5 rounded-full text-xs font-semibold 
                                                                {{ $consultation->status_konsultasi === 'selesai' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ ucfirst($consultation->status_konsultasi) }}
                                </span>
                            </div>

                            <div class="text-sm text-gray-700 mb-1">
                                <span class="font-medium">Keluhan:</span> {{ $consultation->description }}
                            </div>
                            <div class="text-sm text-gray-700 mb-1">
                                <span class="font-medium">Diagnosis:</span> {{ $consultation->diagnosis ?? '-' }}
                            </div>
                            <div class="text-sm text-gray-700 mb-1">
                                <span class="font-medium">Tanggal:</span>  {{ $consultation->schedule->date ?? '-' }} 
                            </div>
                            <div class="text-sm text-gray-700 mb-1">
                                <span class="font-medium">Jam:</span> {{ $consultation->schedule->time ?? '-'}} 
                            </div>
                            <div class="text-sm text-gray-700 mb-1">
                                <span
                                    class="font-medium py-0.5 rounded-full text-xs font-semibold
                                                {{ $consultation->payment->status === 'paid' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ ucfirst($consultation->payment->status) }}
                                </span>
                            </div>

                        </div>
                    @empty
                        <p class="text-gray-500 text-sm col-span-full">Belum ada jadwal konsultasi.</p>
                    @endforelse
                </div>
            </div>
    </body>

</html>