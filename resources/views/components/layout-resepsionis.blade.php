<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8" />
        <title>Dashboard Resepsionis</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://unpkg.com/@heroicons/vue@2.0.16/dist/heroicons.min.js"></script>
    </head>

    <body class="bg-gray-100 text-gray-800">

        <div class="flex min-h-screen">
            <!-- Sidebar -->
            <aside class="bg-teal-700 text-white w-64 hidden md:block flex-shrink-0">
                <div class="p-6 text-2xl font-bold">Selamat datang {{ Auth::user()->name }}</div>
                <nav class="mt-6 space-y-2">
                    <a href="{{ route('dashboard.resepsionis') }}"
                        class="block hover:bg-teal-800 px-6 py-3 rounded"><svg xmlns="http://www.w3.org/2000/svg"
                            height="24px" viewBox="0 0 24 24" width="24px" class="inline" fill="#FFFFFF">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z" />
                        </svg>
                        Home</a>
                    <a href="{{ route('dashboard.view.scheduls') }}"
                        class="block px-6 py-3 hover:bg-teal-800 transition"><svg xmlns="http://www.w3.org/2000/svg"
                            enable-background="new 0 0 24 24" height="24px" class="inline" viewBox="0 0 24 24"
                            width="24px" fill="#FFFFFF">
                            <g>
                                <rect fill="none" height="24" width="24" />
                            </g>
                            <g>
                                <path
                                    d="M19,4h-1V2h-2v2H8V2H6v2H5C3.89,4,3.01,4.9,3.01,6L3,20c0,1.1,0.89,2,2,2h14c1.1,0,2-0.9,2-2V6C21,4.9,20.1,4,19,4z M19,20 H5V10h14V20z M9,14H7v-2h2V14z M13,14h-2v-2h2V14z M17,14h-2v-2h2V14z M9,18H7v-2h2V18z M13,18h-2v-2h2V18z M17,18h-2v-2h2V18z" />
                            </g>
                        </svg> buat konsultasi pasien</a>
                    <a href="{{ route('dashboard.view.pasien') }}"
                        class="block hover:bg-teal-800 px-6 py-3 rounded"><svg xmlns="http://www.w3.org/2000/svg"
                            height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF" class="inline">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg> Daftar Pasien</a>

                    <a href="{{ route('dashboard.konsultasi') }}" class="block hover:bg-teal-800 px-6 py-3 rounded"><svg
                            xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px"
                            viewBox="0 0 24 24" width="24px" fill="#FFFFFF" class="inline">
                            <rect fill="none" height="24" width="24" />
                            <path
                                d="M3,14h4v-4H3V14z M3,19h4v-4H3V19z M3,9h4V5H3V9z M8,14h13v-4H8V14z M8,19h13v-4H8V19z M8,5v4h13V5H8z" />
                        </svg>
                        </svg> List konsultasi</a>

                    <a href="{{ route('dashboard.add.pasien') }}" class="block hover:bg-teal-800 px-6 py-3 rounded"><svg
                            xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px"
                            class="inline" viewBox="0 0 24 24" width="24px" fill="#FFFFFF">
                            <g>
                                <rect fill="none" height="24" width="24" />
                            </g>
                            <g>
                                <path
                                    d="M13,8c0-2.21-1.79-4-4-4S5,5.79,5,8s1.79,4,4,4S13,10.21,13,8z M11,8c0,1.1-0.9,2-2,2S7,9.1,7,8s0.9-2,2-2S11,6.9,11,8z M1,18v2h16v-2c0-2.66-5.33-4-8-4S1,15.34,1,18z M3,18c0.2-0.71,3.3-2,6-2c2.69,0,5.78,1.28,6,2H3z M20,15v-3h3v-2h-3V7h-2v3h-3v2 h3v3H20z" />
                            </g>
                        </svg> Tambah Pasien</a>
                    <a href="{{ route('logout') }}" class="block hover:bg-teal-800 px-6 py-3 rounded"><svg
                            xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                            class="inline" fill="#FFFFFF">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z" />
                        </svg> Log Out</a>

                </nav>
            </aside>

            <!-- Main Content -->
            <div class="flex-1">
                <!-- Header -->
                <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
                    <h1 class="text-xl font-semibold text-gray-800">Halo {{ Auth::user()->name }}</h1>

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
                    <a href="{{ route('dashboard.resepsionis') }}"
                        class="block hover:bg-teal-800 px-4 py-2 rounded"><svg xmlns="http://www.w3.org/2000/svg"
                            height="24px" viewBox="0 0 24 24" width="24px" class="inline" fill="#FFFFFF">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z" />
                        </svg>
                        Home</a>
                    <a href="{{ route('dashboard.view.scheduls') }}"
                        class="block hover:bg-teal-800 px-4 py-2 rounded"><svg xmlns="http://www.w3.org/2000/svg"
                            enable-background="new 0 0 24 24" height="24px" class="inline" viewBox="0 0 24 24"
                            width="24px" fill="#FFFFFF">
                            <g>
                                <rect fill="none" height="24" width="24" />
                            </g>
                            <g>
                                <path
                                    d="M19,4h-1V2h-2v2H8V2H6v2H5C3.89,4,3.01,4.9,3.01,6L3,20c0,1.1,0.89,2,2,2h14c1.1,0,2-0.9,2-2V6C21,4.9,20.1,4,19,4z M19,20 H5V10h14V20z M9,14H7v-2h2V14z M13,14h-2v-2h2V14z M17,14h-2v-2h2V14z M9,18H7v-2h2V18z M13,18h-2v-2h2V18z M17,18h-2v-2h2V18z" />
                            </g>
                        </svg>
                        buat konsultasi pasien</a>
                    <a href="{{ route('dashboard.view.pasien') }}"
                        class="block hover:bg-teal-800 px-4 py-2 rounded"><svg xmlns="http://www.w3.org/2000/svg"
                            height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF" class="inline">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg> Daftar Pasien</a>

                    <a href="{{ route('dashboard.konsultasi') }}" class="block hover:bg-teal-800 px-4 py-4 rounded"><svg
                            xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px"
                            viewBox="0 0 24 24" width="24px" fill="#FFFFFF" class="inline">
                            <rect fill="none" height="24" width="24" />
                            <path
                                d="M3,14h4v-4H3V14z M3,19h4v-4H3V19z M3,9h4V5H3V9z M8,14h13v-4H8V14z M8,19h13v-4H8V19z M8,5v4h13V5H8z" />
                        </svg>
                        </svg> List konsultasi</a>
                    <a href="{{ route('dashboard.add.pasien') }}" class="block hover:bg-teal-800 px-4 py-2 rounded"><svg
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
                    <a href="" class="block hover:bg-teal-800 px-4 py-2 rounded"><svg xmlns="http://www.w3.org/2000/svg"
                            height="24px" viewBox="0 0 24 24" width="24px" class="inline" fill="#FFFFFF">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z" />
                        </svg> Log Out</a>
                </div>

                <!-- Main Body -->
                <main class="p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>

    </body>

</html>