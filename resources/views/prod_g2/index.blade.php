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
            <h1 class="m-0">List Produksi Gudang Dua</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Produksi Gudang Dua</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row --> 
        <a href="{{ asset('prodg2/create') }}" class="btn btn-sm btn-primary">Input hasil Produksi Gudang Dua</a>
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
                          <th>no_po_customer</th>
                          <th>Detail</th>
                          <th>Lot Produksi</th>
                          <th>Tgl_produksi</th>
                          <th>action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($prod_g2 as $p)
                      <tr>
                          <td>{{ $p->po_customers->first()->no_po_customer }}</td>  
                          <td><a href="{{ asset('detailprodg2/'.$p->id_prod_g2) }}" class="btn btn-xs btn-primary">View</a></td>
                          <td>{{ $p->lot_prod_g2 }}</td>
                          <td>{{ $p->tgl_prod_g2 }}</td>      
                          <td>
                            <a href="{{ asset('prodg2/cetak/'.$p->id_prod_g2) }}" class="btn btn-xs btn-success">Cetak</a>
                              <a href="{{ asset('prodg2/edit/'.$p->id_prod_g2) }}" class="btn btn-xs btn-primary">Edit</a>
                              <a href="{{ asset('prodg2/delete/'.$p->id_prod_g2) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-xs btn-danger">Delete</a>
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