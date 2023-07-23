@extends('layouts.app')


@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
        </div>
      @endif
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">List Cash Flow</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Cash Flow</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <a href="{{ asset('cashflow/create') }}" class="btn btn-sm btn-success">Upload Beginning Stok</a>
        <a href="{{ asset('incoming_cash/create') }}" class="btn btn-sm btn-warning">Create Incoming Balance Cash Flow</a>
        <a href="{{ asset('out_cash/create') }}" class="btn btn-sm btn-primary">Create Out Balance Cash Flow</a>                
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">          
          <!-- /.col-md-12 -->
          <div class="col-md-12">
          <div class="card">
              <!-- /.card-header -->
              <div class="card-body">                
                <table id="example1" class="table table-bordered table-striped" style="width: 100%">
                  <thead>
                  <tr>
                    <th>id_cash_flow</th>
                    <th>Bank</th>
                    <th>beginning_balance</th>
                    <th>incoming_balance</th>
                    <th>out_balance</th>
                    <th>ending_balance</th>
                    {{-- <th>action</th> --}}
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($cash as $c)
                  <tr>
                  <td>{{ $c->id_cash_flow }}</td>                  
                  <td>{{ $c->bank }}</td>                                   
                  <td>{{ $c->beginning_balance }}</td>
                  <td>{{ $c->incoming_balance }}</td>
                  <td>{{ $c->out_balance }}</td>
                  <td>{{ $c->beginning_balance+$c->incoming_balance-$c->out_balance }}</td>
                  {{-- <td>
                    <a href="{{ asset('stok/edit/'.$c->id_stok) }}" class="btn btn-xs btn-primary">Edit</a>
                    <a href="{{ asset('stok/delete/'.$c->id_stok) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-xs btn-danger">Delete</a>
                  </td> --}}
                  </tr>
                  @endforeach
                  </tbody>                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  
@endsection