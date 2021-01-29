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
                        <form action="{{ route('client.update', $editclient->id) }}" method="post" id="submitForm" enctype="multipart/form-data">
                        @csrf

                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="hidden" class="form-control" name="id" value="{{$editclient['id']}}"><br>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class="form-control-label">Name</label><span class="text-danger">*</span>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" name="name" id="name" value="{{$editclient['id']}}"  placeholder="Enter Name" class="form-control">
                                    <div class="alert-danger">{{ $errors->first('name') }}</div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class=" form-control-label">Phone</label><span class="text-danger">*</span>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" name="phone" id="" value="{{$editclient['phone']}}" placeholder="Enter Phone" class="form-control">
                                    <div class="alert-danger">{{ $errors->first('phone') }}</div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class="form-control-label">Note</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <textarea id="summernote" name="note" placeholder="Enter Note">{{$editclient['note']}}</textarea>
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
<script>
    $(document).ready(function() {
      $('#summernote').summernote({
        placeholder: 'Enter description',
        height: 220
      });
  });
</script>
@endsection
