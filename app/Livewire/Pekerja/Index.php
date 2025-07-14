<?php

namespace App\Livewire\Pekerja;

use Livewire\Component;
use App\Models\Pekerja;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $pekerjas = Pekerja::query()
            ->when($this->search, function ($query) {
                $query->where('nama_pekerja', 'like', '%' . $this->search . '%')
                      ->orWhere('nomor_pekerja', 'like', '%' . $this->search . '%')
                      ->orWhere('divisi', 'like', '%' . $this->search . '%');
            })
            ->orderBy('nama_pekerja')
            ->paginate(10);

        return view('livewire.pekerja.index', [
            'pekerjas' => $pekerjas,
        ])->layout('layouts.app');
    }
}
