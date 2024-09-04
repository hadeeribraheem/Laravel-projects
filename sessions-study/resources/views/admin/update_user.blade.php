@extends('admin.admin_dashboard')
@section('title', 'Edit User')
@section('content')
    <div class="update_user">
        <div class="container">

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <p class="alert alert-danger">{{$error}}</p>
                    @endforeach
                @endif

                @if(session('success'))
                <p class="alert alert-success">{{session('success')}}</p>
                    @endif
                    <h2 class="text-center">Update user data</h2>
            <form method="post" action="{{route('dashboard.update.user', $user->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Username</label>
                    <input class="form-control" name="username" value="{{ $user->username }}">
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input class="form-control" name="email" value="{{ $user->email }}">
                </div>
                <div class="mb-3">
                    <label>Password <span style="font-size: 0.9em; color: gray; font-style: italic;">leave blank if you don't want to change it</span></label>
                    <input class="form-control" type="password" name="password">
                </div>
                <div class="mb-3">
                    <label>Personal Image (leave blank if you don't want to change it)</label>
                    <input class="form-control" type="file" name="personal_image">
                    @if($user->image)
                        <img src="{{ asset('images/'.$user->image->name) }}" alt="User Image" class="mt-3" style="max-width: 200px;">
                    @else
                        <p>No profile image available the default image is set.</p>
                        <img src="{{ asset('images/default.png') }}" alt="default.png" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                    @endif
                </div>

                <input type="submit" class="btn btn-success" value="Update User">
            </form>
        </div>
    </div>
@endsection
