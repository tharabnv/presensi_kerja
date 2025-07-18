<div class="p-8 bg-white shadow rounded">
    <h2 class="text-xl font-bold mb-4">Data Presensi Pekerja</h2>

    <div class="flex items-center mb-6">
        {{-- Kiri: Pencarian dan Reset --}}
        <div class="flex items-center space-x-2">
            <input type="text" wire:model.defer="searchInput" placeholder="Cari pekerja..." class="border p-2 rounded w-64">
            <button wire:click="cari" class="bg-blue-500 text-white px-3 py-1 rounded">Cari</button>
            <button wire:click="resetSearch" class="bg-gray-300 px-3 py-1 rounded">Reset</button>
        </div>

        {{-- Kanan: Tombol Tambah Presensi --}}
        <a href="{{ route('presensi.create') }}" class="ml-auto bg-green-500 text-white px-4 py-2 rounded">
            Tambah Presensi
        </a>
    </div>

    <table class="w-full table-auto border">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-2 py-1 text-center">No</th>
                <th class="border px-2 py-1">Nama Pekerja</th>
                <th class="border px-2 py-1 text-center">Nomor Pekerja</th>
                <th class="border px-2 py-1 text-center">Waktu</th>
                <th class="border px-2 py-1 text-center">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($presensis as $item)
                @php
                    $jamPresensi = \Carbon\Carbon::parse($item->waktu_presensi);
                    $isLate = $item->keterangan === 'Masuk' && $jamPresensi->gt($jamPresensi->copy()->setTime(8, 0));
                @endphp
                <tr>
                    <td class="border px-2 py-1 text-center">
                        {{ $loop->iteration + ($presensis->currentPage() - 1) * $presensis->perPage() }}
                    </td>
                    <td class="border px-2 py-1">{{ $item->nama_pekerja }}</td>
                    <td class="border px-2 py-1 text-center">{{ $item->nomor_pekerja }}</td>
                    <td class="border px-2 py-1 text-center">
                        {{ $jamPresensi->format('d/m/Y H:i') }}
                    </td>
                    <td class="border px-2 py-1 text-center">
                        @if ($isLate)
                            <strong class="text-red-500">Masuk</strong>
                        @elseif ($item->keterangan === 'Masuk')
                            <strong>Masuk</strong>
                        @elseif ($item->keterangan === 'Sakit' || $item->keterangan === 'Izin')
                            <em>{{ $item->keterangan }}</em>
                        @else
                            {{ $item->keterangan }}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-12">
        {{ $presensis->links() }}
    </div>
</div>
