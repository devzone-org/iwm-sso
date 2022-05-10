<div>

    <table class="table table-stripped">
        <thead>
        <tr>
            <th class="bg-light">Name</th>
            <td>
            {{ $emp -> comman_name }}</th>
            <th class="bg-light">Title</th>
            <td>
            {{ $emp -> title }}</th>
            <th class="bg-light">Email</th>
            <td>
            {{ $emp -> email }}</th>
        </tr>

        <tr>
            <th class="bg-light">Mobile</th>
            <td>
            {{ $emp -> mobile }}</th>
            <th class="bg-light">User Name</th>
            <td>
            {{ $emp -> user_name }}</th>
            <th class="bg-light">Status</th>
            <td>
                @if( $emp -> status == 't')
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-danger">In active</span>
            @endif
            </th>
        </tr>
        <tr>
            <th class="bg-light">Address</th>
            <td colspan='5'>
            {{ $emp -> address }}</th>

        </tr>
        </thead>
    </table>

    <form wire:submit.prevent="updateUser">
        <table class="mt-5 table table-sm table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Portal Name</th>
                <th>Assigned</th>
            </tr>
            </thead>
            @foreach($portal as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->name }}</td>
                    <td><input type="checkbox" value="{{ $p->id }}" wire:model.defer="portals"></td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3">
                    <button class="btn btn-primary btn-sm" type="submit">Update</button>
                </td>
            </tr>
        </table>

        @if(!empty($success))
            <div class="alert alert-success">{{ $success }}</div>
        @endif

        @if(!empty($error))
            <div class="alert alert-danger">{{ $error }}</div>
        @endif
    </form>

</div>
