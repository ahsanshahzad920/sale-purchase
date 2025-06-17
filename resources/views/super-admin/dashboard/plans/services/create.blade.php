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
                <form action="{{ route('super.services.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1" class="mb-1">Title <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control subheading" id="exampleFormControlInput1"
                                    placeholder="Name" required name="title" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type" class="mb-1">Type</label>
                                <select name="plan_id" class="form-control" id="plan_id">
                                    @foreach ($plans as $plan)
                                        <option value="{{$plan->id}}">{{$plan->title ?? ''}} | {{$plan->type ?? ''}}</option>
                                    @endforeach
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
