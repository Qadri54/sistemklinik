<x-layout-resepsionis>
    <div class="container mx-auto px-4 py-6">
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('dashboard.create.pasien') }}">
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
    </div>
</x-layout-resepsionis>