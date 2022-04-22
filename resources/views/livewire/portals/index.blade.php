<div>
    <table class="table table-sm table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">URL</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($portals as $key => $portal)
            <tr>
                <td scope="row">{{$loop->index+1}}</td>
                <td>{{$portal->name}}</td>
                <td>{{$portal->base_url}}</td>
                <th>@if($portal->status == 't')
                        <span class="badge badge-success">Active</span>
                    @else
                        <span class="badge badge-danger">InActive</span>
                    @endif
                </th>
                <th><a href="{{route('portals.edit',$portal->id)}}">Edit</th>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
