@extends('layout.layout')
@section('title', 'Users | Admin Dashboard')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.left-sidebar')
        </div>
        <div class="col-9">
            <h1>Users</h1>
            @include('shared.success-message')
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Joined At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                                <a href="{{ route('users.show', $user) }}">{{ $user->name }} </a>
                            </td>
                            <td> {{ $user->email }} </td>
                            <td>{{ $user->created_at->toDateString() }}</td>
                            <td><a href="{{ route('users.show', $user) }}">View</a>
                                <a href="{{ route('users.edit', $user) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $users->links() }}
            </div>
        </div>

    </div>
@endsection
