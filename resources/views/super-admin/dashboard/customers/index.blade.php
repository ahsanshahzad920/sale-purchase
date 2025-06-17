@extends('super-admin.dashboard.layout.app')
@section('title', 'Customer')
@section('style')
    <link href="{{ asset('back/assets/js/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <style>
        .dataTables_paginate {
            display: none;
        }

        .dataTables_length {
            display: none;
        }

        .dataTables_info {
            display: none;
        }
    </style>
@endsection

@section('content')

    <div class="content">

        <div class="container-fluid pt-4 px-4 mb-5">
            <div class="border-bottom">
                <h3 class="all-adjustment text-center pb-2 mb-0">All Customer</h3>
            </div>

            @include('back.layout.errors')

            <div class="card card-shadow border-0 mt-5 rounded-3">
                <div class="card-header bg-white border-0 rounded-3">
                    <div class="row my-3">
                        <div class="col-md-4 col-12">
                            <div class="input-search position-relative">
                                <input type="text" placeholder="Search User" class="form-control rounded-3 subheading"
                                    id="custom-filter" />
                                <span class="fa fa-search search-icon text-secondary"></span>
                            </div>
                        </div>

                        <div class="col-md-8 col-12 text-end">
                            <a href="#" class="btn border-danger text-danger rounded-3 mt-2 excel-btn"
                                id="download-excel">Excel <i class="bi bi-file-earmark-text"></i></a>
                            <a href="#" class="btn pdf rounded-3 mt-2" id="download-pdf">Pdf <i
                                    class="bi bi-file-earmark"></i></a>
                            <button class="btn create-btn rounded-3 mt-2" data-bs-target="#exampleModalTogglePlan"
                                data-bs-toggle="modal">
                                Add Plan <i class="bi bi-plus-lg"></i>
                            </button>
                            <button class="btn create-btn rounded-3 mt-2" data-bs-target="#exampleModalToggle"
                                data-bs-toggle="modal">
                                Create <i class="bi bi-plus-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive p-2">
                    <div class="alert alert-danger p-2 text-end" id="deletedAlert" style="display: none">
                        <div style="display: flex;justify-content:space-between">
                            <span><span id="deleteRowCount">0</span> rows selected</span>
                            <button class="btn btn-sm btn-danger" id="deleteRowTrigger">Delete</button>
                        </div>
                    </div>
                    <table id="example" class="table mb-0">
                        <thead>
                            <tr>
                                {{-- <th>
                                    <label for="myCheckbox09" class="checkbox">
                                        <input class="checkbox__input" type="checkbox" id="myCheckbox09" />
                                        <svg class="checkbox__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                                            <rect width="21" height="21" x=".5" y=".5" fill="#FFF"
                                                stroke="rgba(76, 73, 227, 1)" rx="3" />
                                            <path class="tick" stroke="rgba(76, 73, 227, 1)" fill="none"
                                                stroke-linecap="round" stroke-width="3" d="M4 10l5 5 9-9" />
                                        </svg>
                                    </label>
                                </th> --}}
                                <th class="sorting">Name</th>
                                <th class="sorting">Email</th>
                                <th class="sorting">Subdomain</th>
                                <th class="sorting">Website Link</th>
                                <th class="sorting">Status</th>
                                <th class="sorting">Plan</th>
                                <th class="sorting">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- {{dd($tenants)}} --}}
                            @foreach ($tenants as $tenant)
                                <tr>
                                    {{-- <td class="align-middle">
                                        <label for="select-checkbox" class="checkbox">
                                            <input class="checkbox__input select-checkbox deleteRow" type="checkbox"
                                                id="select-checkbox" data-id="{{ $tenant->id }}" />
                                            <svg class="checkbox__icon" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 22 22">
                                                <rect width="21" height="21" x=".5" y=".5" fill="#FFF"
                                                    stroke="rgba(76, 73, 227, 1)" rx="3" />
                                                <path class="tick" stroke="rgba(76, 73, 227, 1)" fill="none"
                                                    stroke-linecap="round" stroke-width="3" d="M4 10l5 5 9-9" />
                                            </svg>
                                        </label>
                                    </td> --}}
                                    <td class="align-middle">
                                        {{ $tenant->user->name }}
                                    </td>
                                    <td class="align-middle"> {{ $tenant->user->email }}</td>
                                    <td class="align-middle"> {{ $tenant->subdomain ?? '...' }}</td>
                                  
                                    <td class="align-middle">
                                        <a href="{{ route('/', $tenant->subdomain) }}"
                                            class="badge bg-primary text-decoration-none text-white" target="_blank">
                                            <i class="fa-solid fa-eye"></i> View</a>
                                    </td>
                                    <td class="align-middle">
                                        <select class="form-select status-select" data-tenant-id="{{ $tenant->id }}"
                                            style="width: auto; display: inline-block;">
                                            <option value="pending" {{ $tenant->status == 'pending' ? 'selected' : '' }}>
                                                Pending</option>
                                            <option value="approved" {{ $tenant->status == 'approved' ? 'selected' : '' }}>
                                                Approved</option>
                                            <option value="rejected" {{ $tenant->status == 'rejected' ? 'selected' : '' }}>
                                                Rejected</option>
                                        </select>
                                    </td>
                                    <td class="align-middle">
                                        @if (($tenant->trial_end_date) && !isset($tenant->plan_id))
                                            @if ($tenant->trial_end_date < now())
                                                <span class="badge bg-danger">Trial Expired</span>
                                            @else
                                                <span class="badge bg-warning">Trial</span>
                                            @endif
                                        @elseif (isset($tenant->plan_id) && $tenant->subscriptions?->first()->end_date && now()->greaterThan($tenant?->subscriptions?->first()->end_date))
                                            <span class="badge bg-danger">
                                                Plan Expired
                                            </span>
                                        @elseif (isset($tenant->plan_id))
                                            <span class="badge bg-success">
                                                {{ $tenant->plan->title .' | '.$tenant->plan->type  ?? '...'  }}
                                            </span>
                                        @elseif (!isset($tenant->plan_id))
                                            <span class="badge bg-danger">No Plan</span>
                                        @endif
                                    </td>


                                    <td class="align-middle">
                                        <div class="d-flex justify-content-start">

                                            <a class=" text-decoration-none btn edit-category-btn" data-bs-toggle="modal"
                                                data-bs-target="#editUserModel{{ $tenant->id }}">
                                                <img src="{{ asset('back/assets/dasheets/img/edit-2.svg') }}"
                                                    class="p-0 me-2 ms-0" alt="" />
                                            </a>

                                            <form class="d-inline delete-category-form" method="post"
                                                action="{{ route('super.customers.destroy', $tenant->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn text-danger btn-outline-light">
                                                    <img src="{{ asset('back/assets/dasheets/img/plus-circle.svg') }}"
                                                        class="p-0" data-bs-target="#exampleModalToggle2"
                                                        data-bs-toggle="modal" alt="" />
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer bg-white border-0 rounded-3">
                    <div class="d-flex justify-content-between p-0">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <label for="rowsPerPage" class="col-form-label">Rows per page:</label>
                            </div>
                            <div class="col-auto">
                                <select id="rowsPerPage" class="form-select border-0">
                                    <option value="3" selected>3</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                </select>
                            </div>
                        </div>
                        <div class="row align-items-center text-end">
                            <div class="col-auto">
                                <p class="subheading col-form-label " id="dataTableInfo">

                                </p>
                            </div>
                            <div class="col-auto">
                                <div class="new-pagination">
                                    <a class="rounded-start paginate_button" style="cursor: pointer"> ❮ </a>
                                    <a class="rounded-end paginate_button page-item next" style="cursor: pointer"> ❯ </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Create Modal STart -->
        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
            tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h3 class="all-adjustment text-center pb-2 mb-0" style="width: 57%;">
                            Create Customer
                        </h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        {!! Form::open(['route' => 'super.customers.store', 'method' => 'POST']) !!}

                        <div class="mb-3">
                            <label class="form-label">Name:</label>
                            {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}

                        </div>
                        <div class=" mb-3">

                            <label class="form-label">Email:</label>
                            {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}

                        </div>
                        <div class=" mb-3">

                            <label class="form-label">Subdomain:</label>
                            {!! Form::text('subdomain', null, ['placeholder' => 'Subdomain Name', 'class' => 'form-control']) !!}

                        </div>
                        <div class=" mb-3">

                            <label class="form-label">Password:</label>
                            {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}

                        </div>
                        <div class=" mb-3">

                            <label class="form-label">Confirm Password:</label>
                            {!! Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}

                        </div>
                        <button class="btn save-btn text-white ">Create</button>
                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
        <!-- Modal End -->
        <!-- Add Plan -->
        <div class="modal fade" id="exampleModalTogglePlan" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
            tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h3 class="all-adjustment text-center pb-2 mb-0" style="width: 57%;">
                            Add Plan
                        </h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        {!! Form::open(['route' => 'super.add.plans', 'method' => 'POST']) !!}

                        <div class="mb-3">
                            <label class="form-label">Select Customer</label>
                            <select name="customer_id" id="customer_id" class="form-select">
                                @foreach ($tenants as $tenant)
                                    <option value="{{ $tenant->id }}">{{ $tenant?->user?->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Choose Plan</label>
                            <select name="plan_id" id="plan_id" class="form-select">
                                @foreach ($plans as $plan)
                                    <option value="{{ $plan->id }}">{{ $plan?->title ??'' }} | {{ $plan?->type ??'' }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn save-btn text-white ">Add</button>
                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
        <!-- Add Plan End -->

        <!-- Edit Modal STart -->
        <!-- Edit Modal Start -->
        @foreach ($tenants as $tenant)
            <div class="modal fade" id="editUserModel{{ $tenant->id }}" aria-hidden="true"
                aria-labelledby="editCategoryModelToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <h3 class="all-adjustment text-center pb-2 mb-0" style="width: 57%;">
                                Edit Customer
                            </h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {!! Form::model($tenant, ['method' => 'PATCH', 'route' => ['super.customers.update', $tenant->id]]) !!}
                            <div class="mb-3">
                                <label class="form-label">Name:</label>
                                {!! Form::text('name', $tenant?->user?->name, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email:</label>
                                {!! Form::text('email', $tenant?->user?->email, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Subdomain:</label>
                                {!! Form::text('subdomain', $tenant?->subdomain ?? '', [
                                    'placeholder' => 'Subdomain',
                                    'class' => 'form-control',
                                ]) !!}
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password:</label>
                                {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm Password:</label>
                                {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                            </div>

                            <div>
                                <button type="submit" class="btn save-btn text-white mt-2">Submit</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- Edit Modal End -->



    </div>
@endsection

@section('scripts')
    <script src="{{ asset('back/assets/js/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"></script>
    <script>
        $(document).ready(function() {
            // $('#example').DataTable();

            // // Custom pagination events
            // $('.prev-page').on('click', function() {
            //     table.page('previous').draw('page');
            // });

            // $('.next-page').on('click', function() {
            //     table.page('next').draw('page');
            // });



            var table = $('#example').DataTable({
                dom: 'Bfrtip',
                select: true,
                order:[],
                select: {
                    style: 'multi',
                    selector: 'td:first-child .select-checkbox',
                },
                buttons: [{
                        extend: 'pdf',
                        footer: true,
                        exportOptions: {
                            columns: [0, 1, 2, 3, ]
                        }
                    },
                    {
                        extend: 'csv',
                        footer: false,
                        exportOptions: {
                            columns: [0, 1, 2, 3, ]
                        }

                    },
                    {
                        extend: 'excel',
                        footer: false,
                        exportOptions: {
                            columns: [0, 1, 2, 3, ]
                        }
                    }
                ]
            });

            $('#custom-filter').keyup(function() {
                table.search(this.value).draw();
            });

            $('#download-pdf').on('click', function() {
                table.button('.buttons-pdf').trigger();
            });
            $('#download-excel').on('click', function() {
                table.button('.buttons-excel').trigger();
            });

            // Select all checkbox click handler
            $('#myCheckbox09').on('click', function() {
                var isSelected = $(this).is(':checked'); // Check if checkbox is checked

                // Select/deselect all checkboxes with class 'select-checkbox'
                $('.select-checkbox').prop('checked', isSelected);

                // Optional: Update DataTables selection based on checkbox state
                if (isSelected) {
                    table.rows().select(); // Select all rows in DataTables (adjust if needed)
                    $('#deletedAlert').css('display', 'block');
                    $('#deleteRowCount').text($('.deleteRow:checked').length);
                } else {
                    table.rows().deselect(); // Deselect all rows in DataTables (adjust if needed)
                    $('#deletedAlert').css('display', 'none');
                }
            });

            // Handle click on checkbox to toggle row selection
            $('#example tbody').on('click', 'input[type="checkbox"]', function(e) {
                var $row = $(this).closest('tr');

                // Check the checkbox state and toggle row selection accordingly
                if (this.checked) {
                    table.row($row).select();
                    // $('#myCheckbox09').prop('checked', true);
                } else {
                    table.row($row).deselect();
                    // if ($('.deleteRow:checked').length === 0)
                    //     $('#myCheckbox09').prop('checked', false);

                }

                // Prevent click event from propagating to parent
                e.stopPropagation();
            });

            // Handle click on table cells with .select-checkbox
            $('#example tbody').on('click', 'td.select-checkbox', function(e) {
                $(this).parent().find('input[type="checkbox"]').trigger('click');
            });

            // Update the count and alert display whenever the selection changes
            table.on('select.dt deselect.dt', function() {
                var selectedRows = table.rows('.selected').count();
                if (selectedRows === 0) {
                    $('#deletedAlert').css('display', 'none');
                } else {
                    $('#deletedAlert').css('display', 'block');
                    $('#deleteRowCount').text(selectedRows);
                }
            });

            $('#deleteRowTrigger').on("click", function(event) { // triggering delete one by one
                if (confirm("Are you sure you won't be able to revert this!")) {
                    if ($('.deleteRow:checked').length > 0) { // at-least one checkbox checked
                        var ids = [];
                        $('.deleteRow').each(function() {
                            if ($(this).is(':checked')) {
                                let id = $(this).data('id');
                                ids.push(id);
                            }
                        });
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            type: "POST",
                            url: "",
                            data: {
                                ids
                            },
                            success: function(result) {
                                if (result.status === 200) {
                                    location.reload();
                                }
                            },
                            async: false
                        });
                    }
                }
            });

            // // Custom pagination events
            $('.new-pagination .paginate_button').on('click', function() {
                if ($(this).hasClass('rounded-start')) {
                    table.page('previous').draw('page');
                } else if ($(this).hasClass('rounded-end')) {
                    table.page('next').draw('page');
                }
            });

            // Handle rows per page change
            $('#rowsPerPage').on('change', function() {
                var rowsPerPage = $(this).val();
                table.page.len(rowsPerPage).draw();
            });

            // Update rows per page select on table draw
            table.on('draw', function() {

                var pageInfo = table.page.info();
                var currentPage = pageInfo.page + 1; // Adding 1 to match human-readable page numbering
                var totalPages = pageInfo.pages;
                var totalRecords = pageInfo.recordsTotal;

                // Calculate start and end records for the current page
                var startRecord = pageInfo.start + 1;
                var endRecord = startRecord + pageInfo.length - 1;
                if (endRecord > totalRecords) {
                    endRecord = totalRecords;
                }

                $('#rowsPerPage').val(table.page.len());
                $('#dataTableInfo').text('Showing ' + startRecord + '-' + endRecord + ' of ' +
                    totalRecords + ' entries');
            });

            table.draw();

            // Custom pagination events
            // $('#prevPage').on('click', function() {
            //     table.page('previous').draw('page');
            // });

            // $('#nextPage').on('click', function() {
            //     table.page('next').draw('page');
            // });

            // // Handle rows per page change
            // $('#rowsPerPage').on('change', function() {
            //     var rowsPerPage = $(this).val();
            //     table.page.len(rowsPerPage).draw();
            // });

            // // Update rows per page select on table draw
            // table.on('draw', function() {
            //     $('#rowsPerPage').val(table.page.len());
            // });

        });


        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $(".delete-category-form").submit(function() {
                var decision = confirm("Are you sure, You want to delete this user?");
                if (decision) {
                    return true;
                }
                return false;
            });








        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusSelects = document.querySelectorAll('.status-select');

            statusSelects.forEach(select => {
                select.addEventListener('change', function() {
                    const tenantId = this.dataset.tenantId;
                    const newStatus = this.value;

                    fetch(`customers/${tenantId}/status`, {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                status: newStatus
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            // Optional: Show success message
                            // console.log('Status updated successfully');
                            customAlert('success', 'Success', 'Status updated successfully');
                            // You could add a toast notification here
                        })
                        .catch(error => {
                            // console.error('Error:', error);
                            // Optional: Show error message
                            customAlert('error', 'Error', 'Failed to update status');
                        });
                });
            });
        });
    </script>

@endsection
