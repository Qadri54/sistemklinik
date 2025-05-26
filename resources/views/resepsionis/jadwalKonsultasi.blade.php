<x-layout-resepsionis>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <table class="min-w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2 text-left">Pasien</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Deskripsi</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Status Konsultasi</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Status Pembayaran</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Price</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consultations as $c)
                    <tr class="even:bg-gray-50 hover:bg-gray-100 transition">
                        <td class="px-4 py-3 border border-gray-300">
                            {{ $c->patient->user->name ?? '-' }}
                        </td>
                        <td class="px-4 py-3 border border-gray-300 truncate max-w-xs" title="{{ $c->description }}">
                            {{ \Illuminate\Support\Str::limit($c->description, 50) }}
                        </td>
                        <td class="px-4 py-3 border border-gray-300">
                            {{ $c->status_konsultasi }}
                        </td>
                        <td class="px-4 py-3 border border-gray-300">
                            {{ $c->status_pembayaran }}
                        </td>
                        <td class="px-4 py-3 border border-gray-300">
                            {{ $c->price }} 
                        </td>
                        <td class="px-4 py-3 border border-gray-300 text-center flex justify-center items-center space-x-2">
                            <form method="POST" action="{{ route('admin.consultations.delete', $c->id) }}"
                                style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin hapus?')"
                                    class="text-red-600 hover:text-red-900 font-semibold cursor-pointer bg-transparent border-none p-0">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-layout-resepsionis>