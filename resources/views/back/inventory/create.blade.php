@extends('back.layout.app')
@section('title', 'Received Inventory')
@section('style')
    <link href="{{ asset('back/assets/js/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <style>
        .ui-autocomplete {
            padding: 0 !important;
        }

        .ui-menu .ui-menu-item-wrapper {
            text-align: left;
        }
    </style>
@endsection

@section('content')

    <div class="content">

        <div class="container-fluid pt-4 px-4 mb-5">
            <div class="border-bottom">
                <h3 class="all-adjustment text-center pb-2 mb-0">Receive Inventory</h3>
            </div>
            <form action="" method="post">
                @csrf
                <div class="card card-shadow rounded-3 border-0 mt-5">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" class="mb-1 fw-bold">Date <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control subheading" type="date" id="date"
                                        value="<?php echo date('Y-m-d'); ?>" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" class="mb-1 fw-bold">Warehouse <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control form-select subheading mt-1" required
                                        aria-label="Default select example" name="warehouse_id"id="warehouse_id"
                                        @if(auth()->user()->hasRole(['Cashier', 'Manager'])) disabled @endif>
                                        <option value="">Select Warehouse</option>
                                        @foreach ($warehouse as $warehouse)
                                            <option value="{{ $warehouse->id }}" @if(auth()->user()->hasRole(['Cashier', 'Manager'])) selected @endif>{{ $warehouse->users->name ?? ''}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="form-group mt-2">
                            <label for="exampleFormControlSelect1" class="mb-1 fw-bold">Product</label>
                            <div class="input-group">
                                <input type="text" class="form-control subheading" placeholder="Product Code / Name"
                                    id="product_code" name="product_code" />
                                <span class="input-group-text subheading" id="basic-addon2"><i
                                        class="bi bi-upc-scan"></i></span>
                            </div>
                            <p class="subheading m-0 p-0">
                                Scan the barcode or enter symbology
                            </p>
                        </div> --}}

                        <div class="form-group mt-2">
                            <label for="exampleFormControlSelect1" class="mb-1 fw-bold">Product</label>
                            <div class="input-group">
                                <input type="text" class="form-control subheading" placeholder="Product Code / Name"
                                    id="product_code" name="product_code" />
                                <div id="suggestionsContainer"></div>

                                <span class="input-group-text subheading" id="basic-addon2"><i
                                        class="bi bi-upc-scan"></i></span>
                                {{-- <div class="search-dropdown" id="searchDropdown" style=" display: none;"></div> --}}
                            </div>
                            <p class="subheading m-0 p-0">
                                Scan the barcode or enter symbology
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card card-shadow rounded-3 border-0 mt-4 p-3">
                    <h3 class="all-adjustment text-center pb-1 mb-3 ">Products</h3>
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead class="fw-bold ">
                                <tr>
                                    <th class="align-middle">#</th>
                                    <th class="align-middle">Product Code</th>
                                    <th class="align-middle">Product Name</th>
                                    <th class="align-middle">Stock</th>
                                    <th class="align-middle">Qty</th>
                                    <th class="align-middle">Type</th>
                                    <th class="align-middle">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                </div>

                <!-- Input Fields -->
                <div class="card card-shadow rounded-3 border-0 mt-5 p-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group mt-2">
                                <label for="note" class="mb-1 fw-bold">Note</label>
                                <textarea class="form-control subheading" id="note" placeholder="Add Note" rows="5" name="note"></textarea>
                            </div>
                        </div>

                    </div>
                    <!-- Input Fields End -->
                </div>

                <button class="btn save-btn mt-3 text-white" id="submitBtn">
                    <div class="spinner-border text-light spinner-border-sm ms-2 me-2" role="status"
                                id="btn-spinner" style="display: none">
                    </div>
                    <span id="btn-text">Save</span>
                </button>
            </form>


            <!-- Modal -->
            <div class="modal fade" id="exampleModalToggle" tabindex="-1" aria-labelledby="exampleModalToggleLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title product-title" id="exampleModalToggleLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        // document.addEventListener("DOMContentLoaded", function() {
        //     const productCodeInput = document.getElementById("product_code");

        //     productCodeInput.addEventListener("input", function() {
        //         const productCode = this.value || 0;
        //         let prodCount = 1;

        //         // Perform AJAX request
        //         fetch('/get-product-details/' + productCode) // Adjust URL as per your routes
        //             .then(response => response.json())
        //             .then(data => {
        //                 console.log(data);
        //                 if (data.success) {
        //                     // Add new row to the table
        //                     const tableBody = document.querySelector(".table tbody");
        //                     const row = document.createElement("tr");

        //                     // Assuming data contains product name, code, etc.
        //                     row.innerHTML = `
    //                         <td class="align-middle" data-product-id=${data.product.id} >${prodCount}</td>
    //                         <td class="d-none"></td>
    //                         <input type="hidden" class="product_id" value="${data.product.id}"/>
    //                         <td class="align-middle sku">${data.product.sku}</td>
    //                         <td class="align-middle">${data.product.name}</td>
    //                         <td class="align-middle">
    //                         <span class="badges bg-darkwarning p-1">${data.product.quantity}</span>
    //                         </td>
    //                         <td class="align-middle">
    //                         <div
    //                             class="quantity d-flex justify-content-center align-items-center"
    //                         >
    //                             <button class="btn qty-minus-btn" id="minusBtn" type="button">
    //                             <i class="fa-solid fa-minus"></i>
    //                             </button>
    //                             <input
    //                             type="number"
    //                             id="quantityInput"
    //                             class="border-0 qty-input"
    //                             value="1"
    //                             />
    //                             <button class="btn qty-plus-btn" id="plusBtn" type="button">
    //                             <i class="fa-solid fa-plus"></i>
    //                             </button>
    //                         </div>
    //                         </td>
    //                         <td class="align-middle">
    //                             <select class="form-select inventory_type" name="inventory_type">
    //                                 <option value="addition">Addition</option>
    //                                 <option value="subtraction">Subtraction</option>
    //                             </select>
    //                         </td>
    //                         <td class="align-middle">
    //                         <div class="d-flex justify-content-center removeRowBtn">
    //                             <img src="{{ asset('back/assets/dasheets/img/plus-circle.svg') }}" alt="" />
    //                         </div>
    //                         </td>
    //                     `;

        //                     tableBody.appendChild(row);
        //                     prodCount++;
        //                 }
        //             })
        //             .catch(error => console.error('Error:', error));
        //     });
        // });

        document.addEventListener("DOMContentLoaded", function() {
            const productCodeInput = document.getElementById("product_code");
            let prodCount = 1;

            var suggestionsContainer = $("#suggestionsContainer");
            $("#product_code").autocomplete({
                source: function(request, response) {
                    var searchTerm = request.term;
                    performAddressSearch(searchTerm, response);
                },
                minLength: 2,
                select: function(event, ui) {
                    console.log(ui.item);

                    const tableBody = document.querySelector(".table tbody");
                    const row = document.createElement("tr");
                    let isDuplicate = false;
                    let hasRow = true;
                    document.querySelectorAll('.table tbody tr').forEach(row => {
                        if (row.querySelector('td:nth-child(2)').textContent === ui.item.product
                            .sku) {
                            // Select the input element
                            let qtyInput = $(row).find('td:nth-child(6) .qty-input');

                            // Get the current value of the input
                            let currentValue = parseInt(qtyInput.val());

                            // Increment the value and set it to the input
                            qtyInput.val(currentValue + 1).change();

                            isDuplicate = true;
                        }
                    });

                    $('#warehouse_id').prop('disabled', hasRow);
                    if (!isDuplicate) {

                        // Append row code here
                        // Assuming data contains product name, code, etc.
                        row.innerHTML = `
                            <td class="align-middle" data-product-id=${ui.item.product.id} >${prodCount}</td>
                            <td class="align-middle sku">${ui.item.product.sku}</td>
                            <input type="hidden" class="product_id" value="${ui.item.product.id}"/>
                                    <td class="align-middle">${ui.item.product.name}</td>
                                    <td class="align-middle">
                                    <span class="badges bg-darkwarning p-1">${ui.item.product.warehouse_quantity}${ui.item.product.unit?.short_name ? ui.item.product.unit.short_name : '' } </span>
                                    </td>
                                    <td class="align-middle">
                                    <div
                                        class="quantity d-flex justify-content-center align-items-center"
                                    >
                                        <button class="btn qty-minus-btn" id="minusBtn" type="button">
                                        <i class="fa-solid fa-minus"></i>
                                        </button>
                                        <input
                                        type="number"
                                        id="quantityInput"
                                        class="border-0 qty-input"
                                        value="1"
                                        />
                                        <button class="btn qty-plus-btn" id="plusBtn" type="button">
                                        <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </div>
                                    </td>
                                    <td class="align-middle">
                                        <select class="form-select inventory_type" name="inventory_type">
                                            <option value="addition">Addition</option>
                                            <option value="subtraction">Subtraction</option>
                                        </select>
                                    </td>
                                    <td class="align-middle">
                                    <div class="d-flex justify-content-center removeRowBtn" style="cursor:pointer;">
                                        <img src="{{ asset('back/assets/dasheets/img/plus-circle.svg') }}" alt="" />
                                    </div>
                                    </td>
                        `;

                        tableBody.appendChild(row);
                        prodCount++;
                    }
                },
                appendTo: "#suggestionsContainer"
            }).autocomplete("instance")._renderItem = function(ul, item) {
                return $("<li>").append("<div>" + item.label + "</div>").appendTo(ul);
            };

            function performAddressSearch(searchTerm, response) {
                let warehouse = $('#warehouse_id').val();
                $.ajax({
                    url: '/get-product-detail-by-warehouse', // Replace with your search route
                    dataType: "json",
                    data: {
                        query: searchTerm,
                        warehouse_id: warehouse,
                    },
                    success: function(data) {
                        console.log(data);
                        var suggestions = [];
                        for (var i = 0; i < data.product.length; i++) {
                            suggestions.push({
                                value: data.product[i].sku,
                                label: data.product[i].name,
                                id: data.product[i].id,
                                product: data.product[i]
                            });
                        }
                        // If there's exactly one result, add it to the table automatically
                        if (suggestions.length === 1) {
                            $("#product_code").autocomplete("option", "select").call(null, null, {
                                item: suggestions[0]
                            });
                        } else {
                            // If there are multiple suggestions, show them in the dropdown
                            response(suggestions);
                        }
                    }
                });

            }


        });



        // populate the modal with product details using jquery
        $(document).on('click', '.btn', function() {
            const product = $(this).data('product');
            console.log(product);
            // populate the modal with product details
            // ...

        });



        let items = [];
        let totalAmount = 0;

        let itemCount = 1;

        function appendItem() {
            let newRow =
                `<tbody class="ui-sortable" data-repeater-item="" style=""
                    data-select2-id="230">
                    <tr data-select2-id="229">
                        <td width="25%">
                            <select class="form-control form-select item"
                                name="items[${itemCount}][item]" required>
                                @if ($products->count() > 0)
                                    <option value="" disabled selected>Select Item</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">
                                            {{ $product->name }}
                                        </option>
                                    @endforeach
                                @else
                                    <option value="" disabled selected>No item found</option>
                                @endif
                            </select>
                        </td>
                        <td>
                            <div class="form-group price-input">
                                <input class="form-control quantity" required="required"
                                    placeholder="Qty" name="items[${itemCount}][qty]" type="number" min="1"
                                    value="">
                            </div>
                        </td>
                        <td>
                            <div class="form-group input-group price-input">
                                <input class="form-control price" required="required"
                                    placeholder="Price" name="items[${itemCount}][price]" type="number"
                                    value="">
                                <span class="input-group-text">USD</span>
                            </div>
                        </td>
                        iv>
                        </td>
                        <td>
                            <div class="form-group input-group price-input">
                                <input class="form-control discount"
                                    placeholder="Discount" name="items[${itemCount}][discount]" type="number"
                                    value="">
                                <span class="input-group-text">USD</span>
                            </div>
                        </td>
                        <td class="text-right amount">0.00</td>
                        <td>
                            <a href="javascript:void(0)" class="fas fa-trash text-danger remove-item"></a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="form-group">
                                <textarea class="form-control" rows="2" placeholder="Description" name="items[${itemCount}][description]"
                                    cols="50"></textarea>
                            </div>
                        </td>
                        <td colspan="5"></td>
                    </tr>
                </tbody>`;

            $('#sortable-table').append(newRow);
            itemCount++;
        }

        $(document).on('click', '.add-item', function(e) {
            e.preventDefault();
            appendItem();
        });

        $(document).on('click', '.remove-item', function(e) {
            e.preventDefault();
            $(this).closest('tbody').remove();
            if ($('#table tbody tr').length === 0) {
                $('#warehouse_id').prop('disabled', false);
            }
        });


        function ajaxCallForCheckInventory(input, quantity, select_type, sku) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "/check-product-inventory",
                data: {
                    quantity,
                    select_type,
                    sku
                },
                success: function(response) {
                    console.log(response);
                    if (response.status) {
                        toastr.success(response.status);
                        // input.val(0)
                        let quantity = input.val();
                        input.val(quantity - 1).change();
                    }
                }
            });
        }

        $(document).on('click', '.qty-plus-btn', function() {

            var input = $(this).siblings(".qty-input");
            let quantity = parseInt(input.val());
            input.val(quantity + 1).change();
            quantity = parseInt(input.val());

            // let input = $(this).siblings(".qty-input");
            // let quantity = input.val();
            // quantity++
            // let select_type = $(this).closest('tr').find('.inventory_type').val();
            // let sku = $(this).closest('tr').find('.sku').text();

            // ajaxCallForCheckInventory(input, quantity, select_type, sku);
        });

        $(document).on('click', '.qty-minus-btn', function() {
            var input = $(this).siblings(".qty-input");
            let quantity = parseInt(input.val());
            // input.val(quantity - 1).change();
            if (quantity > 1) {
                    input.val(quantity - 1).change();
            }
            else
            {
                input.val(0).change();

            }
        });

        $(document).on('change', '.qty-input', function() {
            let input = $(this)
            let quantity = input.val();
            let select_type = $(this).closest('tr').find('.inventory_type').val();
            let sku = $(this).closest('tr').find('.sku').text();
            const stock = $(this).closest('tr').find('td:nth-child(5)').text();
            // ajaxCallForCheckInventory(input, quantity, select_type, sku);
            if(select_type != 'addition'){
                // alert(stock);
                if(quantity > parseFloat(stock)){
                    toastr.error('Quantity exceeded');
                    $(this).val(parseFloat(stock));
                }
            }
        });

        $(document).on('change', '.inventory_type', function() {

            let input = $(this).closest('tr').find('.qty-input');
            let quantity = input.val();
            let select_type = $(this).closest('tr').find('.inventory_type').val();
            let sku = $(this).closest('tr').find('.sku').text();
            const stock = $(this).closest('tr').find('td:nth-child(5)').text();
            // ajaxCallForCheckInventory(input, quantity, select_type, sku);
            if(select_type != 'addition'){
                // alert(stock);
                if(quantity > parseFloat(stock)){
                    toastr.error('Quantity exceeded');
                    input.val(parseFloat(stock));
                }
            }
        });

        $(document).on('click', '.removeRowBtn', function() {
            let row = $(this).closest('tr');
            row.remove();
            // Check if the table is empty
            if ($('.table tbody tr').length === 0) {
                $('#warehouse_id').prop('disabled', false);
            }
        })

        $(document).ready(function() {
            $('#submitBtn').on('click', function(e) {

                e.preventDefault();

                var data = [];

                // Iterate over each table row
                $('.table tbody tr').each(function(index) {
                    var row = $(this);
                    var sku = row.find('.sku').text();
                    var quantity = row.find('.qty-input').val();
                    var type = row.find('.inventory_type').val();
                    var product_id = row.find('.product_id').val();

                    // Construct an object with row data
                    var rowData = {
                        product_id: product_id,
                        sku: sku,
                        quantity: quantity,
                        type: type
                    };
                    // Push row data to the array
                    data.push(rowData);
                });

                let warehouse_id = $('#warehouse_id').val();

                let date = $('#date').val();
                let note = $('#note').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#btn-text').hide();
                $('#btn-spinner').show();

                $.ajax({
                    type: "post",
                    url: "{{ route('inventories.store') }}",
                    data: {
                        products: data,
                        warehouse_id,
                        date,
                        note
                    },

                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.success);
                            // location.reload();
                            window.location.href = "{{ route('inventories.index') }}";
                        } else if (response.message) {
                            toastr.success(response.message);
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) { // If validation fails
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                toastr.error(value[0]); // Display first error message
                            });
                        } else {
                            toastr.error('An error occurred while processing your request.');
                        }
                    },
                    complete: function() {
                        $('#btn-text').show();
                        $('#btn-spinner').hide();
                    }
                });

            })
        });
    </script>
@endsection
