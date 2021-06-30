@extends('layouts.dashboard')
@section('title')
    @if($isUpdate)
        {{ $isUpdate }} User
    @else
        New User
    @endif
    @endsection
@section('content')

@php
$department = $isUpdate ? substr($users->role,0,-1) : '';
$admin = $isUpdate ? substr($users->role,-1) : '2';
$active = $isUpdate ? $users->active : '1';


@endphp

<div class="card">
    <form method="POST" action="{{ $isUpdate ? '/users/update' : '' }}">
        @csrf
        <div class="card-body">
            <div class="row">
                {{-- Username --}}

                <div class="form-group col-md-12">
                    <strong>
                        {{ $isUpdate ? 'UserID:'. $users->userID : '' }}
                        <input type="hidden" name="userID" value="{{ $isUpdate ? $users->userID : '' }}">

                    </strong>
                </div>


                <div class="form-group col-md-6">
                    <label for="username" class="form-control-label">Username</label>
                    <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                        <input class="form-control" placeholder="Enter Username" name="username" id="username" value="{{ $isUpdate ? $users->userName : '' }}">
                    </div>
                </div>

                {{-- Email --}}
                <div class="form-group col-md-6">
                    <label for="email" class="form-control-label">Email</label>

                    <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                        <input type="email" class="form-control" placeholder="Enter Email" name="email" id="email" value="{{ $isUpdate ? $users->email : '' }}">
                    </div>
                </div>

                {{-- Password --}}
                <div class="form-group col-md-12">
                    <label for="password" class="form-control-label">Password</label>

                    <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        <input type="password" class="form-control" placeholder="Enter Password" name="password" id="password" value="{{ $isUpdate ? $users->password : '' }}">
                    </div>
                </div>

                {{-- Full name --}}
                <div class="form-group col-md-6">
                    <label for="fullname" class="form-control-label">Fullname</label>
                    <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user-circle" aria-hidden="true"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter Fullname" name="fullname" id="fullname" value="{{ $isUpdate ? $users->fullname : '' }}">
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="department" class="form-control-label">Department</label>

                    <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-address-card"></i>
                            </span>
                        </div>

                        <select class="custom-select" name="department" id="department">
                            <option selected>Select Department</option>
                            <option value="SA" @if($department=="SA" )selected @endif>Sales</option>
                            <option value="LO" @if($department=="LO" )selected @endif>Logistics</option>
                            <option value="HR" @if($department=="HR" )selected @endif>Human Resource</option>
                            <option value="AC" @if($department=="AC" )selected @endif>Accounting</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="phone" class="form-control-label">Phone</label>

                    <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-phone"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter Phone" name="phone" id="phone" value="{{ $isUpdate ? $users->phone : '' }}">
                    </div>
                </div>
                {{-- Description --}}
                <div class="form-group col-md-12">
                    <label for="description" class="form-control-label">Description</label>
                    <textarea class="form-control" placeholder="Enter description" name="description" id="description" value="{{ $isUpdate ? $users->description : ''}}"></textarea>
                </div>
                {{-- Admin --}}
                <div class="form-group col-md-6">
                    <label for="admin" class="form-control-label">Admin</label>
                    <div role="tabpanel" class="tab-pane fade show active">
                        <div data-toggle="buttons" class="btn-group btn-group-toggle radio-yes-no">
                            <label class="btn btn-success @if($admin==1 ) active @endif">
                                Yes
                                <input type="radio" name="admin" id="admin-1" value="1"></label>
                            <label class="btn btn-danger @if($admin==2 || $admin==0 ) active @endif">
                                No
                                <input type="radio" name="admin" id="admin-2" value="2"></label>
                        </div>
                    </div>
                </div>
                {{-- Active --}}
                <div class="form-group col-md-6">
                    <label for="active" class="form-control-label">Active</label>
                    <div role="tabpanel" class="tab-pane fade show active">
                        <div data-toggle="buttons" class="btn-group btn-group-toggle radio">
                            <label class="btn btn-success @if($active==1 ) focus active @endif">
                                Active
                                <input type="radio" name="active" id="active-1" value="1" @if($active==1)checked @endif></label>
                            <label class="btn btn-danger @if($active==2 ) focus active @endif">
                                Inactive
                                <input type="radio" name="active" id="active-2" value="2" @if($active==2)checked @endif></label>
                            <label class="btn btn-warning @if($active==3 ) focus active @endif">
                                Block
                                <input type="radio" name="active" id="active-3" value="3" @if($active==3)checked @endif></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="row save-buttons">
                <div class="col-md-12">
                    <a href="/users/index" class="btn btn-primary">Cancel</a>
                    <button type="reset" class="btn btn-icon btn-danger">Clear</button>
                    <button type="submit" class="btn btn-icon btn-success">Submit</button>
                </div>

            </div>
        </div>

    </form>
</div>

@endsection
