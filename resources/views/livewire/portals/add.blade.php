<div>
    <form wire:submit.prevent="addPortals">
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Name<span class="text-danger">*</span></label>
            <input wire:model.defer="name" type="text" class="form-control">
            @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Base URL<span class="text-danger">*</span></label>
            <input wire:model.defer="url" type="text" class="form-control">
            @error('url') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Status</label>
            <select wire:model.defer="status" class="form-control">
                <option ></option>
                <option value="t">Active</option>
                <option value="f">Inactive</option>
            </select>
            @error('status') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary px-3 py-1 ml-1 mt-2 float-right">Add</button>
    </form>
</div>
