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
            <h1 class="m-0">Edit Data Qty Production Gudang Satu</h1>            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Data Qty Production Gudanag Satu</li>
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
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Edit Data Qty Production Gudanag Satu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{asset('prodg1/edit/'.$id)}}" enctype="multipart/form-data" method="POST">
              {{ csrf_field() }}
                <div class="card-body">                    
                  <div class="form-group">
                    <label>Lot Production</label>
                    <input type="text" value="{{ $prod_g1->lot_prod_g1 }}" name="lot_prod_g1" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Tanggal Production</label>
                    <input type="date" value="{{ $prod_g1->tgl_prod_g1 }}" name="tgl_prod_g1" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>PO Customer</label>
                    <select name="id_po_customer" class="form-control select2">
                      @foreach($po_customer as $p)
                      <option value="{{ $p->id_po_customer }}">{{ $p->no_po_customer }}</option>
                      @endforeach
                    </select>
                  </div>                                                      
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Next</button>
                </div>
              </form>
            </div>
          </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  
@endsection