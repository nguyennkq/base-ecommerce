@extends('admin.layouts.app')
@section('title', 'Roles Create')
@section('content')
    <div class="card">
        <h3>Create Role</h3>
        <div>
            <form action="{{ route('roles.store') }}" method="post">
                @csrf
                <div class="input-group input-group-static mb-4">
                    <label>Name</label>
                    <input type="text" value="{{old('name')}}" name="name" class="form-control">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-group input-group-static mb-4">
                    <label class="ms-0">Group</label>
                    <select class="form-control" name="group">
                        <option value="system">System</option>
                        <option value="user">User</option>
                    </select>
                    @error('group')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-group input-group-static mb-4">
                    <label>Display Name</label>
                    <input type="text" name="display_name" value="{{old('name')}}" class="form-control">
                    @error('display_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Permission</label>
                    <div class="row">
                        @foreach ($permissions as $groupName => $permission)
                            <div class="col-5">
                                <h5>{{ $groupName }}</h5>
                                <div>
                                    @foreach ($permission as $item)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="permission_ids[]"
                                                value="{{ $item->id }}" id="fcustomCheck1">
                                            <label class="custom-control-label"
                                                for="customCheck1">{{ $item->display_name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    </div>

@endsection
