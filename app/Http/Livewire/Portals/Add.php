<?php

namespace App\Http\Livewire\Portals;

use App\Models\Portal;
use Livewire\Component;

class Add extends Component
{
    public $name;
    public $url;
    public $status;

    public function addPortals()
    {
        $this->validate([
            'name' => 'required|min:3',
            'url' => 'required|min:3',
            'status' => 'required',
        ]);

        Portal::create([
            'name' => $this->name,
            'base_url' => $this->url,
            'status' => $this->status,
        ]);
        session()->flash('message', 'Portal added successfully');
        $this->reset(['name', 'url', 'status']);
    }

    public function render()
    {
        return view('livewire.portals.add');
    }
}
