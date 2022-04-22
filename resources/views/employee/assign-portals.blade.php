@extends('layouts.master')
@section('title') Assign @endsection

@section('content')
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">{{ __('Employees') }}

            </div>
            <div class="card-body">
                <table style="width:100%" class="table table-sm table-bordered">
                    <tr>
                        <th>Name:</th>
                        <td>{{$employees->name}}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{$employees->email}}</td>
                    </tr>
                    <tr>
                        <th>Username:</th>
                        <td>{{$employees->user_name}}</td>
                    </tr>
                </table>
                <form action="{{url('employees/assign-portal/'.$employees->id.'/portals')}}" method="get">
                    @foreach($portals as $portal)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$portal->base_url}}" name="portals[]"
                                   id="portal{{$portal->id}}">
                            <label class="form-check-label" for="portal{{$portal->id}}">
                                {{$portal->name}}
                            </label>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary px-3 py-1 ml-1 mt-2 float-right">Assign</button>
                </form>
            </div>
        </div>
    </div>
@endsection
