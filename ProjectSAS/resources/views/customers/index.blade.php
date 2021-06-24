@extends('layouts.dashboard')

@section('content')
    <h2 style="text-align: center; font-size: 24px; font-weight:bold">List Customers</h2>
    <div class="row">
        <div class="col-sm-6">
            <a href="/customers/create" class="btn btn-primary">Add New Customer</a>

        </div>
        <div class="col-sm-6">
            <form action="" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-8" style="text-align: left">
                        <input type="text" value="" placeholder="Searching..." name="txtSearch" style="width: 100%">
                    </div>
                    <div class="col-sm-4" style="text-align: left">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table id="customersTable" class="table table-bodered" border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Control</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $customer->customerID }}</td>
                            <td>{{ $customer->customerName }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>
                                <a href="customers/update/{{ $customer->customerID }}"> Update</a> |
                                <a href="customers/delete/{{ $customer->customerID }}"> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            $('#customersTable').DataTable();
        });
    </script>

@endsection
