<div class="flex justify-center my-10">
    <div class="p-10 bg-white rounded shadow w-[500px]">
        <h2 class="text-xl font-bold mb-4 text-center">Tambah Presensi</h2>

        @if (session()->has('success'))
            <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit.prevent="simpan">
            <div class="mb-4">
                <label for="nama_pekerja" class="block font-semibold">Nama Pekerja</label>
                <input type="text" id="nama_pekerja" wire:model.defer="nama_pekerja" class="border p-2 w-full rounded">
                @error('nama_pekerja') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="nomor_pekerja" class="block font-semibold">Nomor Pekerja</label>
                <input type="text" id="nomor_pekerja" wire:model.defer="nomor_pekerja" class="border p-2 w-full rounded">
                @error('nomor_pekerja') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="waktu_presensi" class="block font-semibold">Waktu Presensi</label>
                <input type="datetime-local" id="waktu_presensi" wire:model.defer="waktu_presensi" class="border p-2 w-full rounded">
                @error('waktu_presensi') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

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

            <div class="flex justify-end">
                <a href="{{ route('presensi.index') }}" class="mr-2 px-4 py-2 bg-gray-300 rounded">Batal</a>
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>
