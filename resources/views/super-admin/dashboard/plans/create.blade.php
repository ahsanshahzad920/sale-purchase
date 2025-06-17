@extends('super-admin.dashboard.layout.app')
@section('content')
    <!--start page wrapper -->
@section('title', 'Add Plan')
<div class="content">
    <div class="container-fluid px-4 mt-3">
        <div class="border-bottom">
            <h3 class="all-adjustment text-center pb-2 mb-0">Create Plan</h3>
        </div>

        <div class="shadow p-4 mt-3">
            <div class="container-fluid create-product-form rounded">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!--end breadcrumb-->
                <form action="{{ route('super.plans.store') }}" method="POST">
                    @csrf



                    <div class="row">
                        <div class="col-md-4 mt-3">
                            <h3 class="pb-2 mb-0">Plan</h3>
                            <p>Manage your plan settings here</p>
                        </div>
                        <div class="col-md-8 mt-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1" class="mb-1">Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control subheading"
                                            id="exampleFormControlInput1" placeholder="Name" required name="title" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1" class="mb-1">Sub Title</label>
                                        <input type="text" class="form-control subheading"
                                            id="exampleFormControlInput1" placeholder="Sub Title" name="sub_title"
                                            required />
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type" class="mb-1">Type</label>
                                        <select name="type" class="form-control" id="type">
                                            <option value="">Select Type</option>
                                            <option value="monthly" selected>Monthly</option>
                                            <option value="yearly">Yearly</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Price" class="mb-1">Price<font color="red">*</font></label>
                                        <input type="number" class="form-control" id="price" name="price" placeholder="Price"
                                            required step="0.01" min="0">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status" class="mb-1">Display</label>
                                        <select name="status" class="form-control" id="status">
                                            <option value="">Select</option>
                                            <option value="1" selected>Show</option>
                                            <option value="0">Hide</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4 mt-3">
                            <h3 class="pb-2 mb-0">Plan Setting</h3>
                            <p>Choose which features you want to add in this plan</p>
                        </div>
                        <div class="col-md-8 mt-3">

                            {{-- Customers --}}
                            <div class="card bg-light mb-3">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-md-1">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="features[0][is_enabled]" value="1" checked />
                                                <input type="hidden" name="features[0][name]" value="Customers">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="fs-5 m-0">Customers</p>
                                            <p>Enable access to Customers feature in this plan</p>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mt-2">
                                                <input type="number" name="features[0][limit]" value="100" class="form-control" />
                                                <p class="subheading m-0 p-0">Set limit -1 for unlimited</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Products --}}
                            <div class="card bg-light mb-3">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-md-1">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="features[1][is_enabled]" value="1" checked />
                                                <input type="hidden" name="features[1][name]" value="Products">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="fs-5 m-0">Products</p>
                                            <p>Enable access to Products feature in this plan</p>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mt-2">
                                                <input type="number" name="features[1][limit]" value="100" class="form-control" />
                                                <p class="subheading m-0 p-0">Set limit -1 for unlimited</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Orders --}}
                            <div class="card bg-light mb-3">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-md-1">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="features[2][is_enabled]" value="1" checked />
                                                <input type="hidden" name="features[2][name]" value="Orders">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="fs-5 m-0">Orders</p>
                                            <p>Enable access to Orders feature in this plan</p>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mt-2">
                                                <input type="number" name="features[2][limit]" value="100" class="form-control" />
                                                <p class="subheading m-0 p-0">Set limit -1 for unlimited</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Get Online Payment --}}
                            <div class="card bg-light mb-3">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-md-1">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="features[3][is_enabled]" value="1" checked />
                                                <input type="hidden" name="features[3][name]" value="Get Online Payment">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="fs-5 m-0">Get Online Payment</p>
                                            <p>Enable access to Get Online Payment feature in this plan</p>
                                        </div>
                                        <div class="col-md-4">
                                            {{-- No limit field --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card bg-light mb-3">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-md-1">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="features[4][is_enabled]" value="1" checked />
                                                <input type="hidden" name="features[4][name]" value="Vendors">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="fs-5 m-0">Vendors</p>
                                            <p>Enable access to Get Vendors feature in this plan</p>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mt-2">
                                                <input type="number" name="features[4][limit]" value="100" class="form-control" />
                                                <p class="subheading m-0 p-0">Set limit -1 for unlimited</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card bg-light mb-3">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-md-1">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="features[5][is_enabled]" value="1" checked />
                                                <input type="hidden" name="features[5][name]" value="Purchases">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="fs-5 m-0">Purchases</p>
                                            <p>Enable access to Purchases feature in this plan</p>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mt-2">
                                                <input type="number" name="features[5][limit]" value="100" class="form-control" />
                                                <p class="subheading m-0 p-0">Set limit -1 for unlimited</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Get Online Payment --}}
                            <div class="card bg-light mb-3">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-md-1">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="features[6][is_enabled]" value="1" checked />
                                                <input type="hidden" name="features[6][name]" value="Ecommerce">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="fs-5 m-0">Ecommerce</p>
                                            <p>Enable access to Ecommerce feature in this plan</p>
                                        </div>
                                        <div class="col-md-4">
                                            {{-- No limit field --}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <button class="btn save-btn text-white mt-4" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
@endsection
