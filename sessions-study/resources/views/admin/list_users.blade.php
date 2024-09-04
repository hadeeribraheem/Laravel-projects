@extends('admin.admin_dashboard')
@section('title','Admin | Users')

@section('content')
    <div class="users_data">
        <div class="container">
            <h1 class="my-4 text-center">All Users</h1>
            <table class="table  table-hover table-bordered table-striped text-center">
                <thead class="thead-dark">
                <tr>
                    <th>Image</th>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Control</th>
                </tr>
                </thead>
                <tbody>
                @if($users->isEmpty())
                    <p class="alert alert-danger mt-2"> No users found.</p>
                @else
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                @if($user->image?->name)
                                    <img src="{{ asset('images/'.$user->image->name) }}" alt="">
                                @else
                                    <img src="{{ asset('images/default.png') }}" alt="">
                                @endif
                            </td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->type }}</td>
                            <td>{{ $user -> created_at}}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="{{route('dashboard.edit.user',$user->id)}}" class="btn btn-primary btn-sm mx-1 editbtn">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form action="{{ route('dashboard.delete.user', $user->id) }}" method="POST" class="delete-form d-inline" style="
        width: 0px !important;
           margin: 1px;
    ">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm trash" onclick="confirmDelete(this.form)">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            {{$users->links()}}
        </div>
    </div>
@endsection
