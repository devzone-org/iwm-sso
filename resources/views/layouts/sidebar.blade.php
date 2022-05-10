<div class="card-header">
    Sidebar
</div>
<div class="list-group list-group-flush">
    {{--    <a class="list-group-item list-group-item-action {{Request::segment(1)=='home' ? 'active' : ''}} "--}}
    {{--       href="{{url('/home')}}">Dashboard--}}
    {{--    </a>--}}
    <a class="list-group-item list-group-item-action {{Request::segment(1)=='employees' ? 'active' : ''}}"
       href="{{route('employee.index')}}">DC Users
    </a>
    <a class="list-group-item list-group-item-action {{Request::segment(1)=='portals' ? 'active' : ''}} "
       href="{{route('portals.index')}}">Portals
    </a>
    <a class="list-group-item list-group-item-action" href="{{ url('export/employees') }}">Export DC Users</a>

    <a href="{{ url('fetch/employees') }}">Fetch DC Users</a>
</div>
