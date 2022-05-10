@extends('layouts.master')
@section('title') Manage Portals @endsection

@section('content')
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">{{ __('Employee Details') }}

            </div>
             

@livewire('manage-employee-portals',['employee_id'=>$id])

        </div>
    </div>
@endsection
