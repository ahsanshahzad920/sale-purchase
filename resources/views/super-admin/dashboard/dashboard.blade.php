@extends('super-admin.dashboard.layout.app')
@section('title', 'Dashboard')
@section('style')
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

        .badges {
            width: fit-content
        }
    </style>

@endsection
@section('content')


    <!-- Content Start -->
    <div class="content">
        {{-- <h4 class="text-center mt-4 fw-bolder">Hello Dashboard</h4> --}}

        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-lg-3 col-md-6 mt-4">
                    <a href="" class="text-decoration-none">
                        <div class="card-shadow border rounded orange-bg d-flex align-items-center p-4 rounded-4">
                            <img src="{{ asset('back/assets/dasheets/img/content-sale.svg') }}"
                                class="img-fluid text-center bg-white p-1 rounded-4" alt="" />
                            <div class="ms-3">
                                <p class="mb-1 fs-6 text-white subheading">Customers</p>
                                <h6 class="mb-0 text-white sales-amount">{{ $customerCount ?? 0 }}</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 mt-4">
                    <a href="" class="text-decoration-none">
                        <div class="card-shadow border darkblue-bg rounded d-flex align-items-center p-4 rounded-4">
                            <img src="{{ asset('back/assets/dasheets/img/content-bag.svg') }}"
                                class="img-fluid text-center bg-white p-1 rounded-4" alt="" />
                            <div class="ms-3">
                                <p class="mb-1 text-white subheading">All Subscriptions</p>
                                <h6 class="mb-0 sales-amount text-white">{{ $subscriptionCount ?? 0 }}</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 mt-4">
                    <a href="" class="text-decoration-none">
                        <div class="card-shadow border rounded d-flex align-items-center p-4 darkgreen-bg rounded-4">
                            <img src="{{ asset('back/assets/dasheets/img/content-right-arrow.svg') }}"
                                class="img-fluid text-center bg-white p-1 rounded-4" alt="" />
                            <div class="ms-3">
                                <p class="mb-1 fs-6 text-white subheading">
                                    Active Subscriptions
                                </p>
                                <h6 class="mb-0 sales-amount text-white">{{ $activeSubscriptionCount ?? 0 }}</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 mt-4">
                    <a href="" class="text-decoration-none">
                        <div class="card-shadow border rounded d-flex align-items-center p-4 normalblue-bg rounded-4">
                            <img src="{{ asset('back/assets/dasheets/img/content-left-arrow.svg') }}"
                                class="img-fluid text-center bg-white p-1 rounded-4" alt="" />
                            <div class="ms-3">
                                <p class="mb-1 fs-6 text-white subheading">
                                    Total Income
                                </p>
                                <h6 class="mb-0 sales-amount text-white">${{ $totalIncome ?? 0 }}</h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-12 mt-5">
                <div class="card-shadow card p-3 rounded-3 border-0 h-100">
                    <div class="card-header bg-white p-0 m-0 mb-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="text-start mt-2 pb-2 heading">
                                    <span>
                                        <i class="bi bi-flag orange-txt lightorange-bg p-2 rounded-3"></i>
                                    </span>
                                    Recent Transaction
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0 m-0">
                        <div class="table-responsive text-center">
                            <table class="table text-start" id="example4">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th class="text-secondary">Customer</th>
                                        <th class="text-secondary">Transaction ID</th>
                                        <th class="text-secondary">Plan</th>
                                        <th class="text-secondary">Amount</th>
                                        <th class="text-secondary">Payment Method</th>
                                        <th class="text-secondary">Payment Status</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($recentTransactions as $sale)
                                        <tr>
                                            <td class="align-middle">{{ $sale->subscription->tenant->user->name ?? 'N/A' }}</td>
                                            <td class="align-middle">#{{ $sale->transaction_id ?? 'N/A' }}</td>
                                            <td class="align-middle">
                                                {{ $sale?->subscription->plan?->title ?? 'N/A' }} | {{ $sale?->subscription->plan?->type ?? 'N/A' }}
                                            </td>
                                            <td class="align-middle">
                                                ${{ number_format($sale->amount ?? '0.00', 2) }}
                                            </td>
                                            <td class="align-middle">
                                                {{ $sale->payment_method ?? 'N/A' }}
                                            </td>



                                            <td class="align-middle">
                                                @if ($sale->payment_status == 'paid')
                                                    {{-- <span class="badges bg-lightgreen text-center"></span> --}}
                                                    <span
                                                        class="badges bg-green text-center px-1 d-flex gap-1 align-items-center justify-content-center">
                                                        <span class="mb-1">
                                                            <i class="bi bi-circle-fill text-white"
                                                                style="font-size: 6px"></i></span>
                                                        <span> {{ ucwords($sale->payment_status ?? '') }} </span>
                                                    </span>
                                                @elseif ($sale->payment_status == 'partial')
                                                    {{-- <span class="badges bg-lightyellow text-center"></span> --}}
                                                    <span
                                                        class="badges bg-yellow text-center px-1 d-flex gap-1 align-items-center justify-content-center">
                                                        <span class="mb-1">
                                                            <i class="bi bi-circle-fill text-white"
                                                                style="font-size: 6px"></i></span>
                                                        <span> {{ ucwords($sale->payment_status ?? '') }} </span>
                                                    </span>
                                                @else
                                                    {{-- <span class="badges bg-lightred text-center">{{ ucwords($sale->payment_status ?? '') }}</span> --}}
                                                    <span
                                                        class="badges bg-red text-center px-1 d-flex gap-1 align-items-center justify-content-center">
                                                        <span class="mb-1">
                                                            <i class="bi bi-circle-fill text-white"
                                                                style="font-size: 6px"></i></span>
                                                        <span> {{ ucwords($sale->payment_status ?? '') }} </span>
                                                    </span>
                                                @endif
                                            </td>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0 h-100 text-end">
                        <div class="row">
                            <div class="col-6">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <label for="rowsPerPage4" class="col-form-label">Rows per page:</label>
                                    </div>
                                    <div class="col-auto">
                                        <select id="rowsPerPage4" class="form-select border-0">
                                            <option value="3" selected="">3</option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <div class="row align-items-center text-end justify-content-end">
                                    <div class="col-auto text-end">
                                        <p class="subheading col-form-label" id="dataTableInfo4">
                                            {{-- 1-4 of 4 entries --}}
                                        </p>
                                    </div>
                                    <div class="col-auto">
                                        <div class="new-pagination " id="example4_paginate">
                                            <a class="rounded-start paginate_button" style="cursor: pointer"> ❮
                                            </a>
                                            <a class="rounded-end paginate_button page-item next"
                                                style="cursor: pointer">
                                                ❯ </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>



    </div>
    <!-- Recent Sales End -->





@endsection
@section('scripts')

@endsection
