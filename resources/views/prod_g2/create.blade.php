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
            <h1 class="m-0">Create Data Qty Production Gudang CF</h1>            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Data Qty Production Gudang CF</li>
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
                <h3 class="card-title">Form Create Data Qty Production Gudang CF</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{asset('prodg2/create')}}" enctype="multipart/form-data" method="POST">
              {{ csrf_field() }}
                <div class="card-body">                    
                  <div class="form-group">
                    <label>Lot Production</label>
                    <input type="text" name="lot_prod_g2" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Tanggal Production</label>
                    <input type="date" name="tgl_prod_g2" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>PO Customer</label>
                    <select name="id_po_customer" required class="form-control select2">
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