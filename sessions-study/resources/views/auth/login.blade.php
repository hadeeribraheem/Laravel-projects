@extends('layout')
@section('title','login')
@section('content')
    <div class="login mt-5">
        <div class="container">
            {{--@if($errors->any())
                @foreach($errors->all() as $err)
                    <p class="mb-2 alert alert-danger">{{ $err }}</p>
                @endforeach
            @endif--}}
            <h2 class="text-center">Login Page</h2>
            <form method="post" action="{{ route('auth.login') }}"  enctype="multipart/form-data">
                @csrf
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input class="form-control" name="email"
                               value="{{ old('email') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input class="form-control" name="password" type="password">
                    </div>
                @if ($errors->has('error'))
                    <div>
                        <p class="alert alert-danger mt-2"> {{ $errors->first('error') }}</p>
                    </div>
                @endif
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
@endsection























