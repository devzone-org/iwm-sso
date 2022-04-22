<?php

namespace App\Http\Livewire\Portals;

use App\Models\Portal;
use Livewire\Component;

class Edit extends Component
{
    public $name;
    public $url;
    public $status;
    public $portal_id;

    public function mount($id)
    {
        $this->portal_id = $id;
        try {
            $portal = Portal::find($id);
            $this->name = $portal->name;
            $this->url = $portal->base_url;
            $this->status = $portal->status;
        }catch (\Exception $e) {
            $this->redirect('/portals');
        }
    }

    public function updatePortal()
    {
        $this->validate([
            'name' => 'required|min:3',
            'url' => 'required|min:3',
            'status' => 'required',
        ]);

        Portal::where('id',$this->portal_id)->update([
            'name' => $this->name,
            'base_url' => $this->url,
            'status' => $this->status,
        ]);
        session()->flash('message', 'Portal updated successfully');
    }

    public function render()
    {
        return view('livewire.portals.edit');
    }
}
