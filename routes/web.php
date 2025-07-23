<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Presensi\Index;
use App\Livewire\Presensi\Create;
use App\Livewire\Pekerja\Index as PekerjaIndex;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use App\Http\Middleware\CheckEmail;

// Model untuk hitung jumlah
use App\Models\Pekerja;
use App\Models\Presensi;
use App\Models\User;

Route::get('/', function () {
    return view('landing');
});

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware(['guest', CheckEmail::class]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'jumlahPekerja' => Pekerja::count(),
            'totalPresensi' => Presensi::count(),
            'totalUser' => User::count(),
        ]);
    })->name('dashboard');

    Route::get('/presensi', Index::class)->name('presensi.index');
    Route::get('/presensi/create', Create::class)->name('presensi.create');
    Route::get('/pekerja', PekerjaIndex::class)->name('pekerja.index');
});
