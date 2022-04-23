@extends('layouts.master')
@section('title') Employee @endsection

@section('content')
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">{{ __('Employees') }}

            </div>
            <div class="card-body">
                @livewire('employee.index')
            </div>
        </div>
    </div>
@endsection
