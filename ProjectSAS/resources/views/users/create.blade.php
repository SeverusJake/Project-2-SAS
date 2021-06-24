@extends('layouts.dashboard')
@section('content')

        <div class="container">

            <div class="row">
                <div class="col text-center">
                    <h3>New User</h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="userName" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <select class="custom-select" name="department" id="department">
                                <option selected>Select Department</option>
                                <option value="SA">Sales</option>
                                <option value="LO">Logistics</option>
                                <option value="HR">Human Resource</option>
                                <option value="AC">Accounting</option>
                            </select>
                        </div>

                        <div class="form-group custom-control custom-switch mx-5">
                            <input id="adminRole" class="custom-control-input" type="checkbox" name="adminRole" value="1">
                            <label for="adminRole" class="custom-control-label">Admin</label>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="fullname" placeholder="Enter Full Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" placeholder="Enter Phone">
                        </div>
                        <div class="form-group form-check form-check-inline">
                            <label class="form-check-label mx-2">
                                <input class="form-check-input" type="radio" name="active" id="active" value="1" checked>
                                Active
                            </label>
                            <label class="form-check-label mx-2">
                                <input class="form-check-input" type="radio" name="active" id="inactive" value="2"> Inactive
                            </label>
                            <label class="form-check-label mx-2">
                                <input class="form-check-input" type="radio" name="active" id="block" value="3"> Block
                            </label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="description" placeholder="Enter Description">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>

@endsection
