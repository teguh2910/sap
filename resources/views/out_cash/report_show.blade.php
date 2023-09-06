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
            <h1 class="m-0">List out_cash</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List out_cash</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <a href="{{ asset('out_cash/create') }}" class="btn btn-sm btn-success">Create</a>
        <a href="{{ asset('out_cash/report') }}" class="btn btn-sm btn-primary">Report</a>
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
                <table id="data" class="table table-bordered table-striped" style="width: 100%">
                  <thead>
                  <tr>
                    <th>no_po</th>
                    <th>category</th>
                    <th>amount_out</th>
                    <th>tgl_out_cash</th>
                    <th>bank</th>
                    <th>action</th>                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($out_cash as $o)
                  <tr>
                  <td>@if($o->id_po==0) Non PO @else {{$o->id_po}} @endif</td>
                  <td>{{ $o->category }}</td>
                  <td>{{ $o->amount_out }}</td>
                  <td>{{ $o->tgl_out_cash }}</td>
                  @foreach($o->banks as $b)
                  <td>{{ $b->nama_bank }}</td>
                  @endforeach
                  <td>
                    <a href="{{ asset('out_cash/edit/'.$o->id_out_cash) }}" class="btn btn-sm btn-primary">Edit</a>
                    <a href="{{ asset('out_cash/delete/'.$o->id_out_cash) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-danger">Delete</a>
                  </td>
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