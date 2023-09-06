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
            <h1 class="m-0">List Invoice</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Invoice</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row --> 
        <a href="{{ asset('invoice/create') }}" class="btn btn-sm btn-primary">Input Invoice</a>
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
                          <th>no_invoice</th>
                          <th>Tgl_invoice</th>
                          <th>No FP</th>
                          <th>Customer</th>
                          <th>PO No</th>
                          <th>Tgl PO</th>
                          <th>Detail</th>
                          <th>action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($invoice as $i)
                      <tr>                          
                          <td>{{ $i->no_invoice }}</td>
                          <td>{{ $i->tgl_invoice }}</td>
                          <td>{{ $i->no_fp }}</td>
                          @foreach($i->po_customers as $p)
                          <td>{{ $p->customers->first()->nama_customer }}</td>
                          <td>{{ $p->no_po_customer }}</td>
                          <td>{{ $p->tgl_po_customer }}</td>
                          @endforeach
                          <td><a href="{{ asset('sjg1/'.$i->id_invoice) }}" class="btn btn-xs btn-primary">View</a></td>      
                          <td>
                            <a href="{{ asset('invoice/cetak/'.$i->id_invoice) }}" class="btn btn-xs btn-success">Cetak</a>
                              <a href="{{ asset('invoice/edit/'.$i->id_invoice) }}" class="btn btn-xs btn-primary">Edit</a>
                              <a href="{{ asset('invoice/delete/'.$i->id_invoice) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-xs btn-danger">Delete</a>
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