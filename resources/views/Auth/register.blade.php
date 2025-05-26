<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Registrasi Pasien</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-gray-100 flex items-center justify-center min-h-screen">

        <div class="bg-white p-10 rounded shadow-md w-full max-w-4xl">
            <h2 class="text-3xl font-bold mb-8 text-center">Registrasi Pasien</h2>

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
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

                        <div class="mb-4">
                            <label for="birth_date" class="block font-semibold mb-1">Tanggal Lahir</label>
                            <input type="date" id="birth_date" name="birth_date" required
                                class="w-full border border-gray-300 px-3 py-2 rounded" />
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div>
                        <div class="mb-4">
                            <label for="alamat" class="block font-semibold mb-1">Alamat</label>
                            <input type="text" id="alamat" name="alamat" required
                                class="w-full border border-gray-300 px-3 py-2 rounded" />
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block font-semibold mb-1">Password</label>
                            <input type="password" id="password" name="password" required
                                class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="block font-semibold mb-1">Konfirmasi
                                Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required
                                class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="mt-6 w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition font-semibold">
                    Daftar
                </button>
            </form>

            <p class="mt-6 text-center text-sm text-gray-600">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login disini</a>
            </p>
            <p class="text-center text-sm text-gray-600">
                kembali ke halaman <a href="/" class="text-blue-600 hover:underline">sebelumnya</a>
            </p>
        </div>

    </body>

</html>