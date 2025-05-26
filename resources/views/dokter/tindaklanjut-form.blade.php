<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <title>Dashboard Dokter</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-gray-100 min-h-screen">

        <header class="bg-teal-700 text-white p-4 flex items-center justify-between">
            <h1 class="text-2xl font-semibold">Selamat datang dokter {{ Auth::user()->name }}</h1>
            <a type="submit" href="{{ route('logout') }}"
                class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded transition">
                Logout
            </a>
        </header>


        <main class="max-w-5xl mx-auto p-6">

            <section class="mb-8">
                <h2 class="text-xl font-bold mb-4">Hai, Dokter {{ Auth::user()->name }}</h2>
            </section>

            <section class="mb-8 bg-white rounded shadow p-6">
                <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow">
                    <h2 class="text-xl font-semibold mb-4">Tindak Lanjut Konsultasi</h2>

                    <form action="{{ route('dokter.tindaklanjut.update', $konsultasi->id) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block font-medium text-gray-700">Nama Pasien</label>
                            <input type="text" class="w-full border px-3 py-2 rounded bg-gray-100"
                                value="{{ $konsultasi->patient->user->name }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-gray-700">Keluhan</label>
                            <textarea class="w-full border px-3 py-2 rounded bg-gray-100"
                                readonly>{{ $konsultasi->description }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-gray-700">Diagnosis</label>
                            <textarea name="diagnosis" class="w-full border px-3 py-2 rounded"
                                required>{{ old('diagnosis', $konsultasi->diagnosis) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-gray-700">Status Konsultasi</label>
                            <select name="status_konsultasi" class="w-full border px-3 py-2 rounded">
                                <option value="belum dimulai" {{ $konsultasi->status_konsultasi == 'belum dimulai' ? 'selected' : '' }}>belum dimulai</option>
                                <option value="diproses" {{ $konsultasi->status_konsultasi == 'diproses' ? 'selected' : '' }}>diproses</option>
                                <option value="selesai" {{ $konsultasi->status_konsultasi == 'selesai' ? 'selected' : '' }}>selesai</option>
                            </select>
                        </div>

                         <div class="mb-4">
                            <label class="block font-medium text-gray-700">price</label>
                            <input type="text" name="price" class="w-full border px-3 py-2 rounded bg-gray-100" placeholder="masukkan harga yang sesuai"
                                >{{ $konsultasi->price }}</input>
                        </div>

                        <div class="text-right">
                            <a href="{{ route('dashboard.dokter') }}"
                                class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Kembali</a>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>

    </body>

</html>