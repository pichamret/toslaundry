@extends('layout.master')

@section('style')

@endsection

@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Item</h1>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Form</strong> 
                    </div>
                    <!-- @include('backend.alert.validation') -->
                    
                    <div class="card-body card-block">
                        <form action="{{ route('item.update', $edititem->id) }}" method="post" id="submitForm" enctype="multipart/form-data">
                        @csrf

                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="hidden" class="form-control" name="id" value="{{$edititem['id']}}"><br>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class="form-control-label">Name</label><span class="text-danger">*</span>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" name="name" id="name" value="{{$edititem['id']}}"  placeholder="Enter Name" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class=" form-control-label">Price</label><span class="text-danger">*</span>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="number" name="unit_price" id="unit_price" value="{{$edititem['unit_price']}}" placeholder="Enter Price" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class="form-control-label">Description</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" name="description" id="description" value="{{$edititem['description']}}" placeholder="Enter Description" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class="form-control-label">Image</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input class="" accept="image/*"  type="file" id="image" name="image" value="{{$edititem['image']}}" accept="image/x-png,image,image/jpg,image/jpeg">
                                    @if($edititem->image)
                                        <img id="holder" src="{{asset($edititem['image'])}}" style="margin-top:15px;max-height:100px;">                    
                                    @endif
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
