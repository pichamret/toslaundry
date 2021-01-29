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
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                <a href="{{ Route('client.create') }}"><i class="btn btn-primary">Create New Client</i></a>
                </ol>
            </div>
        </div>
    </div>
</div>
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
                                    <th>Phone</th>
                                    <th>Note</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($clients as $client)
                            <tr>
                                <td> {{ $client->name }} </td>
                                <td> {{ $client->phone }} </td>
                                <td> {!! $client->note !!} </td>
                                <td class="text-center">
                                    <a href="{{ route('client.edit', $client->id) }}">
                                        <i class="btn btn-success">Edit</i>
                                    </a>
                                    <a class="delete-confirm" href="{{ route('client.delete', $client->id) }}"  onclick="return confirmDelete('are you sure?')">
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
<script>
    $(document).on("click",".delete-confirm",function(){  
    return confirm("Are you sure?");
  });
</script>
@endsection
