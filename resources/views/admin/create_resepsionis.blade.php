<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8" />
        <title>Dashboard Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://unpkg.com/@heroicons/vue@2.0.16/dist/heroicons.min.js"></script>
    </head>

    <body class="bg-gray-100 text-gray-800">

        <div class="flex min-h-screen">
            <!-- Sidebar -->
            <aside class="bg-teal-700 text-white w-64 hidden md:block flex-shrink-0">
                <div class="p-6 text-2xl font-bold">Selamat datang admin {{ Auth::user()->name }}</div>
                <nav class="mt-6 space-y-2">
                    <a href="{{ route('dashboard.admin') }}" class="block hover:bg-teal-800 px-6 py-3 rounded">🏠
                        Home</a>
                    <a href="{{ route('admin.view.scheduls') }}"
                        class="block px-6 py-3 hover:bg-teal-800 transition">🗓️ buat jadwal Konsultasi </a>
                    <a href="{{ route('admin.patients') }}" class="block hover:bg-teal-800 px-6 py-3 rounded"><svg
                            xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                            fill="#FFFFFF" class="inline">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg> Daftar Pasien</a>

                    <a href="{{ route('admin.consultations') }}" class="block hover:bg-teal-800 px-6 py-3 rounded"><svg
                            xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px"
                            viewBox="0 0 24 24" width="24px" fill="#FFFFFF" class="inline">
                            <rect fill="none" height="24" width="24" />
                            <path
                                d="M3,14h4v-4H3V14z M3,19h4v-4H3V19z M3,9h4V5H3V9z M8,14h13v-4H8V14z M8,19h13v-4H8V19z M8,5v4h13V5H8z" />
                        </svg>
                        </svg> List konsultasi</a>

                    <a href="{{ route('admin.doctors') }}" class="block hover:bg-teal-800 px-6 py-3 rounded"><svg
                            xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                            fill="#FFFFFF" class="inline">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg> Daftar Dokter</a>

                    <a href="{{ route('admin.create.doctors') }}" class="block hover:bg-teal-800 px-6 py-3 rounded"><svg
                            xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px"
                            class="inline" viewBox="0 0 24 24" width="24px" fill="#FFFFFF">
                            <g>
                                <rect fill="none" height="24" width="24" />
                            </g>
                            <g>
                                <path
                                    d="M13,8c0-2.21-1.79-4-4-4S5,5.79,5,8s1.79,4,4,4S13,10.21,13,8z M11,8c0,1.1-0.9,2-2,2S7,9.1,7,8s0.9-2,2-2S11,6.9,11,8z M1,18v2h16v-2c0-2.66-5.33-4-8-4S1,15.34,1,18z M3,18c0.2-0.71,3.3-2,6-2c2.69,0,5.78,1.28,6,2H3z M20,15v-3h3v-2h-3V7h-2v3h-3v2 h3v3H20z" />
                            </g>
                        </svg> Tambah Dokter</a>

                    <a href="{{ route('dashboard.view.resepsionis') }}"
                        class="block hover:bg-teal-800 px-6 py-3 rounded"><svg xmlns="http://www.w3.org/2000/svg"
                            enable-background="new 0 0 24 24" height="24px" class="inline" viewBox="0 0 24 24"
                            width="24px" fill="#FFFFFF">
                            <g>
                                <rect fill="none" height="24" width="24" />
                            </g>
                            <g>
                                <path
                                    d="M13,8c0-2.21-1.79-4-4-4S5,5.79,5,8s1.79,4,4,4S13,10.21,13,8z M11,8c0,1.1-0.9,2-2,2S7,9.1,7,8s0.9-2,2-2S11,6.9,11,8z M1,18v2h16v-2c0-2.66-5.33-4-8-4S1,15.34,1,18z M3,18c0.2-0.71,3.3-2,6-2c2.69,0,5.78,1.28,6,2H3z M20,15v-3h3v-2h-3V7h-2v3h-3v2 h3v3H20z" />
                            </g>
                        </svg> Tambah resepsionis</a>
                    <a href="{{ route('logout') }}" class="block hover:bg-teal-800 px-6 py-3 rounded">🚪 Log Out</a>

                </nav>
            </aside>

            <!-- Main Content -->
            <div class="flex-1">
                <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
                    <h1 class="text-xl font-semibold text-gray-800">Dashboard admin</h1>

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
                    <a href="{{ route('dashboard.admin') }}" class="block hover:bg-teal-800 px-4 py-2 rounded">🏥
                        Home</a>
                    <a href="{{ route('admin.view.scheduls') }}" class="block hover:bg-teal-800 px-4 py-2 rounded">🏥
                        buat jadwal Konsultasi</a>
                    <a href="{{ route('admin.patients') }}" class="block hover:bg-teal-800 px-4 py-2 rounded"><svg
                            xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                            fill="#FFFFFF" class="inline">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg> Daftar Pasien</a>

                    <a href="{{ route('admin.consultations') }}" class="block hover:bg-teal-800 px-4 py-4 rounded"><svg
                            xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px"
                            viewBox="0 0 24 24" width="24px" fill="#FFFFFF" class="inline">
                            <rect fill="none" height="24" width="24" />
                            <path
                                d="M3,14h4v-4H3V14z M3,19h4v-4H3V19z M3,9h4V5H3V9z M8,14h13v-4H8V14z M8,19h13v-4H8V19z M8,5v4h13V5H8z" />
                        </svg>
                        </svg> List konsultasi</a>

                    <a href="{{ route('admin.doctors') }}" class="block hover:bg-teal-800 px-4 py-2 rounded"><svg
                            xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                            fill="#FFFFFF" class="inline">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg> Daftar Dokter</a>
                    <a href="{{ route('admin.create.doctors') }}" class="block hover:bg-teal-800 px-4 py-2 rounded"><svg
                            xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px"
                            class="inline" viewBox="0 0 24 24" width="24px" fill="#FFFFFF">
                            <g>
                                <rect fill="none" height="24" width="24" />
                            </g>
                            <g>
                                <path
                                    d="M13,8c0-2.21-1.79-4-4-4S5,5.79,5,8s1.79,4,4,4S13,10.21,13,8z M11,8c0,1.1-0.9,2-2,2S7,9.1,7,8s0.9-2,2-2S11,6.9,11,8z M1,18v2h16v-2c0-2.66-5.33-4-8-4S1,15.34,1,18z M3,18c0.2-0.71,3.3-2,6-2c2.69,0,5.78,1.28,6,2H3z M20,15v-3h3v-2h-3V7h-2v3h-3v2 h3v3H20z" />
                            </g>
                        </svg> Tambah Dokter</a>

                    <a href="{{ route('dashboard.view.resepsionis') }}"
                        class="block hover:bg-teal-800 px-4 py-2 rounded"><svg xmlns="http://www.w3.org/2000/svg"
                            enable-background="new 0 0 24 24" height="24px" class="inline" viewBox="0 0 24 24"
                            width="24px" fill="#FFFFFF">
                            <g>
                                <rect fill="none" height="24" width="24" />
                            </g>
                            <g>
                                <path
                                    d="M13,8c0-2.21-1.79-4-4-4S5,5.79,5,8s1.79,4,4,4S13,10.21,13,8z M11,8c0,1.1-0.9,2-2,2S7,9.1,7,8s0.9-2,2-2S11,6.9,11,8z M1,18v2h16v-2c0-2.66-5.33-4-8-4S1,15.34,1,18z M3,18c0.2-0.71,3.3-2,6-2c2.69,0,5.78,1.28,6,2H3z M20,15v-3h3v-2h-3V7h-2v3h-3v2 h3v3H20z" />
                            </g>
                        </svg> Tambah resepsionis</a>
                    <a href="" class="block hover:bg-teal-800 px-4 py-2 rounded">🚪 Log Out</a>
                </div>

                <div class="container mx-auto px-4 py-6">
                    @if (session('success'))
                        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('admin.create.doctors') }}">
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <!-- Kolom Kiri -->
                            <div>
                                <div class="mb-4">
                                    <label for="name" class="block font-semibold mb-1">Nama Lengkap</label>
                                    <input type="text" id="name" name="name" required autofocus
                                        class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                </div>

                                <div class="mb-4">
                                    <label for="email" class="block font-semibold mb-1">Email</label>
                                    <input type="email" id="email" name="email" required
                                        class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div>
                                <div class="mb-4">
                                    <label for="password" class="block font-semibold mb-1">Password</label>
                                    <input type="password" id="password" name="password" required
                                        class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                </div>

                                <div class="mb-4">
                                    <label for="password_confirmation" class="block font-semibold mb-1">Konfirmasi
                                        Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        required
                                        class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                </div>
                            </div>
                        </div>

                        <button type="submit"
                            class="mt-6 w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition font-semibold">
                            Daftar
                        </button>
                    </form>
                </div>
            </div>

        </div>

    </body>

</html>