@extends('layouts.dashboard')

@section('title','Create Sale Order')
@section('content')


@php
date_default_timezone_set("Asia/Bangkok");

@endphp

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#customerTable').DataTable();
        $('#productTable').DataTable();
    });

</script>

<form method="POST" action="" id="document">

    <div class="card">
        {{-- <div class="document-loading" v-if="!page_loaded">
                    <div><i class="fas fa-spinner fa-pulse fa-7x"></i></div>
                </div> --}}

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <div class="row">
                        <div class="ml-3 document-contact-without-contact cusDiv">
                            <div class="aka-box aka-box--large aka-select">
                                <div class="document-contact-without-contact-box">
                                    <button type="button" class="btn-aka-link aka-btn--fluid document-contact-without-contact-box-btn" data-toggle="modal" data-target="#cusModal">
                                        <i class="far fa-user fa-2x"></i> &nbsp; Add a customer
                                    </button>
                                </div>
                            </div>
                        </div>


                        @foreach ($customers as $cus)
                        <div id="info{{ $cus->customerID }}" class="ml-3 cusDiv" style="display: none">
                            <div class="table-responsive">
                                <table class="table table-borderless p-0">
                                    <tbody>
                                        <tr>
                                            <th class="p-0" style="text-align: left;"><strong class="d-block aka-text">{{ $cus->customerName }}</strong></th>
                                        </tr>
                                        <tr>
                                            <th class="p-0" style="text-align: left; white-space: normal;">
                                                {{ $cus->address }}
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="p-0" style="text-align: left;">
                                                Tax number: {{ $cus->taxNumber }}
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="p-0" style="text-align: left;">
                                                +{{ $cus->phone }}
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="button" class="btn btn-link p-0" data-toggle="modal" data-target="#cusModal">
                                Choose a different customer
                            </button>
                        </div>
                        @endforeach
                    </div>
                </div>
                {{-- Modal Customers --}}
                <div class="modal fade" id="cusModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Customers List</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table id="customerTable" class="table">
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Tax Number</th>
                                            <th>Address</th>
                                            <th>Choose</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customers as $cus)
                                        <tr>
                                            <td>{{ $cus->customerName }}</td>
                                            <td>{{ $cus->taxNumber }}</td>
                                            <td>{{ $cus->address }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" id="cus{{ $cus->customerID }}">
                                                    <i class="fas fa-arrow-right"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <script>
                                            $(document).ready(function() {
                                                $("#cus{{ $cus->customerID }}").click(function() {
                                                    $('.cusDiv').hide();
                                                    $("#info{{ $cus->customerID }}").show();
                                                    $('.modal').modal('hide');
                                                });
                                            });

                                        </script>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <div class="row mb-7">
                        {{-- Invoice Date  --}}

                        <div class="form-group col-md-6 required">

                            <label for="document_number" class="form-control-label">Invoice Date</label>
                            <div class="input-group input-group-merge ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                                <input type="date" class="form-control" name="document_number" id="document_number" value="{{ date("Y-m-d") }}">
                            </div>
                        </div>

                        {{-- Invoice Number  --}}
                        <div class="form-group col-md-6 required">
                            <label for="document_number" class="form-control-label">Invoice Number</label>
                            <div class="input-group input-group-merge ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-file"></i>
                                    </span>
                                </div>
                                <input class="form-control" name="document_number" id="document_number" value="1201">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Product Modal --}}
            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog  modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Product List</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table id="productTable" class="table">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Manufacture</th>
                                        <th>Quantity</th>
                                        <th>Choose</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->productName }}</td>
                                        <td>{{ $product->manufacture }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" id="product{{ $product->productName }}">
                                                <i class="fas fa-arrow-right"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <div id="info{{ $product->productName }}" style="display: none">
                                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modelId">
                                            {{ $product->productName }}
                                        </button>
                                    </div>
                                    <script>
                                        $(document).ready(function() {
                                            $("#product{{ $product->productName }}").click(function() {
                                                $('.proDiv').replaceWith($('#info{{ $product->productName }}').clone().addClass("proDiv"));
                                                $('.proDiv').show();
                                                $('.modal').modal('hide');
                                            });
                                        });

                                    </script>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row document-item-body">
                <div class="col-sm-12 p-0" style="table-layout: fixed;">
                    {{-- Talbe  --}}
                    <div class="table-responsive overflow-x-scroll overflow-y-hidden">
                        <table class="table" style="table-layout: fixed;" id="">
                            <colgroup>
                                <col class="document-item-40-px">
                                <col class="document-item-20">
                                <col class="document-item-10">
                                <col style="width: 15%">
                                <col class="document-item-10">
                                <col style="width: 15%">
                                <col class="document-item-10">
                                <col class="document-item-20">
                                <col class="document-item-40-px">

                            </colgroup>
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Product Name</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Tax</th>
                                    <th class="text-center">Subtotal</th>
                                    <th class="text-center">Discount</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody id="item-rows" class="table-padding-05">
                                <tr id="a">
                                    {{-- ID --}}
                                    <td class="align-middle px-1"></td>
                                    {{-- Product --}}
                                    <td class="align-middle px-1 text-center">
                                        <div class="proDiv">
                                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modelId">
                                                Choose Product
                                            </button>
                                        </div>
                                    </td>
                                    {{-- Quantity --}}
                                    <td class="px-1"><input type="text" class="form-control text-right" name="quantity1" id="quantity1" placeholder="0"></td>
                                    {{-- Price --}}
                                    <td class="align-middle px-1">
                                        <div class="input-group">
                                            <input class="form-control text-right" name="price1" id="price1" placeholder="0.00" />
                                            <div class="input-group-append">
                                                <span class="input-group-text">VND</span>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- Tax --}}
                                    <td class="px-1">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">%</span>
                                            </div>
                                            <input type="tel" class="form-control text-right" name="tax1" id="tax1" placeholder="0">
                                        </div>
                                    </td>
                                    {{-- Subtotal --}}
                                    <td class="align-middle px-1">
                                        <div class="input-group">
                                            <input class="form-control text-right" name="subtotal1" id="subtotal1" placeholder="0.00" disabled="disabled" />
                                            <div class="input-group-append">
                                                <span class="input-group-text">VND</span>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- Discount --}}
                                    <td class="px-1">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">%</span>
                                            </div>
                                            <input type="tel" class="form-control text-right" name="discount1" id="discount1" placeholder="0">
                                        </div>
                                    </td>
                                    {{-- Amount --}}
                                    <td class="align-middle px-1">
                                        <div class="input-group">
                                            <input class="form-control text-right" name="amount1" id="amount1" placeholder="0.00" disabled="disabled" />
                                            <div class="input-group-append">
                                                <span class="input-group-text">VND</span>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- Delete Row --}}
                                    <td class="align-middle px-1" id="delete-items">
                                        <button type="button" class="btn btn-link btn-delete p-0"><i class="far fa-trash-alt"></i></button>
                                    </td>
                                </tr>

                                <tr id="addItem">
                                    <td colspan="9" class="text-right border-bottom-0 p-0">
                                        <div id="select-item-button-9" class="product-select">
                                            <div class="item-add-new">
                                                <button type="button" class="btn btn-link w-100">
                                                    <i class="fas fa-plus-circle"></i> &nbsp; Add an Item
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function() {
                    var row = 1;
                    $("#addItem").click(function() {
                        $("#item-rows").append($("#a").clone());
                        $('#item-rows').find('#addItem').detach().appendTo('#item-rows');
                        row++;
                    });

                    $(".form-control").on('change keyup click', function() {
                        var quantity = $('#quantity1').val();
                        var price = $('#price1').val();
                        var tax = $('#tax1').val();
                        var subtotal = price * quantity * (1 - tax / 100);
                        var discount = $('#discount1').val();
                        var amount = subtotal * (1 - discount / 100);
                        var total = amount;
                        console.log(amount);
                        $('#subtotal1').val((subtotal).toFixed(2));
                        $('#amount1').val((amount).toFixed(2));
                        $('#total').val((amount).toFixed(2));
                    });
                    $(document).on('click', '#delete-items', function() {
                        if (row > 1) {
                            $(this).closest('tr').remove();
                            row--;
                        }
                        return false;
                    });
                });

            </script>

            {{-- End Add Item  --}}

            <div class="row document-item-body">
                <div class="col-sm-12 mb-4 p-0">
                    <div class="table-responsive overflow-x-scroll overflow-y-hidden">
                        <table id="totals" class="table">
                            <colgroup>
                                <col class="document-total-50">
                                <col class="document-total-30">
                                <col class="document-total-25">
                                <col class="document-total-50-px">
                            </colgroup>
                            <tbody id="invoice-total-rows" class="table-padding-05">
                                {{-- Total  --}}
                                <tr id="tr-total">
                                    <td class="border-top-0 pt-0 pb-0"></td>
                                    <td class="text-right border-top-0 border-right-0 align-middle pt-0 pb-0 pr-0">
                                        <strong class="document-total-span">Total</strong>
                                    </td>
                                    <td class="text-right border-top-0 long-texts pt-0 pb-0 pr-3">
                                        <div class="input-group">
                                            <input class="form-control text-right" name="total" id="total" placeholder="0.00" disabled="disabled" />
                                            <div class="input-group-append">
                                                <span class="input-group-text">VND</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="border-top-0 pt-0 pb-0" style="max-width: 50px;"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- Description  --}}

            <div class="row embed-card-body-footer">
                <div class="form-group col-md-12 embed-acoordion-textarea">
                    <label for="notes" class="form-control-label">Description</label>

                    <textarea class="form-control embed-card-body-footer-textarea" data-name="notes" placeholder="Enter Notes" v-model="form.notes" rows="3" name="notes" cols="50" id="notes"></textarea>

                    <div class="invalid-feedback d-block" v-if="form.errors.has(&quot;notes&quot;)" v-html="form.errors.get(&quot;notes&quot;)">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Save/Cancel  --}}
    <div class="card">
        <div class="card-footer">
            <div class="row save-buttons">
                <div class="col-md-12">
                    <a href="http://localhost/laravel/akaunting/1/sales/invoices" class="btn btn-outline-secondary">Cancel</a>

                    <button :disabled="form.loading" type="submit" class="btn btn-icon btn-success"><span v-if="form.loading" class="btn-inner--icon"><i class="aka-loader"></i></span> <span :class="[{'ml-0': form.loading}]" class="btn-inner--text">Save</span></button>
                </div>


            </div>
        </div>
    </div>

    <input id="type" v-model="form.type" name="type" type="hidden" value="invoice">
    <input id="status" v-model="form.status" name="status" type="hidden" value="draft">
    <input id="amount" v-model="form.amount" name="amount" type="hidden" value="0">
</form>



@section('script')

{{-- <script src="{{ asset('js/common/documents.js?v=2.1.16') }}"></script> --}}

@endsection

@endsection
