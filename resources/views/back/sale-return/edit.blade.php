@extends('back.layout.app')
@section('title', 'Update Sale Return ')
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
                <h3 class="all-adjustment text-center pb-2 mb-0">Edit Sale Return</h3>
            </div>
            <form class="container-fluid" action="{{ route('sale_return.update' , $sale_return->id) }}" method="POST" id="createSaleForm">
                @csrf
                <div class="card card-shadow rounded-3 border-0 mt-5">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" class="mb-1 fw-bold">Date <span
                                            class="text-danger">*</span></label>

                                    <input class="form-control subheading" type="date" value="{{ $sale_return->date ?? ''}}" />

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" class="mb-1 fw-bold">Sale <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control subheading" type="text" id="sale_ref"
                                        value="{{ $sale_return->reference ?? '' }}" readonly />

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" class="mb-1 fw-bold">Status <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control form-select subheading mt-1"
                                        aria-label="Default select example" name="status" id="status">
                                        <option disabled>Select Status</option>
                                        <option value="received" {{$sale_return == 'received' ? 'selected': ''}}>Received</option>
                                        <option value="pending" {{$sale_return == 'pending' ? 'selected': ''}}>Pending</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-shadow rounded-3 border-0 mt-4 p-3">
                    <div class="table-responsive">
                        <h3 class="all-adjustment text-center pb-1 mb-3">List Product Return <span
                                class="text-danger">*</span></h3>
                        <span class="alert alert-danger p-1 m-1 rounded mb-2">Any products with a quantity set to 0 won't be
                            refunded</span>
                        <table class="table text-center mt-2" id="mainTable">

                            <thead class="fw-bold ">
                                <tr>
                                    <th class="align-middle">#</th>
                                    <th class="align-middle">Product</th>
                                    <th class="align-middle">Net Unit Price</th>
                                    <th class="align-middle">Qty sold</th>
                                    <th class="align-middle">Qty return</th>
                                    <th class="align-middle">Discount</th>
                                    <th class="align-middle">Tax</th>
                                    <th class="align-middle">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sale_return->return_items as $product)
                                @php
                                    $item = \App\Models\ProductItem::where('sale_id',$sale_return->sales->id)->where('product_id',$product->product_id)->first();
                                    $item->load('sale_units');
                                @endphp
                                    <tr>
                                        <td class="align-middle" data-product="{{ $product->product }}">
                                            {{ $loop->iteration }}</td>
                                        <td class="align-middle"> {{ $product->product->sku ?? '' }} ({{ $product->product->name ?? '' }}) </td>
                                        <td class="product_sell_price align-middle">
                                            {{ $product->product->sell_price ?? '' }} </td>
                                        {{-- <td class="align-middle"> {{ $item->quantity ?? '' }} </td> --}}
                                        <td class="align-middle"> <span class="badges bg-darkwarning p-1">{{ $item->quantity ?? '' }} {{ $item->sale_units?->short_name ? $item->sale_units->short_name : ''}}</span></td>
                                        <td class="align-middle">
                                            <div class="quantity d-flex justify-content-center align-items-center">
                                                <button type="button" class="btn qty-minus-btn" id="minusBtn">
                                                    <i class="fa-solid fa-minus"></i>
                                                </button>
                                                <input type="number" id="quantityInput"
                                                    class="product_qty border-0 qty-input " value="{{ $product->return_quantity ?? '' }}" min="0" />
                                                <button type="button" class=" btn qty-plus-btn" id="plusBtn">
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="align-middle">{{ $sale_return->sales->discount ?? '' }} </td>
                                        <td class="align-middle">{{ $sale_return->sales->order_tax ?? '' }} </td>
                                        <td class="product_price align-middle" id="subtotal">{{$product->subtotal }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row mt-2 px-3">
                        <div class="col-md-8"></div>
                        <div class="col-md-4 border rounded-2">
                            <div class="row border-bottom subheading">
                                <div class="col-md-6 col-6">Order Tax</div>
                                <div class="col-md-6 col-6" id="order_tax_display">$0.00</div><span> (0.00%)</span>
                                {{-- <div class="col-md-6 col-6" id="order_tax_display"></div><span> (0.00%)</span> --}}
                            </div>

                            <div class="row border-bottom">
                                <div class="col-md-6 col-6">Discount</div>
                                <div class="col-md-6 col-6" id="discount_display">0.00</div>
                            </div>

                            <div class="row border-bottom">
                                <div class="col-md-6 col-6">Shipping</div>
                                <div class="col-md-6 col-6" id="shipping_display">0.00</div>
                            </div>

                            <div class="row disabled-bg">
                                <div class="col-md-6 col-6">Grand Total</div>
                                <div class="col-md-6 col-6" id="grand_total">{{$sale_return->grand_total}}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Input Fields -->
                <div class="card card-shadow rounded-3 border-0 mt-4 p-2">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="order_tax" class="mb-1 fw-bold">Order Tax</label>
                                    <input type="number" placeholder="0%" class="form-control subheading"value="0"
                                        id="order_tax" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="discount" class="mb-1 fw-bold">Discount</label>
                                    <input type="number" placeholder="$0.00" class="form-control subheading"value="0"
                                        id="discount" />

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="shipping" class="mb-1 fw-bold">Shipping </label>
                                    <input type="number" placeholder="$0.00" class="form-control subheading"
                                        id="shipping" value="0" />
                                </div>
                            </div>
                        </div>


                        <div class="form-group mt-2">
                            <label for="details" class="mb-1 fw-bold">Please provide any details</label>
                            <textarea class="form-control subheading" id="details" placeholder="A few words" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <!-- Input Fields End -->
                <button class="btn save-btn text-white mt-3" type="submit">Submit</button>

            </form>
        </div>

    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const productCodeInput = document.getElementById("product_code");

            // Remove existing handlers to prevent duplicate bindings
            $(document).off("click", ".qty-minus-btn").on("click", ".qty-minus-btn", function() {
                var input = $(this).siblings(".qty-input");
                var currentValue = parseInt(input.val());
                if (currentValue > 0) {
                    input.val(currentValue - 1).change();
                }
            });

            $(document).off("click", ".qty-plus-btn").on("click", ".qty-plus-btn", function() {
                var input = $(this).siblings(".qty-input");
                var currentValue = parseInt(input.val());
                input.val(currentValue + 1).change();
            });
            // Handle changes in quantity
            $(document).on('change', '.qty-input', function() {
                const quantity = $(this).val();
                const stock = $(this).closest('tr').find('td:nth-child(4)').text();
                if(quantity > parseFloat(stock)){
                    toastr.error('Quantity exceeded');
                    $(this).val(parseFloat(stock));
                }
                const price = $(this).closest('tr').find('td:nth-child(3)').text();
                const subtotal = parseInt(quantity) * parseFloat(price);
                $(this).closest('tr').find('td:nth-child(8)').text(subtotal.toFixed(2));
                calculateTotal();
            });

            // Event listeners for discount, shipping, and order tax inputs
            $('#discount, #shipping, #order_tax').on('input', calculateTotal);


        });

        // function calculateTotal() {
        //     let subtotal = 0;
        //     $('.table tbody tr').each(function() {
        //         subtotal += parseFloat($(this).find('td:nth-child(8)').text() || 0);
        //     });

        //     // Assume `orderTax` is a percentage value from an input field

        //     const orderTax = parseFloat($('#order_tax').val() == '' ? 0 : $('#order_tax').val()) / 100;
        //     const taxAmount = subtotal * orderTax;

        //     const discountValue = parseFloat($('#discount').val() == '' ? 0 : $('#discount').val());

        //     const shipping = parseFloat($('#shipping').val() == '' ? 0 : $('#shipping').val());

        //     const grandTotal = subtotal + taxAmount - discountValue + shipping;

        //     // Update the UI
        //     $('#order_tax_display').text(`$${taxAmount.toFixed(2)} (${orderTax * 100}%)`);
        //     $('#discount_display').text(`$${discountValue.toFixed(2)}`);
        //     $('#shipping_display').text(`$${shipping.toFixed(2)}`);
        //     $('#grand_total').text(`$${grandTotal.toFixed(2)}`);
        //     if ($('#payment_status').val() == 'paid') {
        //         $('#amount_pay').val(grandTotal);
        //         $('#amount_recieved').val(grandTotal);
        //     }

        // }
        function calculateTotal() {
            let subtotal = 0;
            $('.table tbody tr').each(function() {
                const quantity = parseInt($(this).find('td:nth-child(5) input').val()) ||
                0; // Parse quantity as integer
                const price = parseFloat($(this).find('td:nth-child(3)').text()) || 0; // Parse price as float
                const itemSubtotal = quantity * price;
                subtotal += itemSubtotal;
                $(this).find('td:nth-child(8)').text(itemSubtotal.toFixed(2)); // Update subtotal for each row
            });

            // Calculate total tax, discount, shipping, and grand total
            const orderTax = parseFloat($('#order_tax').val()) || 0;
            const discountValue = parseFloat($('#discount').val()) || 0;
            const shipping = parseFloat($('#shipping').val()) || 0;

            const taxAmount = subtotal * (orderTax / 100);
            const grandTotal = subtotal + taxAmount - discountValue + shipping;

            // Update UI with calculated values
            $('#order_tax_display').text(`$${taxAmount.toFixed(2)} (${orderTax}%)`);
            $('#discount_display').text(`$${discountValue.toFixed(2)}`);
            $('#shipping_display').text(`$${shipping.toFixed(2)}`);
            $('#grand_total').text(`$${grandTotal.toFixed(2)}`);
        }



        $(document).ready(function() {
            $('#createSaleForm').on('submit', function(e) {
                e.preventDefault();

                // Collect form data
                let formData = {
                    date: $(this).find('[type=date]').val(),
                    // sale_ref: $(this).find('#sale_ref').val(),
                    sale_id: {{$sale_return->id}},
                    order_tax: $('#order_tax').val(),
                    discount: $('#discount').val(),
                    shipping: $('#shipping').val(),
                    status: $('#status').val(),
                    details: $('#details').val(),
                    grand_total: parseFloat(document.getElementById('grand_total').textContent.replace(
                        '$', '')),

                    return_items: [],
                };

                // Collect order items
                $('.table tbody tr').each(function() {
                    let item = {
                        id: $(this).find('td:first-child').data('product').id,
                        // quantitySold: $(this).find('td:nth-child(6)').val(),
                        quantityReturn: $(this).find('td:nth-child(5) input').val(),
                        price: $(this).find('td:nth-child(3)').text(),
                        subtotal: $(this).find('td:nth-child(8)').text(),
                        // stock: $(this).find('td:nth-child(5)').text(),

                    };
                    if (item.quantityReturn != 0) {
                        formData.return_items.push(item);
                    }
                });

                // AJAX request to server
                $.ajax({
                    url: '/sale_return/{{$sale_return->id}}',
                    type: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    success: function(response) {
                        console.log(response);
                        toastr.success(response.message);
                        window.location.href = "{{ route('sale_return.index') }}";
                        console.log('Success:', response);
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
                    }
                });
            });
        });
    </script>

@endsection
