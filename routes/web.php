<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Presensi\Index;
use App\Livewire\Presensi\Create;
use App\Livewire\Pekerja\Index as PekerjaIndex;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/presensi', Index::class)->name('presensi.index');
    Route::get('/presensi/create', Create::class)->name('presensi.create');
    Route::get('/pekerja', PekerjaIndex::class)->name('pekerja.index');
});
