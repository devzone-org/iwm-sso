<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use LdapRecord\Models\ActiveDirectory\User;
use SplTempFileObject;

class EmployeeController extends Controller
{
    public function index($id)
    {
        return view('employee.assign-portals', compact('id'));
    }

    public function fetchEmployee()
    {
        $input = request()->all();
        $users = User::when(!empty($input['username']), function ($q) use ($input) {
            $q->where('samaccountname', $input['username']);
        })->get();

        $employees = Employee::get();


        \App\Models\Employee::where('id', '>', '0')->update([
            'verify' => 'f']);


        foreach ($users->toArray() as $u) {

            $status = 't';
            if (!empty($u['useraccountcontrol'])) {
                if ($u['useraccountcontrol'][0] == '514' || $u['useraccountcontrol'][0] == '66050' || $u['useraccountcontrol'][0] == '66082') {
                    $status = 'f';
                }
            }
            Employee::updateOrCreate([
                'user_name' => $u['samaccountname'][0]
            ], [
                'comman_name' => $u['cn'][0] ?? null,
                'display_name' => $u['displayname'][0] ?? null,
                'title' => $u['title'][0] ?? null,
                'mobile' => $u['mobile'][0] ?? null,
                'address' => $u['physicaldeliveryofficename'][0] ?? null,
                'email' => $u['mail'][0] ?? null,
                'status' => $status,
                'verify' => 't'
            ]);
        }
        return redirect('employees');
    }


    public function exportEmployee()
    {

        $employess = Employee::select('comman_name', 'user_name', 'email', 'title', 'mobile', 'address', 'status')->get()->toArray();

        $csv = \League\Csv\Writer::createFromFileObject(new SplTempFileObject());
        $csv->insertOne(['Name', 'User Name', 'Email', 'Title', 'Mobile', 'Address', 'Status']);
        $csv->insertAll($employess);
        $csv->output('DC Users ' . date('d-M-Y') . 'Report.csv');
        die;
    }


}
