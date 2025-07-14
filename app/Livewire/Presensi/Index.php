<?php

namespace App\Livewire\Presensi;

use Livewire\Component;
use App\Models\Presensi;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $searchInput = ''; // Input dari form
    public $search = '';      // Data yang dipakai filter query

    public function cari()
    {
        $this->search = $this->searchInput;
        $this->resetPage();
    }

    public function resetSearch()
    {
        $this->reset(['searchInput', 'search']);
        $this->resetPage();
    }

    public function render()
    {
        $data = Presensi::query()
            ->when($this->search, function ($query) {
                $query->where(function($q) {
                    $q->where('nama_pekerja', 'like', '%' . $this->search . '%')
                        ->orWhere('nomor_pekerja', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('waktu_presensi', 'desc')
            ->paginate(10);

        return view('livewire.presensi.index', [
            'presensis' => $data,
        ])->layout('layouts.app');
    }
}
