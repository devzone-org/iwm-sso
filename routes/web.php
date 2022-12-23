<?php

use Illuminate\Support\Facades\Route;

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
    return view('landing-page');
});

Route::get('employees/assign-portal/{id}', [\App\Http\Controllers\EmployeeController::class, 'index']);
Route::get('/sso/users', [\App\Http\Controllers\EmployeeController::class, 'assignPortal']);
Route::get('fetch/employees', [\App\Http\Controllers\EmployeeController::class, 'fetchEmployee']);
Route::get('export/employees', [\App\Http\Controllers\EmployeeController::class, 'exportEmployee']);

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

Auth::routes(['register' => false]);

//Route::get('/employees', [App\Http\Controllers\HomeController::class, 'index'])->name('employee.index');
