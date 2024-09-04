@extends('admin.admin_dashboard')
@section('title','Admin | Products')

@section('content')
    <div class="users_data">
        <div class="container">
            <h1 class="my-4 text-center">All Users</h1>
            <table class="table  table-hover table-bordered table-striped text-center">
                <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Price</th>
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
                                <div class="d-flex">
                                    <a href="{{route('dashboard.edit.user',$user->id)}}" class="btn btn-primary">Edit</a>

                                    <form action="{{ route('dashboard.delete.user', $user->id) }}" method="POST" class="delete-form " style="
    width: 0px !important;
    margin: 4px;
">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger" onclick="confirmDelete(this.form)">Delete</button>
                                    </form>

                                    <script>
                                        function confirmDelete(form) {
                                            Swal.fire({
                                                title: 'Are you sure?',
                                                text: "You won't be able to revert this!",
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Yes, delete it!'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    form.submit(); // Submits the form if the user confirms
                                                }
                                            });
                                        }
                                    </script>
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
