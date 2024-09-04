@extends('layout')
@section('title','Register')
@section('content')
    <div class="register mt-5">
        <div class="container">
            {{--@if($errors->any())
                @foreach($errors->all() as $err)
                    <p class="mb-2 alert alert-danger">{{ $err }}</p>
                @endforeach
            @endif--}}
            <form method="post" action="{{ route('auth.register') }}" enctype="multipart/form-data">
                @csrf
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input  class="form-control" name="username" value="{{ old('username') }}">
                    @error('username')
                        <p class="alert alert-danger mt-2"> {{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input class="form-control" name="email"
                           value="{{ old('email') }}">
                    @error('email')
                        <p class="alert alert-danger mt-2"> {{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input class="form-control" name="password" type="password">
                    @error('password')
                        <p class="alert alert-danger mt-2"> {{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input class="form-control" name="image" type="file">
                    @error('image')
                        <p class="alert alert-danger mt-2"> {{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
@endsection
