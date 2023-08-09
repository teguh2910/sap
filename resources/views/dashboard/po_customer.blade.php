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
                    <th></th>                                      
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($grs as $g)
                    <tr>
                      @foreach($g->detail_pos as $d)
                        <td>{{ $d->id_po }}</td>
                        @foreach($d->pos as $p)
                        @foreach($p->vendors as $v)
                        <td>{{ $v->kode_vendor }}</td>
                        <td>{{ $v->nama_vendor }}</td>
                        @endforeach
                        @endforeach
                        @endforeach
                        @foreach($g->materials as $m)
                        <td>{{ $m->kode_material }}</td>
                        <td>{{ $m->nama_material }}</td>
                        @endforeach                        
                        <td>{{ $p->tgl_po }}</td>
                        <td>{{ $p->delivery_date }}</td>
                        <td>{{ $p->top }}</td>
                        <td>IDR</td>                        
                        <td>{{ number_format($d->qty_po) }}</td>
                        <td>{{ $d->uom }}</td>
                        <td>Rp {{ number_format($d->harga_po) }}</td>
                        <td>Rp {{ number_format($d->qty_po*$d->harga_po) }}</td>
                        <td>{{ number_format($g->qty_gr) }}</td>
                        <td>{{ $g->uom }}</td>
                        <td>Rp {{ number_format($g->harga_gr) }}</td>
                        <td>Rp {{ number_format($g->harga_gr*$g->qty_gr) }}</td>
                        <td>{{ number_format($d->qty_po - $g->qty_gr) }}</td>
                        <td>{{ $g->uom }}</td>
                        <td>Rp {{ number_format($d->harga_po - $g->harga_gr) }}</td>
                        <td>Rp {{ number_format(($d->qty_po*$d->harga_po) - ($g->harga_gr*$g->qty_gr)) }}</td>
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