@extends('layouts.dashboard')
@section('content')

    {{-- <div class="container"> --}}
        <div class="row">
            <div class="col text-center">
                <h2>Users Management</h2>
            </div>
        </div>
        <div class="row">
            <div class="col text-right mb-5">
                <a href="/users/create" class="btn-sm btn-primary">Add new</a>
            </div>
        </div>
        <table id="userTable" class="">
            <thead class="">
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>userID</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($saleorders as $so)
                    <tr>
                        <td>{{ $so->orderID }}</td>
                        <td>{{ $so->customerID }}</td>
                        <td>{{ $so->saleorderDate }}</td>
                        <td>{{ $so->total }}</td>
                        <td>{{ $so->userID }}</td>
                        <td>{{ $so->createdDate }}</td>
                        <td>{{ $so->updatedDate }}</td>
                        <td>
                            <a href="edit/{{ $so->orderID }}" class="btn btn-sm btn-success"><i
                                    class="fas fa-edit"></i></a>
                            <a href="delete/{{ $so->orderID }}" class="btn btn-sm btn-danger"><i
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
