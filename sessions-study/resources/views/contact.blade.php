@extends('layout')
@section('title','contact')
@section('content')
        <div class="contact_us mt-5">
            <div class="container">
                {{--@if($errors->any())
                    @foreach($errors->all() as $err)
                        <p class="mb-2 alert alert-danger">{{ $err }}</p>
                    @endforeach
                @endif--}}
                <form method="post" action="{{ route('contact.save') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input  class="form-control" name="username" value="{{ old('username') }}">
                        @error('username')
                             <p class="alert alert-danger mt-2"> {{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input class="form-control" name="title"
                                value="{{ old('title') }}">
                        @error('title')
                            <p class="alert alert-danger mt-2"> {{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" name="message"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
@endsection
