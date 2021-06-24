@extends('layouts.dashboard')
@section('title', 'Users Management')
@section('content')

    <div class="row">
        <div class="col text-right mb-5">
            <a href="/users/create" class="btn-sm btn-primary">Add new</a>
        </div>
    </div>
    <table id="userTable" class="">
        <thead class="">
            <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>Role</th>
                <th>Fullname</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Active</th>
                <th>ACtion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->userID }}</td>
                    <td>{{ $user->userName }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->fullname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->active }}</td>
                    <td>
                        <a href="edit/{{ $user->userID }}" class="btn btn-sm btn-success"><i
                                class="fas fa-edit"></i></a>
                        <a href="delete/{{ $user->userID }}" class="btn btn-sm btn-danger"><i
                                class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- </div> --}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });
    </script>
@endsection
