@extends('layouts.master')
@section('title') Edit Portals @endsection

@section('content')
    <div class="col-md-9">
        <div class="card">

            <div class="card-header">{{ __('Edit Portals') }}

            </div>
            <div class="card-body">
                @livewire('portals.edit',['id'=>request()->route()->id])
            </div>
        </div>
@endsection
