<x-layout-resepsionis>
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <div class="mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Daftar Pasien</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded shadow text-left">
                <thead>
                    <tr class="bg-blue-900 text-white">
                        <th class="py-3 px-4">No</th>
                        <th class="py-3 px-4">Nama</th>
                        <th class="py-3 px-4">Tanggal Lahir</th>
                        <th class="py-3 px-4">Email</th>
                        <th class="py-3 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patients as $index => $patient)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="py-2 px-4">{{ $index + 1 }}</td>
                            <td class="py-2 px-4">{{ $patient->name }}</td>
                            <td class="py-2 px-4">{{ $patient->birth_date }}</td>
                            <td class="py-2 px-4">{{ $patient->user->email ?? '-' }}</td>
                            <td class="py-2 px-4 flex gap-2">
                                <form action="{{ route('admin.delete.patients', $patient->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus pasien ini?')">
                                    @csrf
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout-resepsionis>