<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Portal;


class ManageEmployeePortals extends Component
{
    public $employee_id;
    public function mount($employee_id){
$this->employee_id = $employee_id;
    }
    public function render()
    {
        $portal = Portal::where('status','t')->get();
        $emp = Employee::find($this->employee_id);
        return view('livewire.manage-employee-portals',compact('emp','portal'));
    }
}
