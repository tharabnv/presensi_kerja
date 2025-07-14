<div class="p-10 bg-white rounded shadow">
    <h2 class="text-xl font-bold mb-4">Daftar Pekerja</h2>

    <div class="flex items-center space-x-2">
        <input type="text" wire:model.defer="searchInput" placeholder="Cari pekerja..." class="border p-2 rounded w-64">
        <button wire:click="cari" class="bg-blue-500 text-white px-3 py-1 rounded">Cari</button>
        <button wire:click="resetSearch" class="bg-gray-300 px-3 py-1 rounded">Reset</button>
    </div>

    <table class="w-full table-auto border">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-2 py-1">No</th>
                <th class="border px-2 py-1">Nama</th>
                <th class="border px-2 py-1">Nomor Pekerja</th>
                <th class="border px-2 py-1">Divisi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pekerjas as $index => $item)
                <tr>
                    <td class="border px-2 py-1 text-center">
                        {{ ($pekerjas->currentPage() - 1) * $pekerjas->perPage() + $index + 1 }}
                    </td>
                    <td class="border px-2 py-1">{{ $item->nama_pekerja }}</td>
                    <td class="border px-2 py-1 text-center">{{ $item->nomor_pekerja }}</td>
                    <td class="border px-2 py-1 text-center">{{ $item->divisi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $pekerjas->links() }}
    </div>
</div>
