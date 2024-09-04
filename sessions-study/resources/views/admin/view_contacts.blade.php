@extends('admin.admin_dashboard')
@section('title', 'Contacts')
@section('content')
    <div class="view_contacts">
        <div class="container">
            <h1 class="my-4 text-center">All Contacts</h1>
            <table class="table table-bordered table-striped text-center">
                <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Title</th>
                    <th>Message</th>
                    <th>Created at</th>
                    {{--<th>Published at</th>--}}
                    <th>Control</th>
                </tr>
                </thead>
                <tbody>
                @if($contacts->isEmpty())
                    <tr>
                        <td colspan="8" class="text-center">No users found.</td>
                    </tr>
                @else
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact['id'] }}</td>
                            <td>{{ $contact->username }}</td>
                            <td>{{ $contact->title }}</td>
                            <td>{{ $contact->message }}</td>
                            <td>{{ $contact -> created_at}}</td>
                            <td>
                                    <form action="{{ route('dashboard.delete.contact', $contact->id) }}" method="POST" class="delete-form ">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger trash" onclick="confirmDelete(this.form)">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
