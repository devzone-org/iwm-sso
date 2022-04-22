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
    return view('welcome');
});

Route::get('employees/assign-portal/{id}', [\App\Http\Controllers\EmployeeController::class, 'index']);
Route::get('employees/assign-portal/{id}/portals', [\App\Http\Controllers\EmployeeController::class, 'assignPortal']);

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
