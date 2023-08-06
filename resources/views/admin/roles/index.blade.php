@extends('admin.layouts.app')
@section('title', 'Roles')
@section('content')
    <div class="card">
        @if (session('message'))
            <h4 class="text-info">{{ session('message') }}</h4>
        @endif

        <h3>Role List</h3>
        <div>
            <a class="btn btn-primary" href="{{ route('roles.create') }}">Create</a>
        </div>
        <div>
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Display Name</th>
                    <th>Action</th>
                </tr>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->display_name }}</td>
                        <td>
                            <a href="{{route('roles.edit', $role->id)}}" class="btn btn-info">Edit</a>
                            <form action="{{route('roles.destroy', $role->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $roles->links() }}
        </div>
    </div>
@endsection
