@extends('layout.master')

@section('style')

@endsection

@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Client</h1>
            </div>
        </div>
    </div>
</div>
<!-- @include('backend.alert.validation') -->
@if (Session::has('success'))
    <div class="alert alert-success mt-2" style="margin-right: 20px;margin-left: 20px">
        <ul>
            <li>{!! Session::get('success') !!}</li>
        </ul>
    </div>
@endif
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Form</strong> 
                    </div>
                    
                    <div class="card-body card-block">
                        <form action="{{ route('item.save') }}"  method="post" id="submitForm" enctype="multipart/form-data">
                        @csrf
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class="form-control-label">Name</label><span class="text-danger">*</span>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" name="name" id="name"  placeholder="Enter Name" class="form-control">
                                    <div class="alert-danger">{{ $errors->first('name') }}</div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class=" form-control-label">Price</label><span class="text-danger">*</span>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="number" name="unit_price" name="unit_price" placeholder="Enter Price" class="form-control">
                                    <div class="alert-danger">{{ $errors->first('unit_price') }}</div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class="form-control-label">Description</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" name="description" id="description" placeholder="Enter Description" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class="form-control-label">Image</label><span class="text-danger">*</span>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input class="" type="file" name="image" id="image"  accept="image/x-png,image,image/jpg,image/jpeg">
                                    <div class="alert-danger">{{ $errors->first('image') }}</div>
                                </div>
                            </div>
                            <div class="col-9">
                                <button type="submit" class="btn btn-lg btn-primary float-right">
                                    Save
                                </button>    
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
@endsection

@section('scripts')

@endsection
