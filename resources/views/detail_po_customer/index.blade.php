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
            <h1 class="m-0">List detailpo</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List detailpo</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <a href="{{ asset('detailpocustomer/create/'.$id) }}" class="btn btn-sm btn-success">Create</a>
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
                    <th>kode_barang</th>
                    <th>nama_barangg</th>
                    <th>Qty_Po</th>
                    <th>Uom</th>
                    <th>Harga_po</th>  
                    <th></th>                  
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($detailpos as $d)
                  <tr>
                    @foreach($d->po_customers as $p)
                  <td>{{ $p->no_po_customer }}</td>
                    @endforeach
                    @foreach($d->part_customers as $p)
                  <td>{{ $p->part_number }}</td>
                  <td>{{ $p->part_name }}</td>
                    @endforeach
                  <td>{{ number_format($d->qty_po_customer) }}</td>                                    
                  <td>{{ $d->uom }}</td>
                  <td>Rp {{ number_format($d->harga_po_customer) }}</td>
                  <td>
                    <a href="{{ asset('detailpocustomer/edit/'.$d->id_detail_po_customers) }}" class="btn btn-sm btn-primary">Edit</a>
                    <a href="{{ asset('detailpocustomer/delete/'.$d->id_detail_po_customers) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-danger">Delete</a>
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