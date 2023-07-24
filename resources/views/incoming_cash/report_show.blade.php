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
            <h1 class="m-0">List incoming_cash</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List incoming_cash</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <a href="{{ asset('incoming_cash/create') }}" class="btn btn-sm btn-success">Create</a>
        <a href="{{ asset('incoming_cash/report') }}" class="btn btn-sm btn-primary">Report</a>
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
                    <th>no_po</th>
                    <th>customer</th>
                    <th>amount</th>
                    <th>bank</th>
                    <th>tgl</th>
                    <th>top</th>                    
                    <th>action</th>                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($incoming_cash as $i)
                  <tr>
                  <td>{{ $i->po_customer }}</td>
                  @foreach($i->customers as $c)
                  <td>{{ $c->nama_customer }}</td>
                  @endforeach
                  <td>{{ $i->amount_incoming }}</td>
                  @foreach($i->banks as $b)
                  <td>{{ $b->nama_bank }}</td>
                  @endforeach
                  <td>{{ $i->tgl_incoming_cash }}</td>
                  <td>{{ $i->top }}</td>
                  <td>
                    <a href="{{ asset('incoming_cash/edit/'.$i->id_incoming_cash) }}" class="btn btn-sm btn-primary">Edit</a>
                    <a href="{{ asset('incoming_cash/delete/'.$i->id_incoming_cash) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-danger">Delete</a>
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