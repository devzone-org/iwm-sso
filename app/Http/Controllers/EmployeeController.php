<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Portal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use LdapRecord\Models\ActiveDirectory\User;

class EmployeeController extends Controller
{
    public $employee_id;
    public function index($id)
    {
        $this->employee_id = $id;
        $employees = Employee::find($id);
        $portals = Portal::where('status','t')->get();
        return view('employee.assign-portals',compact('employees','portals'));
    }

    public function assignPortal(Request $request)
    {

        $portal = $request->input('portals');

            Http::fake([
                '*' => Http::response($portal,200),
            ]);

            $response = Http::post('*', [
                'portal' => $portal,
            ]);
        return $response;


//        return redirect()->route('employee.index',$id); https://portal.example.com/api/v1/employees/{id}/portals/
    }

}
