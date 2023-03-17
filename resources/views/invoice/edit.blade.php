@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">{{ __('Invoice') }}</h1>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 border border-danger">
                <form method="post" class="" id="Invoice">
                    {{ csrf_field() }}
                    <div class="card mb-3">
                        <div class="card-header">
                            Titke Here First
                        </div>
                        <div class="card-body">
                            <div class="row g-3 ">
                                <div class="col-md-6 form-floating mb-3 p-1">
                                    <input type="text" name="title" value="{{ $invoice->title }}" class="form-control"
                                        id="floatingTitle" placeholder="Example">
                                    <label for="floatingTitle">Title : </label>
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    <span class="text-danger">
                                        <strong id="title-error"></strong>
                                    </span>
                                </div>
                                <div class="col-md-6 form-floating mb-3 p-1">
                                    <input type="text" name="invoice_id_number" value="{{ $invoice->invoice_id_number }}" class="form-control"
                                        id="floatingInvoiceIdNumber" placeholder="#12324">
                                    <label for="floatingInvoiceIdNumber">Invoice # : </label>
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    <span class="text-danger">
                                        <strong id="invoice-id-number-error"></strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">
                            Title Here
                        </div>
                        <div class="card-body">
                            <input type="text" class="mb-3 visually-hidden" name="customer-id" value="{{$selectedCustomer->id}}" id="customer-id">
                            <div class="row g-3">
                                <div class="col-md-6">
                                   
                                    <div class="mb-3 row test align-items-center " style="display: flex">
                                        <label for="staticEmail" class="col-sm-3 col-form-label fw-bolder ">Name :</label>
                                        <div class="col-sm-9">
                                            <span id="customer-name">{{$selectedCustomer->name}}</span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row test align-items-center " style="display: flex">
                                        <label for="staticEmail" class="col-sm-3 col-form-label fw-bolder ">Phone Number :</label>
                                        <div class="col-sm-9">
                                            <span id="customer-phone_number">{{$selectedCustomer->phone_number}}</span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row test align-items-center " style="display: flex">
                                        <label for="staticEmail" class="col-sm-3 col-form-label fw-bolder ">Address :</label>
                                        <div class="col-sm-9">
                                            <span id="customer-address">{{$selectedCustomer->address}}</span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row test align-items-center " style="display: flex">
                                        <label for="staticEmail" class="col-sm-3 col-form-label fw-bolder ">Email :</label>
                                        <div class="col-sm-9">
                                            <span id="customer-email">{{$selectedCustomer->email}}</span>
                                        </div>
                                    </div>
                                    {{-- {{$customer->name}} --}}
                                    {{-- <label for="inputEmail4" class="form-label">Customer</label> --}}
                                    <button type="button" class="btn border border-1 edit-customer-btn" data-bs-toggle="modal"
                                        data-bs-target="#addCustomer" style="display: flex">Edit
                                        Customer</button>
                                    <button type="button" style="display: none"> class="btn border border-1 add-customer-btn" data-bs-toggle="modal"
                                        data-bs-target="#addCustomer">Add Customer</button>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-sm table caption-top w-50%">
                                                            <caption>List of items</caption>
                                                            <thead class="bg-dark text-white">
                                                                <tr>
                                                                    <th scope="col">Order</th>
                                                                    <th scope="col" class="text-start">Name</th>
                                                                    <th scope="col" class="text-end">Price</th>
                                                                    <th scope="col" class="text-end">Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">1</th>
                                                                    <td>Rental</td>
                                                                    <td class="text-end">9</td>
                                                                    <td class="text-end">9.00</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">2</th>
                                                                    <td>Example 1</td>
                                                                    <td class="text-end">100</td>
                                                                    <td class="text-end">100.00</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">3</th>
                                                                    <td>Larry</td>
                                                                    <td class="text-end">150</td>
                                                                    <td class="text-end">150</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <button type="button" class="btn border border-1" data-bs-toggle="modal"
                                                        data-bs-target="#addItemType">Add Item</button>
                                                </div>
                                                <div class="col-6 ">
                                                    here
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingDescription" style="height: 100px"></textarea>
                                        <label for="floatingDescription">Description</label>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <button type="button" id ="submitFormInvoice" class="btn btn-warning">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal Add Customer -->
        <div class="modal fade" id="addCustomer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="addCustomerLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <form method="post" class="" id="Customer">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="staticBackdropLabel">Customer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="success-msg" class="d-none">
                                <div class="alert alert-success d-flex align-items-between fade show" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                        aria-label="Success:">
                                        <use xlink:href="#check-circle-fill" />
                                    </svg>
                                    <div>
                                        An example success alert with an icon
                                    </div>
                                </div>
                            </div>


                            {{-- <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" id="floatingName" placeholder="Juan Dela Cruz">
                            <label for="floatingName">Name</label>
                        </div> --}}
                            @php
                                $count = 0; //Initialize variable
                            @endphp
                            <div class="form-floating mb-3">
                                <select class="form-select" name="floatingSelectCustomer" id="floatingSelectCustomer"
                                    aria-label="Floating label select example">
                                    <option value="null" data-url="null" selected>Select customer existing</option>
                                    @foreach ($customers as $customer)
                                        <option data-url="{{ route('customer-selected', $customer->id) }}"
                                            value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @php
                                            $count += 1;
                                        @endphp
                                    @endforeach

                                    <option value="new-customer" data-url="new-customer">Create Customer</option>
                                </select>
                                <label for="floatingSelect">Works with selects</label>
                            </div>
                            <div class="customer-form" style="display:none">
                                <div class="form-floating mb-3">
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control" id="customername" placeholder="Juan Dela Cruz">
                                    <label for="floatingName">Name : </label>
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    <span class="text-danger">
                                        <strong id="name-error"></strong>
                                    </span>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="phone_number" value="{{ old('phone_number') }}"
                                        class="form-control" id="customerphonenumber" placeholder="+63 906 535 0079">
                                    <label for="floatingPhoneNumber">Phone Number :</label>
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    <span class="text-danger">
                                        <strong id="phone-number-error"></strong>
                                    </span>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="address" value="{{ old('address') }}"
                                        class="form-control" id="customeraddress" placeholder="Cordova Cebu City">
                                    <label for="floatingAddress">Address :</label>
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    <span class="text-danger">
                                        <strong id="address-error"></strong>
                                    </span>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control" id="customeremail" placeholder="example@gmail.com">
                                    <label for="floatingEmail">Email Address :</label>
                                    <span class="text-danger">
                                        <strong id="email-error"></strong>
                                    </span>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="submitForm"
                                class="btn_submit btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Add Item Type -->
        <div class="modal fade" id="addItemType" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="addCustomerLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <form method="post" class="" id="Item">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="staticBackdropLabel">Item Type</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="success-msg" class="d-none">
                                <div class="alert alert-success d-flex align-items-between fade show" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                        aria-label="Success:">
                                        <use xlink:href="#check-circle-fill" />
                                    </svg>
                                    <div>
                                        An example success alert with an icon
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 form-floating mb-3">
                                <input type="text" name="name_type" value="{{ old('name_type') }}" class="form-control"
                                    id="customername" placeholder="Juan Dela Cruz">

                                <label for="floatingName">Name : </label>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <span class="text-danger">
                                    <strong id="name-type-error"></strong>
                                </span>
                            </div>
                            <div class="col-6 form-floating mb-3">

                                <input type="number" name="price" value="{{ old('price') }}" class="form-control"
                                    id="customerprice" placeholder="">
                                <label for="floatingName">Price : </label>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <span class="text-danger">
                                    <strong id="price-error"></strong>
                                </span>
                            </div>

                            <div class="col-6 form-floating mb-3">
                                <select class="form-select" name="unit_type" value="{{ old('unit_type') }}"
                                    id="floatingUnitType" aria-label="Floating label select example">
                                    <option value="null" selected>None</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label for="floatingUnitType">Unit Type</label>

                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <span class="text-danger">
                                    <strong id="unit-type-error"></strong>
                                </span>

                            </div>
                            <div class="col-12 form-floating mb-3">
                                <textarea class="form-control" name="description" placeholder="Message here" id="floatingDescription"
                                    style="height: 100px">{{ old('description') }}</textarea>
                                <label for="floatingDescription">Description</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="submitFormType" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            //  $("#customer-id").val('asdasd');
             $('body').on('click', '#submitFormInvoice', function() {
                var registerFormItem = $("#Invoice");
                var formDataInvoice = registerFormItem.serialize();
                $.ajax({
                    url: '/invoice/create',
                    type: 'POST',
                    data: formDataInvoice, 
                    success: function(data) {
                         console.log(data.URL);
                         window.location.href=data.URL;
                    }
                });
             });
            $('body').on('click', '#submitFormType', function() {
                var registerFormItem = $("#Item");
                var formDataItem = registerFormItem.serialize();
                $('#name-type-error').html("");
                $('#price-error').html("");
                $('#unit-type-error').html("");
                $('#description-error').html("");
                $.ajax({
                    url: '/invoice/item/create',
                    type: 'POST',
                    data: formDataItem,
                    success: function(data) {
                        console.log(data);
                        if (data.errors) {
                            if (data.errors.name_type) {
                                $('#name-type-error').html(data.errors.name_type[0]);
                            }
                            if (data.errors.price) {
                                $('#price-error').html(data.errors.price[0]);
                            }
                            if (data.errors.unit_type) {
                                $('#unit-type-error').html(data.errors.unit_type[0]);
                            }
                            if (data.errors.description) {
                                $('#description-error').html(data.errors.description[0]);
                            }
                        }
                        if (data.success) {
                            $('#success-msg').removeClass('d-none');
                            setInterval(function() {
                                // $('#addCustomer').modal('hide');
                                $('#success-msg').addClass('d-none');
                            }, 3000);
                        }
                    }
                });
            });

            $('body').on('click', '#submitForm', function() {
                var registerForm = $("#Customer");
                var formData = registerForm.serialize();
                $('#name-error').html("");
                $('#phone-number-error').html("");
                $('#address-error').html("");
                $('#email-error').html("");
                $.ajax({
                    url: '/invoice/customer/create',
                    type: 'POST',
                    data: formData,
                    success: function(data) {
                        console.log(data);
                        if (data.errors) {
                            if (data.errors.name) {
                                $('#name-error').html(data.errors.name[0]);
                            }
                            if (data.errors.phone_number) {
                                $('#phone-number-error').html(data.errors.phone_number[0]);
                            }
                            if (data.errors.address) {
                                $('#address-error').html(data.errors.address[0]);
                            }
                            if (data.errors.email) {
                                $('#email-error').html(data.errors.email[0]);
                            }
                        }
                        if (data.success) {

                          $('.test').addClass('d-flex');
                            $('.edit-customer-btn').addClass('d-block');
                            $('.add-customer-btn').addClass('d-none');

                            $('#customer-id').text(data.id);
                            $('#customer-name').text(data.name);
                            $('#customer-phone_number').text(data.phone_number);
                            $('#customer-address').text(data.address);
                            $('#customer-email').text(data.email);

                            $('#success-msg').removeClass('d-none');

                            setInterval(function() {
                                // $('#addCustomer').modal('hide');
                                $('#success-msg').addClass('d-none');
                            }, 3000);
                        }
                    }
                });
            });
            $('#floatingSelectCustomer').change(function() {
                var str = "";
                $("#floatingSelectCustomer option:selected").each(function() {
                    str += $(this).data('url');
                });
                if (str === 'null') {
                    $('.edit-customer-btn').addClass('d-none');
                    $('.edit-customer-btn').removeClass('d-block');

                    $('.add-customer-btn').removeClass('d-none');
                    $('.add-customer-btn').addClass('d-block');

                    $('#customer-name').text('');
                    $('#customer-phone_number').text('');
                    $('#customer-address').text('');
                    $('#customer-email').text('');
                } else if (str === 'new-customer') {
                    // alert('new-customer here');
                    $('.customer-form').removeClass('d-hide');
                    $('.customer-form').addClass('d-block');
                } else {
                    // alert(str);
                    $('.customer-form').removeClass('d-block');
                    $('.customer-form').addClass('d-hide');
                    $.getJSON(str, function(data) {

                        $('#addCustomer').modal('show');
                        // $('#addCustomer .customer-form')addClass('d-block');
                        // $('#customername').value('sample');
                        $('#customer-id').text(data.id);
                        $('#customer-name').text(data.name);
                        $('#customer-phone_number').text(data.phone_number);
                        $('#customer-address').text(data.address);
                        $('#customer-email').text(data.email);
                        // $('#addCustomer').modal('hide');

                        $('.test').addClass('d-flex');

                        $('.edit-customer-btn').addClass('d-block');
                        $('.edit-customer-btn').removeClass('d-none');

                        $('.add-customer-btn').removeClass('d-block');
                        $('.add-customer-btn').addClass('d-none');
                    })
                }
            });
            // function add(){
            // var name = document.getElementById("name");
            // var surname = document.getElementById("surname");
            // var output = document.querySelector("#output tbody");
            // output.innerHTML += "<tr><td>"+name.value+"</td><td>"+surname.value+"</td></tr>"
            // }
            // $('.btn_submit').click(function(){
            //     alert(' hey');
            // })
            // var pathArray = window.location.origin;
            // var url = pathArray+'/invoice/customer';
            // // url = "";
            // $.get(url, function (data) {
            //     alert(data.name);
            // });
            // var val = {{ route('latest-customer') }};
        </script>
    @endsection
