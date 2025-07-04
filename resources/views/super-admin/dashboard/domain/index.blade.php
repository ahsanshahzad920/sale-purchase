@extends('super-admin.dashboard.layout.app')
@section('title', 'Domain')
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
                <h3 class="all-adjustment text-center pb-2 mb-0">Domain</h3>
            </div>

            @include('back.layout.errors')

            <div class="card card-shadow border-0 mt-5 rounded-3">
                <div class="card-header bg-white border-0 rounded-3">
                    <div class="row my-3">
                        <div class="col-md-4 col-12">
                            <div class="input-search position-relative">
                                <input type="text" placeholder="Search Domain"
                                    class="form-control rounded-3 subheading" id="custom-filter"/>
                                <span class="fa fa-search search-icon text-secondary"></span>
                            </div>
                        </div>

                        <div class="col-md-8 col-12 text-end">
                            {{-- <button class="btn create-btn rounded-3 mt-2" data-bs-target="#exampleModalToggle"
                                data-bs-toggle="modal">
                                Create <i class="bi bi-plus-lg"></i>
                            </button> --}}
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
                                <th class="align-middle">ID</th>
                                <th class="sorting"></th>
                                <th class="sorting">Custom domain </th>
                                <th class="sorting">Status</th>
                                <th class="sorting">Date</th>
                                <th class="sorting">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @forelse ($domains as $domain)
                                <tr>
                                   
                                    <td class="align-middle">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="align-middle">
                                        {{$domain->tenant->subdomain.'.'.request()->getHost()}}
                                    </td>
                                    <td  class="align-middle">
                                        {{ $domain->name }}
                                    </td>
                                    <td class="align-middle">
                                        @if ($domain->status == 'approved')
                                            <span class="badge bg-success">Approved</span>
                                        @elseif ($domain->status == 'rejected')
                                            <span class="badge bg-danger">Rejected</span>
                                        @else
                                            <span class="badge bg-danger">Pending</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">{{ $domain->created_at }}</td>
                                   
                                    {{-- <td class="align-middle">

                                        <div class="d-flex justify-content-start">

                                            <form class="d-inline approve-category-form" method="post"
                                                action="{{ route('custom-domain.requests.approved', $domain->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn text-success btn-outline-light">
                                                    <img src="{{ asset('back/assets/dasheets/img/plus-circle.svg') }}"
                                                        class="p-0" data-bs-target="#exampleModalToggle2"
                                                        data-bs-toggle="modal" alt="" />
                                                </button>
                                            </form>
                                            <form class="d-inline reject-category-form" method="post"
                                                action="{{ route('custom-domain.requests.rejected', $domain->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn text-danger btn-outline-light">
                                                    <img src="{{ asset('back/assets/dasheets/img/plus-circle.svg') }}"
                                                        class="p-0" data-bs-target="#exampleModalToggle2"
                                                        data-bs-toggle="modal" alt="" />
                                                </button>
                                            </form>

                                            <form class="d-inline delete-category-form" method="post"
                                                action="{{ route('custom-domain.requests.delete', $domain->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn text-danger btn-outline-light">
                                                    <img src="{{ asset('back/assets/dasheets/img/plus-circle.svg') }}"
                                                        class="p-0" data-bs-target="#exampleModalToggle2"
                                                        data-bs-toggle="modal" alt="" />
                                                </button>
                                            </form>
                                        </div>
                                    </td> --}}
                                    <td class="align-middle">
                                        <div>
                                            <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button"
                                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-v"></i>
                                            </a>

                                            <div class="dropdown-menu p-2 ps-0" aria-labelledby="dropdownMenuLink">
                                             
                                                {{-- <form id="deleteForm" action="{{ route('sales.destroy', $sale->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')


                                                    <button type="submit" class="dropdown-item confirm-text">
                                                        <img src="{{ asset('back/assets/dasheets/img/menu.svg') }}"
                                                            class="img-fluid me-1" alt="">
                                                        Delete Sale
                                                    </button>
                                                </form> --}}
                                                <form class="approve-category-form" method="post"
                                                action="{{ route('custom-domain.requests.approved', $domain->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn text-success ">
                                                    Approved
                                                </button>
                                            </form>
                                            <form class=" reject-category-form" method="post"
                                                action="{{ route('custom-domain.requests.rejected', $domain->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn text-danger">
                                                    Rejected
                                                </button>
                                            </form>

                                            <form class=" delete-category-form" method="post"
                                                action="{{ route('custom-domain.requests.delete', $domain->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn text-danger">
                                                    Delete
                                                </button>
                                            </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
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



    </div>
@endsection

@section('scripts')
    <script src="{{ asset('back/assets/js/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"></script>
    <script>
        $(document).ready(function() {

            var table = $('#example').DataTable({
                dom: 'Bfrtip',
                select: true,
                select: {
                    style: 'multi',
                    selector: 'td:first-child .select-checkbox',
                },
            });

            $('#custom-filter').keyup(function() {
                table.search(this.value).draw();
            });


            // // Select all checkbox click handler
            // $('#myCheckbox09').on('click', function() {
            //     var isSelected = $(this).is(':checked'); // Check if checkbox is checked

            //     // Select/deselect all checkboxes with class 'select-checkbox'
            //     $('.select-checkbox').prop('checked', isSelected);

            //     // Optional: Update DataTables selection based on checkbox state
            //     if (isSelected) {
            //         table.rows().select(); // Select all rows in DataTables (adjust if needed)
            //         // confirm('Are you sure you want to delete all record?');
            //         $('#deletedAlert').css('display','block');
            //         $('#deleteRowCount').text($('.deleteRow:checked').length);


            //     } else {
            //         table.rows().deselect(); // Deselect all rows in DataTables (adjust if needed)
            //         $('#deletedAlert').css('display','none');
            //     }
            // });

            // table.on('select.dt', function (e, dt, type, indexes) {
            //         // console.log("slected")
            //         var row = table.row(indexes[0]); // Get the selected row

            //         // Find checkbox within the selected row
            //         var checkbox = row.node().querySelector('.select-checkbox');

            //         if (checkbox) {  // Check if checkbox exists
            //             // console.log("slected")
            //             checkbox.checked = true; // Check the checkbox
            //             $('#deletedAlert').css('display','block');
            //             $('#deleteRowCount').text($('.deleteRow:checked').length);

            //         }
            // });

            // table.on('deselect.dt', function (e, dt, type, indexes) {
            //     var selectedRows = table.rows('.selected').count();
            //     var row = table.row(indexes[0]); // Get the selected/deselected row
            //     var checkbox = row.node().querySelector('.select-checkbox');

            //     if (checkbox) {
            //         // Update checkbox state based on event type
            //         checkbox.checked = type === 'select';
            //     }
            //     $// Show/hide delete alert based on selection count
            //     if (selectedRows === 0) {
            //         $('#deletedAlert').css('display', 'none');
            //     } else {
            //         $('#deletedAlert').css('display', 'block');
            //         $('#deleteRowCount').text($('.deleteRow:checked').length);
            //     }
            // });

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
            $('#example tbody').on('click', '.select-checkbox', function(e) {
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

            $('#deleteRowTrigger').on("click", function(event){ // triggering delete one by one
                if(confirm("Are you sure you won't be able to revert this!")){
                    if( $('.deleteRow:checked').length > 0 ){  // at-least one checkbox checked
                        var ids = [];
                        $('.deleteRow').each(function(){
                            if($(this).is(':checked')) {
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
                            url: "#",
                            data: {ids},
                            success: function(result) {
                                if(result.status === 200){
                                    toastr.success(result.message)
                                    location.reload();
                                }
                            },
                            async:false
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

            $(document).on('click', '.delete-category-link', function(e) {
                e.preventDefault();
                $(this).find('.delete-category-form').submit();
            });

            $(".delete-category-form").submit(function() {
                var decision = confirm("Are you sure, You want to Delete this domain?");
                if (decision) {
                    return true;
                }
                return false;
            });


        });
    
    </script>
@endsection
