@extends('layouts.dashboard')

@section('content')
    <h2 style="text-align: center; color: blue;font-weght:bold;">Create New Customer</h2>
    <div class="row">
        <div class="col-12">
            <form  action="/customers/addCustomer" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input class="form-control" type="text" name="txtname">
                    @error('txtname')
                        <p style="color: red; font-weight:bold">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Tax Number</label>
                    <input class="form-control" type="text" name="txttax">
                    @error('txttax')
                        <p style="color: red; font-weight:bold">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Adress</label>
                    <input class="form-control" type="text" name="txtaddress">
                    @error('txtaddress')
                        <p style="color: red; font-weight:bold">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Phone</label>
                    <input class="form-control" type="text" name="txtphone">
                    @error('txtphone')
                        <p style="color: red; font-weight:bold">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input class="form-control" type="text" name="txtemail">
                    @error('txtemail')
                        <p style="color: red; font-weight:bold">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Unpaid</label>
                    <input class="form-control" type="number" name="txtunpaid">
                    @error('txtunpaid')
                        <p style="color: red; font-weight:bold">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input class="form-control" type="text" name="txtdescription">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
