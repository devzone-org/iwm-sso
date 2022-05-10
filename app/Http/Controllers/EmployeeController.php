<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Portal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use LdapRecord\Models\ActiveDirectory\User;

class EmployeeController extends Controller
{
    public function index($id)
    {
        
        
        return view('employee.assign-portals',compact('id'));
    }

    

}
