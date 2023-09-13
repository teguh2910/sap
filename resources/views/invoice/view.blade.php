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
            <h1 class="m-0">List Detail Invoice</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Detail Invoice</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <a href="{{ asset('invoice/detail/create/'.$id) }}" class="btn btn-sm btn-info">Create Data Invoice</a>    
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
                <table id="data" class="table table-bordered table-striped" style="width:100%">
                  <thead>
                  <tr>
                    <th>Part No</th>
                    <th>Part Name</th>
                    <th>qty_sj</th>
                    <th>Harga</th>
                    <th>No PO Customer</th>
                    <th>tgl</th>               
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($d_i as $d)
                  <tr>
                  <td>{{ $d->part }}</td>
                  <td>{{ $d->parts->first()->part_name }}</td>
                  <td>{{ $d->qty }}</td>
                  <td>{{ $d->parts->first()->po_c->first()->harga_po_customer }}</td>
                  <td>{{ $d->invoices->first()->po_customers->first()->no_po_customer }}</td>
                  <td>{{ $d->tgl }}</td>
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