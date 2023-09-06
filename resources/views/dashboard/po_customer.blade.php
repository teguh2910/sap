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
            <h1 class="m-0">Dashboard Summary PO</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard Summary PO</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->        
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
                    <th>PO Number</th>
                    <th>Customer Code</th>                    
                    <th>Customer Name</th>
                    <th>Material</th>
                    <th>Description</th>
                    <th>Issue Date</th>
                    <th>Curency</th>
                    <th>Qty Order</th>
                    <th>Uom</th>
                    <th>Price Order</th>
                    <th>Amount Order</th>                                                          
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($pos as $po)
                    <tr>
                        <td>{{ $po->po_customers->first()->no_po_customer }}</td>
                        <td>{{ $po->po_customers->first()->customers->first()->kode_customer }}</td>
                        <td>{{ $po->po_customers->first()->customers->first()->nama_customer }}</td>
                        <td>{{ $po->part_customers->first()->part_number }}</td>
                        <td>{{ $po->part_customers->first()->part_name }}</td>
                        <td>{{ $po->po_customers->first()->tgl_po_customer }}</td>
                        <td>IDR</td>
                        <td>{{ number_format($po->qty_po_customer) }}</td>
                        <td>{{ $po->uom }}</td>
                        <td>Rp {{ number_format($po->harga_po_customer) }}</td>
                        <td>Rp {{ number_format($po->qty_po_customer*$po->harga_po_customer) }}</td>                                                  
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