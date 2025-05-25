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
            <div class="flex-1">
                <!-- Header -->
                <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
                    <h1 class="text-xl font-semibold text-gray-800">Konsultasikan keluhan anda</h1>

                    <!-- Mobile Menu Button -->
                    <div class="md:hidden">
                        <button onclick="document.getElementById('mobileMenu').classList.toggle('hidden')"
                            class="text-gray-700">
                            ☰
                        </button>
                    </div>
                </header>

                <!-- Mobile Sidebar -->
                <div id="mobileMenu" class="md:hidden bg-teal-700 text-white px-4 py-4 space-y-2 hidden">
                    <a href="{{ route('dashboard.pasien') }}" class="block hover:bg-teal-800 px-4 py-2 rounded">🏥
                        Home</a>
                    <a href="#" class="block hover:bg-teal-800 px-4 py-2 rounded">🏥 Jadwal Rekam Medis</a>
                    <a href="#" class="block hover:bg-teal-800 px-4 py-2 rounded">🗓️ Jadwal Konsultasi</a>
                    <a href="{{ route('konsultasi.pasien') }}" class="block hover:bg-teal-800 px-4 py-2 rounded">💬 Buat
                        Konsultasi Baru</a>
                    <a href="{{ route('pembayaran.pasien') }}" class="block px-6 py-3 hover:bg-teal-800 transition">💬
                        Pembayaran</a>
                    <a href="{{ route('profil.pasien') }}" class="block hover:bg-teal-800 px-4 py-2 rounded"><svg
                            xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                            fill="#FFFFFF" class="inline">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg> Profil Pasien</a>
                    <a href="{{ route('logout') }}" class="block hover:bg-teal-800 px-4 py-2 rounded">🚪 Log Out</a>
                </div>

                <!-- Main Body -->
                <main class="p-6">

                    @if (session('success'))
                        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="bg-white p-6 rounded-xl shadow-md max-w-2xl mx-auto">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Form Konsultasi</h2>

                        <form action="{{ route('konsultasi-pasien') }}" method="POST" class="space-y-6">
                            @csrf
                            <!-- Keluhan -->
                            <div>
                                <label for="keluhan" class="block text-sm font-medium text-gray-700">Keluhan</label>
                                <textarea id="keluhan" name="keluhan" rows="5" required
                                    class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm p-2 outline-none"></textarea>
                            </div>

                            <!-- Tombol Submit -->
                            <div>
                                <button type="submit"
                                    class="bg-teal-600 hover:bg-teal-700 text-white font-semibold px-6 py-2 rounded-md transition">
                                    Kirim Konsultasi
                                </button>
                            </div>
                        </form>
                    </div>
                </main>

            </div>
        </div>

    </body>

</html>