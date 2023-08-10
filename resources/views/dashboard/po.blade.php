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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>PO Number</th>
                    <th>Supplier Code</th>                    
                    <th>Supplier Name</th>
                    <th>Material</th>
                    <th>Description</th>
                    <th>Issue Date</th>
                    <th>Delivery Date</th>
                    <th>Term of Payment</th>
                    <th>Curency</th>
                    <th>Qty Order</th>
                    <th>Uom</th>
                    <th>Price Order</th>
                    <th>Amount Order</th>
                    <th>Qty GR</th>
                    <th>Uom</th>
                    <th>Price GR</th>
                    <th>Amount GR</th>
                    <th>Qty Oustanding</th>
                    <th>Uom</th>
                    <th>Price Oustanding</th>
                    <th>Amount Oustanding</th> 
                    <th>Status</th>   
                    <th></th>                                    
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($pos as $po)
                    <tr>
                        <td>{{ $po->id_po }}</td>
                        <td>{{ $po->pos->first()->vendors->first()->kode_vendor }}</td>
                        <td>{{ $po->pos->first()->vendors->first()->nama_vendor }}</td>
                        <td>{{ $po->materials->first()->part_number }}</td>
                        <td>{{ $po->materials->first()->part_name }}</td>
                        <td>{{ $po->pos->first()->tgl_po }}</td>
                        <td>{{ $po->pos->first()->delivery_date }}</td>
                        <td>{{ $po->pos->first()->top }}</td>
                        <td>IDR</td>
                        <td>{{ number_format($po->qty_po) }}</td>
                        <td>{{ $po->uom }}</td>
                        <td>Rp {{ number_format($po->harga_po) }}</td>
                        <td>Rp {{ number_format($po->qty_po*$po->harga_po) }}</td>                        
                        <td>{{ number_format($po->qty_gr) }}</td>
                        <td>{{ $po->uom }}</td>
                        <td>Rp {{ number_format($po->harga_gr) }}</td>
                        <td>Rp {{ number_format($po->harga_gr*$po->qty_gr) }}</td>
                        <td>{{ number_format($po->qty_po - $po->qty_gr) }}</td>
                        <td>{{ $po->uom }}</td>
                        <td>Rp {{ number_format($po->harga_po - $po->harga_gr) }}</td>
                        <td>Rp {{ number_format(($po->qty_po*$po->harga_po) - ($po->harga_gr*$po->qty_gr)) }}</td>
                        <td>
                          @if(($po->qty_po - $po->qty_gr)==0)
                          Closed
                          @else
                          Open
                          @endif
                        </td>
                        <td><a href="" class="btn btn-xs btn-success">Closed</a><a href="" class="btn btn-xs btn-danger">Cancel</a></td>
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