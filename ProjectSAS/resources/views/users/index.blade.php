@extends('layouts.dashboard')
@section('title', 'Users Management')
@section('addnew')

<a href="/users/create" class="btn btn-success btn-sm">Add New</a>

@endsection

@section('content')
<div class="card">

    @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        {{ Session::get('success') }}
    </div>
    @endif
    <div class="card-body">

        <table id="userTable" border="1">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Admin</th>
                    <th>Fullname</th>
                    <th>Department</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->userID }}</td>
                    <td>{{ $user->userName }}</td>
                    <td>
                        @switch(substr($user->role,-1))
                        @case(1)
                        Admin
                        @break
                        @case(2)
                        User
                        @break
                        @endswitch
                    </td>
                    <td>{{ $user->fullname }}</td>

                    <td>
                        @switch(substr($user->role,0,-1))
                        @case("SA")
                        Sales
                        @break
                        @case("LO")
                        Logistics
                        @break
                        @case("HR")
                        Human Resources
                        @break
                        @case("AC")
                        Accounting
                        @break
                        @endswitch
                    </td>

                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>
                        @switch($user->active)
                        @case(1)
                        Active
                        @break
                        @case(2)
                        Inactive
                        @break
                        @case(3)
                        Block
                        @break
                        @endswitch

                    </td>
                    <td>
                        <a href="show/{{ $user->userID }}" class="btn btn-sm btn-info">
                            <i class="fas fa-info"></i></a>
                        <a href="edit/{{ $user->userID }}" class="btn btn-sm btn-success">
                            <i class="fas fa-edit"></i></a>
                        <a href="delete/{{ $user->userID }}" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Admin</th>
                    <th>Fullname</th>
                    <th>Department</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">

</script>

<script>
    $(document).ready(function() {
        $('#userTable').DataTable();
    });

</script>
@endsection
