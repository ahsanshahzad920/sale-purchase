@extends('super-admin.dashboard.layout.app')
@section('content')
    <!--start page wrapper -->
@section('title', 'Update Service')

<div class="content">
    <div class="container-fluid px-4 mt-3">
        <div class="border-bottom">
            <h3 class="all-adjustment text-center pb-2 mb-0">Edit Service</h3>
        </div>

        <div class="shadow p-2 pt-0">
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

                        <div class=" p-4">
                            <h5 class="mb-4">Edit Service</h5>
                            {!! Form::model($service, [
                                'method' => 'PUT',
                                'route' => ['super.services.update', $service->id],
                                'class' => 'row',
                                'g-3',
                            ]) !!}


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1" class="mb-1">Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control subheading"
                                            id="exampleFormControlInput1" placeholder="Name" required name="title" value="{{$service->title ?? ''}}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="plan_id" class="form-label mb-1">Plan</label>
                                    <select name="plan_id" class="form-control" id="plan_id">
                                        @foreach ($plans as $plan)
                                            <option value="{{$plan->id}}" {{$plan->id == $service->id ? 'selected':''}} >{{$plan->title ?? ''}} | {{$plan->type ?? ''}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 mt-2 col-md-12">
                                <button type="submit" class="btn save-btn text-white mt-4 ">Update</button>
                            </div>
                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
@endsection
