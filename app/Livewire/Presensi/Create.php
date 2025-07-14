<?php

namespace App\Livewire\Presensi;

use Livewire\Component;
use App\Models\Presensi;
use Carbon\Carbon;

class Create extends Component
{
    public $nama_pekerja;
    public $nomor_pekerja;
    public $waktu_presensi;
    public $keterangan;

    public function simpan()
    {
        $this->validate([
            'nama_pekerja' => 'required|string',
            'nomor_pekerja' => 'required|string',
            'waktu_presensi' => 'required|date',
            'keterangan' => 'required|string|in:Masuk,Sakit,Izin',
        ]);

        Presensi::create([
            'nama_pekerja' => $this->nama_pekerja,
            'nomor_pekerja' => $this->nomor_pekerja,
            'waktu_presensi' => Carbon::parse($this->waktu_presensi),
            'keterangan' => $this->keterangan,
        ]);

        session()->flash('success', 'Data presensi berhasil disimpan.');

        return redirect()->route('presensi.index');
    }

    public function render()
    {
        return view('livewire.presensi.create')->layout('layouts.app');
    }
}
