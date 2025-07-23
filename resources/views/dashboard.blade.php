<x-app-layout>
    <div class="py-8 px-6 sm:px-10 lg:px-16 bg-gray-100 min-h-screen">
        <div class="mb-8">
            <!-- Tambahkan mb-6 di sini -->
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard Presensi</h1>

            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 rounded-2xl p-6 shadow-md text-white">
                <h2 class="text-2xl font-semibold">Selamat Datang, {{ Auth::user()->name }} 👋</h2>
                <p class="mt-2 text-sm">Ini adalah halaman utama untuk mengelola data presensi dan pekerja.</p>
            </div>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card Jumlah Pekerja -->
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Jumlah Pekerja</p>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $jumlahPekerja }}</h3>
                    </div>
                    <div class="text-blue-500">
                        <x-heroicon-o-users class="w-8 h-8"/>
                    </div>
                </div>
            </div>

            <!-- Card Total Presensi -->
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Total Presensi</p>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $totalPresensi }}</h3>
                    </div>
                    <div class="text-green-500">
                        <x-heroicon-o-check-badge class="w-8 h-8"/>
                    </div>
                </div>
            </div>

            <!-- Card Total User -->
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Total User</p>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $totalUser }}</h3>
                    </div>
                    <div class="text-purple-500">
                        <x-heroicon-o-user-circle class="w-8 h-8"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
