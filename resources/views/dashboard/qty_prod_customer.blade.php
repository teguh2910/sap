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
            <h1 class="m-0">Dashboard Qty Produksi vs Order Customer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard Qty Produksi vs Order Customer</li>
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
                <table id="example1" class="table table-bordered table-striped" style="width:100%">
                  <thead>
                  <tr>
                    <th>Customer</th>
                    <th>Part Number</th>                    
                    <th>Part Name</th>
                    <th>Qty Produksi</th>
                    <th>Qty Order Customer</th>                                       
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($po_c as $p)
                  <tr>
                    <td>{{ $p->customers->first()->nama_customer }}</td>
                    <td>{{ $p->detail_po_customer->first()->id_part_customer }}</td>
                    <td>{{ $p->detail_po_customer->first()->id_part_customer }}</td>
                    <td>{{ $p->gudang_dua->first()->prods->first()->qty_prod_g1 }}</td>
                    <td>{{ $p->detail_po_customer->first()->qty_po_customer }}</td>
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