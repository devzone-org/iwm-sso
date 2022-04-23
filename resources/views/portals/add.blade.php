@extends('layouts.master')
@section('title') Add Portals @endsection

@section('content')
    <div class="col-md-10">
        <div class="card">

            <div class="card-header">{{ __('Add Portals') }}

            </div>
            <div class="card-body">
                @livewire('portals.add')
            </div>
        </div>
@endsection
