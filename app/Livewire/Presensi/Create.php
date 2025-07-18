<?php

namespace App\Livewire\Presensi;

use Livewire\Component;
use App\Models\Presensi;
use App\Models\Pekerja;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Create extends Component
{
    public $nama_pekerja;
    public $nomor_pekerja;
    public $waktu_presensi;
    public $keterangan;

    protected $rules = [
        'waktu_presensi' => 'required|date',
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

        Presensi::create([
            'nama_pekerja' => $this->nama_pekerja,
            'nomor_pekerja' => $this->nomor_pekerja,
            'waktu_presensi' => Carbon::parse($this->waktu_presensi),
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
