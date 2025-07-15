<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Presensi
        </h2>
    </x-slot>

    <div class="mt-6 px-6">
        <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl shadow-lg p-8 text-white">
            <h1 class="text-3xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }} 👋</h1>
            <p class="text-lg">Ini adalah halaman utama untuk mengelola data presensi dan pekerja.</p>
        </div>
    </div>

    <div class="py-10 px-6 max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {{-- Total Pekerja --}}
            <div class="bg-white p-6 rounded-xl shadow border border-gray-100">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-sm font-semibold text-gray-500">Jumlah Pekerja</h3>
                    <x-heroicon-o-users class="w-6 h-6 text-blue-500" />
                </div>
                <p class="text-3xl font-bold text-gray-800">{{ \App\Models\Pekerja::count() }}</p>
            </div>

            {{-- Total Presensi --}}
            <div class="bg-white p-6 rounded-xl shadow border border-gray-100">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-sm font-semibold text-gray-500">Total Presensi</h3>
                    <x-heroicon-o-clipboard-document-check class="w-6 h-6 text-green-500" />
                </div>
                <p class="text-3xl font-bold text-gray-800">{{ \App\Models\Presensi::count() }}</p>
            </div>

            {{-- Total User --}}
            <div class="bg-white p-6 rounded-xl shadow border border-gray-100">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-sm font-semibold text-gray-500">Total User</h3>
                    <x-heroicon-o-user-group class="w-6 h-6 text-purple-500" />
                </div>
                <p class="text-3xl font-bold text-gray-800">{{ \App\Models\User::count() }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
