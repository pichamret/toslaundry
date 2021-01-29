@extends('layout.master')

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<!-- CSS -->
<link href="/assets/jqueryui/jquery-ui.min.css" rel="stylesheet" type="text/css">
<!-- Script -->
<script src="/assets/jqueryui/jquery-ui.min.js"></script>
@endsection

@section('content')
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Order</h1>
      </div>
    </div>
  </div>
</div>
<!-- @include('backend.alert.validation') -->
@if (Session::has('success'))
<div class="alert  alert-success alert-dismissible fade show mt-2" style="margin-right: 20px;margin-left: 20px" role="alert">
  <span class="badge badge-pill badge-success">Success</span> {!! Session::get('success') !!}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
</div>
<!-- <div class="alert alert-success mt-2" style="margin-right: 20px;margin-left: 20px">
  <ul>
    <li></li>
  </ul>
</div> -->
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
            <form action="{{ route('order.update', $editorder->id) }}" method="post" id="submitForm" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              <input type="hidden" class="form-control" name="id" value="{{$editorder['id']}}"><br>

              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="">Order Date<span class="text-danger">*</span> </label>
                      <div class="">
                        <input type="text" class="datetime-now form-control" name="ord_date" value="{{$editorder['ord_date']}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="">Code <span class="text-danger">*</span></label>
                      <div class="">
                        <input type="text" autocomplete="off" class="form-control"  value="{{$editorder['code']}}"  style="background-color: #e9ecef;" name="code" placeholder="Auto Generate">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="">Client <span class="text-danger">*</span> </label>
                      <div class="">
                        <div class="">
                          <select class="form-control" name="client_id" id="client">
                              @if(count($clients))
                                @foreach($clients as $client)
                                  <option value="{{ $client->id }}" {{ $client->id == $editorder->client_id ? 'selected' : '' }}>{{ $client->name }}</option>
                                @endforeach
                              @endif
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="">Weight(Kg*) <span class="text-danger">*</span></label>
                      <div class="">
                        <input type="number" class="form-control" id="weight" value="{{$editorder['weight']}}" name="weight" placeholder="Enter Weight">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="">Price <span class="text-danger">*</span></label>
                      <div class="">
                        <input type="number" class="form-control" id="price" name="price" value="{{$editorder['price']}}" placeholder="Enter Price">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="">Discount </label>
                      <div class="">
                        <input type="number" class=" form-control" id="discount" name="discount" value="{{$editorder['discount']}}" placeholder="Enter discount">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="">Total </label>
                      <div class="">
                        <input type="number" class="form-control" id="total" name="total" value="{{$editorder['total']}}" placeholder="" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="">Paid <span class="text-danger">*</span> </label>
                      <div class="">
                        <div class="">
                          <select class="form-control" name="paid">
                            <option value="0">Unpaid</option>
                            <option value="1">Paid</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="">Status <span class="text-danger">*</span> </label>
                      <div class="">
                        <div class="">
                          <select class="form-control" name="status">
                          <option {{old('job_status',$editorder->status)=="0"? 'selected':''}}  value="0">Pending</option>
                          <option {{old('job_status',$editorder->status)=="1"? 'selected':''}} value="1">Completed</option>
                          <option {{old('job_status',$editorder->status)=="2"? 'selected':''}} value="2">Receive</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- @foreach ($items as $item)
                <div class="col col-sm-1">
                  <label class="">{{ $item->name }}<label class="badge badge-danger">{{ $item->unit_price }}$</label></label>
                  <div class="">
                    <input type="text"  name="item_id[]" class="" value="{{ $item->id }}">
                    <input type="text"  name="price[]" class="" value="{{ $item->unit_price }}">
                    <input type="text"  name="amount[]" class="" value="{{ $item->unit_price }}">
                    <input type="text"  name="qty[]" class="" value=""  placeholder="ចំនួន" >
                  </div>
                </div>
                @endforeach -->
                <div class="col-xl-11 text-right mt-3">
                  <button type="submit" class="btn btn-info btn-lg btn-create-user">Save</button>
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
<script type="text/javascript">

  $(document).ready(function(){
    $("#price, #weight, #discount").on('input',function(){
      var total = 0
      var price = Number($("#price").val())
      var weight = Number($("#weight").val())
      var discount = Number($("#discount").val())
      if (discount == null){
        var total = price * weight
      }else{
        var total = price * weight
        var discount_amount = total * discount / 100
        var total = total - discount_amount
      }
      
      $('#total').val(total)
    });
  });
  // $('.total').on('keyup',function(){
  //   // var total = $(this).val();
  //   // var price = $('.price').val();
  //   // var weight = $('.weight').val();
  //   // var discount = $('.discount').val();
  //   // $('.amount').html(qty*price);
  //   // })
  //   // $('.price').on('keyup',function(){
  //   // var qty = $('.quanlity').val();
  //   // var price = $(this).val();
  //   // $(".amount").html(qty*price);
  //   alert("hello")
  // })

  $(".date").flatpickr({
    enableTime: false,
    dateFormat: "Y-m-d",
  });
  $(".datetime").flatpickr({
    enableTime: true,
    dateFormat: "Y-m-d H:i",
  });
  $(".datetime-now").flatpickr({
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    defaultDate: moment().format('YYYY-MM-DD H:mm')
  });
</script>
@endsection