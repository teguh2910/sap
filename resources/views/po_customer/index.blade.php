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
            <h1 class="m-0">List PO Customer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List PO Customer</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <a href="{{ asset('po_customer/create')}}" class="btn btn-sm btn-success">Create</a>
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
                <table id="example1" class="table table-bordered table-striped" style="width:100%">
                  <thead>
                  <tr>
                    <th>no_po</th>
                    <th>customer</th>
                    <th>part_number</th>
                    <th>part_name</th>
                    <th>Qty_po</th>
                    <th>Harga_po</th>
                    <th>Amount</th>
                    <th>tgl_po</th>
                    <th>action</th>                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($po_customer as $po)
                  <tr>
                  <td>{{ $po->no_po_customer }}</td>
                  @foreach($po->customers as $c)
                  <td>{{ $c->nama_customer }}</td>
                  @endforeach
                  @foreach($po->produks as $p)
                  <td>{{ $p->kode_produk }}</td>
                  <td>{{ $p->type }}</td>
                  @endforeach
                  <td>{{ $po->qty_po_customer }}</td>
                  <td>{{ $po->harga_po_customer }}</td>
                  <td>{{ $po->qty_po_customer * $po->harga_po_customer }}</td>
                  <td>{{ $po->created_at }}</td>
                  <td>
                    <a href="{{ asset('po_customer/edit/'.$po->id_po_customer) }}" class="btn btn-xs btn-primary">Edit</a>
                    <a href="{{ asset('po_customer/delete/'.$po->id_po_customer) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-xs btn-danger">Delete</a>
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