@extends('layouts.dashboard')

@section('content')
    <h2 style="text-align: center; color: blue;font-weght:bold;">Update Customer</h2>
    <div class="row">
        <div class="col-12">
            <form  action="/customers/postupdate" method="post">
                @csrf
                {{-- @if ($isUpdate)
                    <div class="form-group">
                        <label for="">Id</label>
                        <input class="form-control" type="text" name="txtid" value="{{$isUpdate ? $user->accountId : ''}}" disabled>

                    </div>
                @endif --}}
                <div class="form-group">
                    <label for="">Name</label>
                    <input class="form-control" type="text" name="txtname" value="{{$customers->customerID}}">
                    @error('txtname')
                        <p style="color: red; font-weight:bold">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Tax Number</label>
                    <input class="form-control" type="text" name="txttax" value="{{$customers->TaxNumber}}">
                    @error('txttax')
                        <p style="color: red; font-weight:bold">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Adress</label>
                    <input class="form-control" type="text" name="txtaddress" value="{{$customers->address}}">
                    @error('txtaddress')
                        <p style="color: red; font-weight:bold">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Phone</label>
                    <input class="form-control" type="text" name="txtphone" value="{{$customers->phone}}">
                    @error('txtphone')
                        <p style="color: red; font-weight:bold">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input class="form-control" type="text" name="txtemail" value="{{ $customers->email}}">
                    @error('txtemail')
                        <p style="color: red; font-weight:bold">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Unpaid</label>
                    <input class="form-control" type="number" name="txtunpaid" value="{{$customers->unpaid}}">
                    @error('txtunpaid')
                        <p style="color: red; font-weight:bold">{{$message}}</p>
                    @enderror
                </div>

                {{-- <div class="form-group">
                    <label for="">Role</label>
                    <select class="form-control" name="txtrole" id="">
                        <option value="1" @if ($user->role ==1) selected
                                        @endif>Admin</option>
                        <option value="2"@if ($user->role ==2) selected
                            @endif>User</option>
                    </select>
                </div> --}}

                <div class="form-group">
                    <label for="">Description</label>
                    <input class="form-control" type="text" name="txtdescription" value="{{$customers->description}}">
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
