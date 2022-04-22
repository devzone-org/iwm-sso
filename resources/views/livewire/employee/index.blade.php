<div>
    <form wire:submit.prevent="render">
        <div class="row">
            <div class="form-group col-4">
                <label for="name">Name</label>
                <input type="text" wire:model.defer="filters.name" class="form-control" id="" >
            </div>
            <div class="form-group col-4">
                <label for="">Email</label>
                <input type="text" class="form-control" wire:model.defer="filters.email" id="" >
            </div>
            <div class="form-group col-4">
                <label for="">Username</label>
                <input type="text" class="form-control" wire:model.defer="filters.user_name" id="" >
            </div>
            <div class="form-group col-4">
                <label for="">Status</label>
                <select wire:model.defer="filters.status" class="form-control" id="">
                    <option value=""></option>
                    <option value="t">Active</option>
                    <option value="f">Inactive</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary px-3 py-1 ml-1 mt-2 mb-3 float-right">Search</button>
    </form>
    <table class="table table-sm table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Username</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @if($employees->isNotEmpty())

            @foreach($employees as $key => $employee)
                <tr>
                    <th scope="row" style="font-weight: normal">{{$loop->index+1}}</th>
                    <td>{{$employee->name}}</td>
                    <th style="font-weight: normal">{{$employee->email}}</th>
                    <td>{{$employee->user_name}}</td>
                    <th>@if($employee->status == 't')
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">InActive</span>
                        @endif
                    </th>
                    <td><a href="{{url('employees/assign-portal/'.$employee->id)}}">Assign</td>
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
