@extends('layout.master')

@section('style')

@endsection

@section('content')
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Dashboard</h1>
      </div>
    </div>
  </div>
  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <p>Dashboard</p>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <div class="card-body d-sm-flex align-items-sm-center justify-content-sm-between flex-sm-wrap p-3 mt-2 mb-5">
          
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <div class="stat-widget-one">
                  <div class="stat-icon dib"><i class="fa fa-cart-plus text-success border-success"></i></div>
                  <div class="stat-content dib">
                    <div class="stat-text">Total Orders</div>
                    <div class="stat-digit">{{$orders}}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <div class="stat-widget-one">
                  <div class="stat-icon dib"><i class="fa fa-shopping-bag text-warning border-warning"></i></div>
                  <div class="stat-content dib">
                    <div class="stat-text">Total Items</div>
                    <div class="stat-digit">{{$items}}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <div class="stat-widget-one">
                  <div class="stat-icon dib"><i class="fa fa-users text-primary border-primary"></i></div>
                  <div class="stat-content dib">
                    <div class="stat-text">Total Clients</div>
                    <div class="stat-digit">{{$clients}}</div>
                  </div>
                </div>
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
<script>

</script>
@endsection