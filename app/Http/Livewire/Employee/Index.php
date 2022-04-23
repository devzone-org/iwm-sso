<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
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
            return $query->where('comman_name', 'like', '%' . $this->filters['name'] . '%');
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
        ->paginate(10);
        return view('livewire.employee.index',[
            'employees' => $employees
        ]);
    }
}
