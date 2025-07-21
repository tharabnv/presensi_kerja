<div class="flex justify-center my-10">
    <div class="p-10 bg-white rounded shadow w-[500px]">
        <h2 class="text-xl font-bold mb-4 text-center">Tambah Presensi</h2>

        {{-- Alert pesan error --}}
        @if (session()->has('error'))
            <div class="bg-red-100 text-red-700 p-2 rounded mb-4 text-center">
                {{ session('error') }}
            </div>
        @endif

        {{-- Alert pesan sukses --}}
        @if (session()->has('success'))
            <div class="bg-green-100 text-green-700 p-2 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit.prevent="simpan">
            {{-- Nama Pekerja --}}
            <div class="mb-4">
                <label for="nama_pekerja" class="block font-semibold">Nama Pekerja</label>
                <input type="text" id="nama_pekerja" wire:model.defer="nama_pekerja" class="border p-2 w-full rounded bg-gray-100" readonly>
                @error('nama_pekerja') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            {{-- Nomor Pekerja --}}
            <div class="mb-4">
                <label for="nomor_pekerja" class="block font-semibold">Nomor Pekerja</label>
                <input type="text" id="nomor_pekerja" wire:model.defer="nomor_pekerja" class="border p-2 w-full rounded bg-gray-100" readonly>
                <small class="text-gray-500 text-sm">Contoh: NP****</small>
                @error('nomor_pekerja') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            {{-- Waktu Presensi (readonly tampilkan waktu server) --}}
            <div class="mb-4">
                <label class="block font-semibold">Waktu Presensi</label>
                <input type="text" class="border p-2 w-full rounded bg-gray-100" value="{{ now()->format('Y-m-d H:i') }}" readonly>
            </div>

            {{-- Keterangan --}}
            <div class="mb-4">
                <label for="keterangan" class="block font-semibold">Keterangan</label>
                <select id="keterangan" wire:model.defer="keterangan" class="border p-2 w-full rounded">
                    <option value="">-- Pilih --</option>
                    <option value="Masuk">Masuk</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Izin">Izin</option>
                </select>
                @error('keterangan') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end">
                <a href="{{ route('presensi.index') }}" class="mr-2 px-4 py-2 bg-gray-300 rounded">Batal</a>
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>
