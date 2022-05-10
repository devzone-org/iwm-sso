<?php

use Illuminate\Support\Facades\Route;

use LdapRecord\Models\ActiveDirectory\User;
use App\Models\Employee;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('employees/assign-portal/{id}', [\App\Http\Controllers\EmployeeController::class, 'index']);
Route::get('/sso/users', [\App\Http\Controllers\EmployeeController::class, 'assignPortal']);
Route::get('fetch/employees',function(){
    $users = User::get();
    foreach($users->toArray() as $u){
        if($u['samaccountname'][0] == 'Muhammad.Jawad'){
       // dd($u);
     //   dd($u['useraccountcontrol'][0]);
        }
        $status = 't';
        if(!empty($u['useraccountcontrol'])){
            
            if($u['useraccountcontrol'][0]=='514' || $u['useraccountcontrol'][0]=='66050'|| $u['useraccountcontrol'][0]=='66082'){
                    $status = 'f';
            }
        }
        Employee::updateOrCreate([
            'user_name' => $u['samaccountname'][0]
        ],[
            'comman_name'=>$u['cn'][0] ?? null,
            'display_name'=>$u['displayname'][0] ?? null,
            'title'=>$u['title'][0] ?? null,
            'mobile'=>$u['mobile'][0] ?? null,
            'address'=>$u['physicaldeliveryofficename'][0] ?? null,
            'email'=>$u['mail'][0] ?? null,
            'status' => $status
        ]);
    }
    return redirect('employees');
});

Route::get('employees', function () {
    return view('employee.index');
})->name('employee.index');

Route::get('portals', function () {
    return view('portals.index');
})->name('portals.index');

Route::get('portals/add', function () {
    return view('portals.add');
})->name('portals.add');

Route::get('portals/edit/{id}', function () {
    return view('portals.edit');
})->name('portals.edit');

Auth::routes();

//Route::get('/employees', [App\Http\Controllers\HomeController::class, 'index'])->name('employee.index');
