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
            <form action="{{ route('order.save') }}" method="post" id="submitForm" enctype="multipart/form-data">
              @csrf
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="">Order Date<span class="text-danger">*</span> </label>
                      <div class="">
                        <input type="text" class="datetime-now form-control" name="ord_date">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="">Code <span class="text-danger">*</span></label>
                      <div class="">
                        <input type="text" value="" autocomplete="off" class="form-control" style="background-color: #e9ecef;" name="code" placeholder="Auto Generate">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="">Client <span class="text-danger">*</span> </label>
                      <div class="">
                        <div class="">
                          <select class="form-control" name="client_id" id="client">
                            <!-- <option value="" required>--Select Client--</option> -->
                            @foreach ($clients as $client)
                            <option value={{$client->id}}>{{ $client->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="">Weight(Kg*) <span class="text-danger">*</span></label>
                      <div class="">
                        <input type="number" class="form-control" id="weight" name="weight" placeholder="Enter Weight">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="">Price <span class="text-danger">*</span></label>
                      <div class="">
                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="">Discount </label>
                      <div class="">
                        <input type="number" class=" form-control" id="discount" name="discount" placeholder="Enter discount">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="">Total </label>
                      <div class="">
                        <input type="number" class="form-control" id="total" name="total" placeholder="" readonly>
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
                            <option value="0">Pending</option>
                            <option value="1">Completed</option>
                            <option value="2">Receive</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @foreach ($items as $item)
                <div class="col col-sm-1">
                  <label class="">{{ $item->name }}<label class="badge badge-danger">{{ $item->unit_price }}$</label></label>
                  <div class="">
                    <input type="text" value="{{$item->id}}"  name="item_id[]" class="">
                    <input type="text" value="{{$item->unit_price}}" name="price[]" class="price" >
                    <input type="hidden" value="{{$item->unit_price}}"  name="amount[]" class="amount" >
                    <input  type="text"  class="qty" name="qty[]"  placeholder="ចំនួន">
                    <!-- required -->
                  </div>
                </div>
                @endforeach
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
    // $(".unit_price, .amount, .qty").on('input',function(){
    //   var amount = 0 
    //   var unit_price = Number($('.unit_price').val())
    //   var qty = Number($('.qty').val())

    //   if(qty == null){
    //     var amount = 0
    //   }else{
    //     var amount = unit_price * qty
    //   }
    //   $('.amount').val(result)
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