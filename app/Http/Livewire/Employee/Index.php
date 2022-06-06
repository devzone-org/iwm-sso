<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use App\Models\EmployeePortal;
use Livewire\Component;
use Livewire\WithPagination;
class Index extends Component
{

    use WithPagination;
    public $filters = [];

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $employees = Employee::when(!empty($this->filters['name']), function ($query) {
            return $query->where('display_name', 'like', '%' . $this->filters['name'] . '%');
        })
        ->when(!empty($this->filters['email']), function ($query) {
                return $query->where('email', 'like', '%' . $this->filters['email'] . '%');
            })
        ->when(!empty($this->filters['user_name']), function ($query) {
                return $query->where('user_name', 'like', '%' . $this->filters['user_name'] . '%');
            })
        ->when(!empty($this->filters['status']), function ($query) {
                return $query->where('status', $this->filters['status']);
            })
            ->when(!empty($this->filters['verify']), function ($query) {
                return $query->where('verify', $this->filters['verify']);
            })
        ->paginate(100);
        return view('livewire.employee.index',[
            'employees' => $employees
        ]);
    }

    public function delete($id)
    {
        $found = Employee::find($id);

        if ($found){
            $found->delete();

            $employee_portal = EmployeePortal::where('employee_id',$id);

            if ($employee_portal){
                $employee_portal->delete();
            }
        }

    }
}
