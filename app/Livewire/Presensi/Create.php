<?php

namespace App\Livewire\Presensi;

use Livewire\Component;
use App\Models\Presensi;
use App\Models\Pekerja;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public $nama_pekerja;
    public $nomor_pekerja;
    public $keterangan;

    protected $rules = [
        'keterangan' => 'required|in:Masuk,Sakit,Izin',
    ];

    public function mount()
    {
        $user = Auth::user();

        $pekerja = Pekerja::where('email', $user->email)->first();

        if ($pekerja) {
            $this->nama_pekerja = $pekerja->nama_pekerja;
            $this->nomor_pekerja = $pekerja->nomor_pekerja;
        } else {
            $this->nama_pekerja = $user->name;
            $this->nomor_pekerja = '';
        }
    }

    public function simpan()
    {
        $this->validate();

        // Cek apakah sudah presensi hari ini
        $sudahPresensi = Presensi::where('nomor_pekerja', $this->nomor_pekerja)
            ->whereDate('waktu_presensi', now()->toDateString())
            ->exists();

        if ($sudahPresensi) {
            session()->flash('error', 'Anda sudah melakukan presensi hari ini.');
            return;
        }

        Presensi::create([
            'nama_pekerja' => $this->nama_pekerja,
            'nomor_pekerja' => $this->nomor_pekerja,
            'waktu_presensi' => now(), // waktu otomatis dari server
            'keterangan' => $this->keterangan,
        ]);

        session()->flash('success', 'Data presensi berhasil disimpan.');

        return redirect()->to(route('presensi.index'));
    }

    public function render()
    {
        return view('livewire.presensi.create')->layout('layouts.app');
    }
}
