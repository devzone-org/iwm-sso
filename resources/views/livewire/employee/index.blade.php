<div>
    <form wire:submit.prevent="render">
        <div class="row">
            <div class="form-group col-4">
                <label for="name">Name</label>
                <input type="text" wire:model.defer="filters.name" class="form-control" id="">
            </div>
            <div class="form-group col-4">
                <label for="">Email</label>
                <input type="text" class="form-control" wire:model.defer="filters.email" id="">
            </div>
            <div class="form-group col-4">
                <label for="">Username</label>
                <input type="text" class="form-control" wire:model.defer="filters.user_name" id="">
            </div>
            <div class="form-group col-4">
                <label for="">Status</label>
                <select wire:model.defer="filters.status" class="form-control" id="">
                    <option value=""></option>
                    <option value="t">Active</option>
                    <option value="f">Inactive</option>
                </select>
            </div>
            <div class="form-group col-4">
                <label for="">Verify</label>
                <select wire:model.defer="filters.verify" class="form-control" id="">
                    <option value=""></option>
                    <option value="t">Yes</option>
                    <option value="f">No</option>
                </select>
            </div>
        </div>

        <div class="mb-5">
            <button type="submit" class="btn btn-primary px-3 py-1 ml-1 mt-2 mb-3 float-right">Search</button>
        </div>

    </form>
    <table class="table table-sm table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Display name</th>
            <th scope="col">Email</th>
            <th scope="col">Username</th>
            <th scope="col">Title</th>
            <th scope="col">Mobile</th>
            <th scope="col">Address</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        @if($employees->isNotEmpty())
            @foreach($employees as $key => $employee)
                <tr>
                    <th scope="row" style="font-weight: normal">{{$loop->index+1}}</th>
                    <td>{{$employee->display_name}}</td>

                    <td>{{$employee->email}}</td>
                    <td>{{$employee->user_name}}</td>
                    <td>{{$employee->title}}</td>
                    <td>{{$employee->mobile}}</td>
                    <td>{{$employee->address}}</td>
                    <th>@if($employee->status == 't')
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">InActive</span>
                        @endif
                    </th>
                    <td><a href="{{url('employees/assign-portal/'.$employee->id)}}">Manage</a>
                        @if($employee->verify == 'f')
                        |
                            <span type="button" wire:click="delete({{$employee->id}})" class="text-danger border-0">Delete </span>
                        @endif
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>

    {{ $employees->links() }}
    @else
        <div class="alert alert-danger">
            No Record Found.
        </div>
    @endif


</div>
