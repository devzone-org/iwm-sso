<?php

namespace App\Http\Livewire\Portals;

use App\Models\Portal;
use Livewire\Component;

class Index extends Component
{
    public $portals;

    public function mount()
    {
        $this->portals = Portal::get();
    }

    public function render()
    {
        return view('livewire.portals.index');
    }
}
