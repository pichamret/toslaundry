@extends('layout.master')

@section('style')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <!-- CSS -->
  <link href="/assets/jqueryui/jquery-ui.min.css" rel="stylesheet" type="text/css">
  <!-- Script -->
  <script src="/assets/jqueryui/jquery-ui.min.js"></script>
@endsection

@section('style')
<style>
  body {
    font-family: "Open Sans",
      -apple-system, BlinkMacSystemFont,
      "Segoe UI", Roboto, Oxygen-Sans,
      Ubuntu, Cantarell, "Helvetica Neue",
      Helvetica, Arial, sans-serif;
  }
</style>
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
  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <a href="{{ Route('order.create') }}"><i class="btn btn-primary">Create New Order</i></a>
        </ol>
      </div>
    </div>
  </div>
</div>
@include('backend.alert.validation')

@if (Session::has('success'))
<div class="alert  alert-success alert-dismissible fade show mt-2" style="margin-right: 20px;margin-left: 20px" role="alert">
  <span class="badge badge-pill badge-success">Success</span> {!! Session::get('success') !!}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
</div>

@endif
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <strong class="card-title">Data Table</strong>
          </div>
          <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
              <div class="row mb-1">
                <div class="col-sm-12 col-md-4">
                  <form action="/order" type="get">
                    <div class="input-group">
                      <input type="search" name="search" class="form-control form-control-sm" placeholder="">
                      
                      <span class="input-group-prepend">
                        <button type="submit" id="search" class="btn-xs btn-primary">Search</button>
                      </span>
                    </div>
                  </form>
                </div>
                
                <div class="col-sm-12 col-md-4">
                  <form action="/order" type="get">
                    <div class="input-group">
                      <input type="date" name="datefrom" class="datetime form-control">
                      <input type="date" name="todate" class="datetime form-control">
                      <span class="input-group-prepend">
                        <button type="submit" class="btn-xs btn-primary">Search</button>
                      </span>
                    </div>
                  </form>
                </div>
              </div>

              <thead>
                <tr>
                  <th>Date</th>
                  <th>Code</th>
                  <th>Price</th>
                  <th>Weight</th>
                  <th>Discount</th>
                  <th>Total</th>
                  <th>Paid</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="myTable">
                @foreach ($orders as $order)
                <tr>
                  <td> {{ $order->ord_date }} </td>
                  <td> {{ $order->code }} </td>
                  <td> {{ $order->price }} </td>
                  <td> {{ $order->weight }}kg </td>
                  <!-- Discount -->
                  @if($order->discount == null)
                  <td>00%</td>
                  @else
                  <td>{!! number_format($order->discount, 0) !!}%</td>
                  @endif
                  <td> {{ $order->total }} </td>
                  <!-- Paid -->
                  @if($order->paid == "0")
                  <td><span class="badge badge-warning">មិនទាន់បង់</span></td>
                  @elseif($order->paid == "1")
                  <td><span class="badge badge-success">បានបង់</span></td>
                  @endif
                  <!-- Status -->
                  @if($order->status == "0")
                  <td><span class="badge badge-warning">រង់ចាំ</span></td>
                  @elseif($order->status == "1")
                  <td><span class="badge badge-info">ចាំមតិជនទទួល</span></td>
                  @elseif($order->status == "2")
                  <td><span class="badge badge-success">បានទទួល</span></td>
                  @endif
                  <td class="text-center">
                    <a href="{{ route('order.edit', $order->id) }}">
                      <i class="btn btn-success">Edit</i>
                    </a>
                    <a class="delete-confirm" href="{{ route('order.delete', $order->id) }}" onclick="return confirmDelete('are you sure?')">
                      <i class="btn btn-danger">Delete</i>
                    </a>
                  </td>
                </tr>

                @endforeach
              </tbody>
            </table>
            <div class="col-sm-12 col-md-5 ">
              <div class="dataTables_info" id="bootstrap-data-table-export_info" role="status" aria-live="polite">Showing 1 to 15 entries</div>
            </div>
            <div class="col-sm-12 col-md-7 d-flex flex-row-reverse">
              <div class="dataTables_paginate paging_simple_numbers" id="bootstrap-data-table-export_paginate">
                <ul class="pagination">
                  <li class="paginate_button page-item active">
                    <!-- links -->
                    
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- .animated -->
</div><!-- .content -->
@endsection

@section('scripts')

<!-- simple jquery yes/no  -->
<script>
  $(document).on(" click", ".delete-confirm", function() {
    return confirm("Are you sure?");
  });

  $(document).ready(function(){
  $("#search").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
  
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