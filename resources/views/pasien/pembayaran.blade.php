<x-layoutpasien :nama="Auth::user()->name">
    <h1 class="text-2xl font-semibold mb-6">Konsultasi Anda</h1>

    <table class="min-w-full border border-gray-200 rounded-md">
        <thead class="bg-gray-100">
            <tr>
                <th class="border border-gray-300 px-4 py-2 text-left">Pasien</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Deskripsi</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Status Konsultasi</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Status Pembayaran</th>
                <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
                <tr class="even:bg-gray-50 hover:bg-gray-100 transition">
                    <td class="border border-gray-300 px-4 py-2">
                        {{ $payment->consultation->patient->user->name ?? '-' }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 max-w-xs truncate"
                        title="{{ $payment->consultation->description }}">
                        {{ $payment->consultation->description }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        {{ $payment->consultation->status_konsultasi }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ ucfirst($payment->status) }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <form action="{{ route('bayar.pasien', $payment->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin membayar konsultasi ini?')">
                            @csrf
                            <button type="submit"
                                class="px-3 py-1 text-white rounded transition
                                                    {{ $payment->status === 'paid' ? 'bg-gray-400 cursor-not-allowed' : 'bg-blue-600 hover:bg-blue-700' }}"
                                {{ $payment->status === 'paid' ? 'disabled' : '' }}>
                                {{ $payment->status === 'paid' ? 'Sudah Dibayar' : 'Bayar' }}
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</x-layoutpasien>