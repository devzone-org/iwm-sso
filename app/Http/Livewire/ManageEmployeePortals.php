<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use App\Models\EmployeePortal;
use App\Models\Portal;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ManageEmployeePortals extends Component
{
    public $employee_id;
    public $portals = [];
    public $success = '';
    public $error = '';

    public function mount($employee_id)
    {
        $this->employee_id = $employee_id;
    }

    public function render()
    {
        $portal = Portal::where('status', 't')->get();
        $emp = Employee::find($this->employee_id);
        $emp_pr = EmployeePortal::where('employee_id', $this->employee_id)->get();
        if ($emp_pr->isNotEmpty()) {
            $this->portals = $emp_pr->pluck('portal_id')->toArray();
        }
        return view('livewire.manage-employee-portals', compact('emp', 'portal'));
    }

    public function updateUser()
    {
        try {


            $this->reset(['success', 'error']);
            $portals = Portal::where('status', 't')->get();
            $emp = Employee::find($this->employee_id);

            foreach ($portals as $p) {
                $body = [
                    'name' => $emp['comman_name'] ?? '-',
                    'email' => $emp['email'],
                ];
                if (in_array($p->id, $this->portals)) {
                    $body['status'] = 't';
                } else {
                    $body['status'] = 'f';
                }

                $response = Http::post($p->base_url, $body);

                if ($response->successful()) {
                    if (in_array($p->id, $this->portals)) {
                        EmployeePortal::updateOrCreate([
                            'employee_id' => $this->employee_id,
                            'portal_id' => $p->id
                        ], ['created_at' => now()]);
                    } else {
                        EmployeePortal::where('employee_id', $this->employee_id)
                            ->where('portal_id', $p->id)->delete();
                    }

                    $this->success = 'Record has been updated.';

                } else {
                    $this->error = 'Something went wrong please try again.';
                }

            }
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
        }


    }
}
