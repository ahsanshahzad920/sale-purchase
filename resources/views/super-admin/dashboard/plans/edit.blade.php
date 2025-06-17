@extends('super-admin.dashboard.layout.app')
@section('content')
    <!--start page wrapper -->
@section('title', 'Update Customer')

<div class="content">
    <div class="container-fluid px-4 mt-3">
        <div class="border-bottom">
            <h3 class="all-adjustment text-center pb-2 mb-0">Edit Plan</h3>
        </div>

        <div class="shadow p-2 pt-0 mt-3">
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
                <div class="row">
                    <div class="col-xl-12 mx-auto">

                        {{-- <div class=" p-4">
                            {!! Form::model($plan, [
                                'method' => 'PUT',
                                'route' => ['super.plans.update', $plan->id],
                                'class' => 'row',
                                'g-3',
                            ]) !!}


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1" class="mb-1">Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control subheading"
                                            id="exampleFormControlInput1" placeholder="Name" required name="title" value="{{$plan->title ?? ''}}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1" class="mb-1">Sub Title</label>
                                        <input type="text" class="form-control subheading"
                                            id="exampleFormControlInput1" placeholder="Sub Title" name="sub_title" value="{{$plan->sub_title ?? ''}}"
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
                                            <option value="monthly" {{$plan->type == 'monthly' ? 'selected':''}} >Monthly</option>
                                            <option value="yearly" {{$plan->type == 'yearly' ? 'selected':''}}>Yearly</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Price" class="mb-1">Price<font color="red">*</font></label>
                                        <input type="number" class="form-control" id="price" name="price"
                                            required step="0.01" min="0" value="{{$plan->price ?? ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status" class="mb-1">Display</label>
                                        <select name="status" class="form-control" id="status">
                                            <option value="">Change Display</option>
                                            <option value="1" {{$plan->status==1?'selected':''}}>Show</option>
                                            <option value="0" {{$plan->status==0?'selected':''}}>Hide</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 mt-2 col-md-12">
                                <button type="submit" class="btn save-btn text-white mt-4 ">Update</button>
                            </div>
                            {!! Form::close() !!}
                        </div> --}}
                        <form action="{{ route('super.plans.update', $plan->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <h3 class="pb-2 mb-0">Plan</h3>
                                    <p>Manage your plan settings here</p>
                                </div>
                                <div class="col-md-8 mt-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="mb-1">Title <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control subheading" name="title" value="{{ old('title', $plan->title) }}" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="mb-1">Sub Title</label>
                                                <input type="text" class="form-control subheading" name="sub_title" value="{{ old('sub_title', $plan->sub_title) }}" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="mb-1">Type</label>
                                                <select name="type" class="form-control">
                                                    <option value="">Select Type</option>
                                                    <option value="monthly" {{ $plan->type == 'monthly' ? 'selected' : '' }}>Monthly</option>
                                                    <option value="yearly" {{ $plan->type == 'yearly' ? 'selected' : '' }}>Yearly</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="mb-1">Price<font color="red">*</font></label>
                                                <input type="number" class="form-control" name="price" value="{{ old('price', $plan->price) }}" required step="0.01" min="0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="mb-1">Display</label>
                                                <select name="status" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="1" {{ $plan->status == 1 ? 'selected' : '' }}>Show</option>
                                                    <option value="0" {{ $plan->status == 0 ? 'selected' : '' }}>Hide</option>
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

                                    @foreach ($plan->features as $index => $feature)
                                        @php
                                            $featureName = $feature['feature_name'] ?? '';
                                            $isEnabled = $feature['is_enabled'] ?? false;
                                            $limit = $feature['limit'] ?? 100;
                                        @endphp


                                        <div class="card bg-light mb-3">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-md-1">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" name="features[{{ $index }}][is_enabled]" value="1" {{ $isEnabled ? 'checked' : '' }} />
                                                            <input type="hidden" name="features[{{ $index }}][name]" value="{{ $featureName }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="fs-5 m-0">{{ $featureName }}</p>
                                                        <p>Enable access to {{ $featureName }} feature in this plan</p>
                                                    </div>
                                                    @if($featureName !== 'Get Online Payment' && $featureName !== 'Ecommerce')
                                                        <div class="col-md-4">
                                                            <div class="form-group mt-2">
                                                                <input type="number" name="features[{{ $index }}][limit]" value="{{ $limit ?? 100 }}" class="form-control" />
                                                                <p class="subheading m-0 p-0">Set limit -1 for unlimited</p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>


                            <button class="btn save-btn text-white mt-4" type="submit">Update</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
@endsection
