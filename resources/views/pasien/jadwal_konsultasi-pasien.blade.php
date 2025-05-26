<x-layoutpasien :nama="Auth::user()->name">
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
                        <span class="font-medium">Tanggal:</span> {{ $consultation->schedule->date ?? '-' }}
                    </div>
                    <div class="text-sm text-gray-700 mb-1">
                        <span class="font-medium">Jam:</span> {{ $consultation->schedule->time ?? '-'}}
                    </div>
                    <div class="text-sm text-gray-700 mb-1">
                        <span class="font-medium">Dokter:</span> {{ $consultation->schedule->doctor->name ?? '-'}}
                    </div>
                    <div class="text-sm text-gray-700 mb-1">
                        <span class="font-medium">price:</span> {{ $consultation->price ?? '-'}}
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
                <p class="text-gray-500 text-sm col-span-full">Belum ada rekam medis.</p>
            @endforelse
        </div>
    </div>
</x-layoutpasien>