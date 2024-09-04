@extends('layout')

@section('title', 'Welcome')

@section('content')
    <div class="container mt-5">
        <h1>Welcome, {{ $user->username }}!</h1>
        <p>Email: {{ $user->email }}</p>
        @if($user->image)
            <img src="{{ asset('images/' . $user->image->name) }}" alt="{{ $user->name }}" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
        @else
            <p>No profile image available the default image is set.</p>
            <img src="{{ asset('images/default.png') }}" alt="default.png" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
        @endif
    </div>
@endsection
