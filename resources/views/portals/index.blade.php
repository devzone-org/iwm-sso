@extends('layouts.master')
@section('title') Portals @endsection

@section('content')
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">{{ __('Portals') }}
                <a href="{{route('portals.add')}}" class="btn btn-primary btn-sm float-right">Add
                    Portals</a>
            </div>
            <div class="card-body">
                @livewire('portals.index')
            </div>
        </div>
    </div>

@endsection
