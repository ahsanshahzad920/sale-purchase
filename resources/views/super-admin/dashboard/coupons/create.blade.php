@extends('super-admin.dashboard.layout.app')
@section('content')
    <!--start page wrapper -->
@section('title', 'Add Plan')
<div class="content">
    <div class="container-fluid px-4 mt-3">
        <div class="border-bottom">
            <h3 class="all-adjustment text-center pb-2 mb-0">Create Coupon</h3>
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
                <form action="{{ route('super.coupons.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="plan_id" class="mb-1">Plan</label>
                                <select name="plan_id" class="form-control" id="plan_id">
                                    <option value="">Select Plan</option>
                                    @foreach ($plans as $plan)
                                        <option value="{{ $plan->id }}">{{ $plan->title ??'' }} | {{ $plan->type ??'' }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="mb-1">Name</label>
                                <input type="text" class="form-control subheading" id="name" placeholder="Name" name="name" required />
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="code" class="mb-1">Coupon Code</label>
                                <input type="text" class="form-control subheading" id="code" placeholder="Code" name="code" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="discount" class="mb-1">Discount<font color="red">*</font></label>
                                <input type="number" class="form-control" id="discount" name="discount" required min="1" max="99" placeholder="Discount Percentage" />
                                <span>
                                    <small class="text-muted">Note: Enter discount percentage between 1 to 99.</small>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity" class="mb-1">Quantity<font color="red">*</font></label>
                                <input type="number" class="form-control" id="quantity" name="quantity" required min="1" placeholder="Quantity" />
                                <span>
                                    <small class="text-muted">How many time the code can be used</small>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status" class="mb-1">Status</label>
                                <select name="status" class="form-control" id="status">
                                    <option value="active" selected>Active</option>
                                    <option value="inactive">InActive</option>
                                </select>
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
