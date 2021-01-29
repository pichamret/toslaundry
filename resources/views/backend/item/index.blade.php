@extends('layout.master')

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
                <h1>Item</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                <a href="{{ Route('item.create') }}"><i class="btn btn-primary">Create New Client</i></a>
                </ol>
            </div>
        </div>
    </div>
</div>
@include('backend.alert.validation')

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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td> {{ $item->name }} </td>
                                <td> {{ $item->unit_price }} </td>
                                <td> {{ $item->description }} </td>
                                <td>
                                    @if ($item->image)
                                    <img class="img-fluid rounded" src="{{ asset($item->image) }}" width="70px" alt="">
                                    @else
                                    <img class="img-fluid rounded" src="{{ asset('uploads/item/noimage.png') }}" width="70px" alt="">
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('item.edit', $item->id) }}">
                                        <i class="btn btn-success">Edit</i>
                                    </a>
                                    <a class="delete-confirm" href="{{ route('item.delete', $item->id) }}"  onclick="return confirmDelete('are you sure?')">
                                        <i class="btn btn-danger">Delete</i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
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
    
//     function confirmDelete(id){
//     console.log(id);
//     Notiflix.Confirm.Show( 
//       'Message', 
//       'Do you agree with me?', 
//       'Yes',
//       'No',
//       function(){
//         // Yes button callback
//         parent.location='{{URL('/item/delete/')}}'+'/'+id;
//       },
//       function(){ // No button callback
         
//       }
//     );
//   }

  $(document).on("click",".delete-confirm",function(){  
    return confirm("Are you sure?");
  });

 </script> 
@endsection
