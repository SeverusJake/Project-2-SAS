@extends('layouts.dashboard')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col text-center">
                <h3>New Sale Order</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="customerID" id="customerID"
                            placeholder="Enter CustomerID">
                    </div>
                    <select class="selectpicker" data-live-search="true">
                        <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
                        <option data-tokens="mustard">Burger, Shake and a Smile</option>
                        <option data-tokens="frosting">Sugar, Spice and all things nice</option>
                      </select>

                    <div class="form-group">
                        <input type="date" class="form-control" name="soDate" id="soDate"
                            placeholder="Enter Sale Order Date">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="total" id="total"
                            placeholder="Enter Total">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="userID" id="userID"
                            placeholder="Enter UserID">
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
