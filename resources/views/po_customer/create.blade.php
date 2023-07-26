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
            <h1 class="m-0">Create Data PO Customer</h1>            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Data PO Customer</li>
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
                <h3 class="card-title">Form Create Data PO Customer</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{asset('po_customer/create')}}" method="POST">
              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Customer</label>
                    <select name="id_customer" class="form-control">
                        @foreach($customers as $c)
                        <option value="{{ $c->id_customer }}">{{ $c->nama_customer }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>No PO</label>
                    <input type="text" name="no_po_customer" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Part Number</label>
                    <select name="id_produk" class="form-control">
                      @foreach($produks as $p)
                      <option value="{{ $p->id_produk }}">{{ $p->type }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Qty PO</label>
                    <input type="text" name="qty_po_customer" class="form-control" cols="30" rows="10">
                  </div>  
                  <div class="form-group">
                    <label>Harga PO</label>
                    <input type="text" name="harga_po_customer" class="form-control" cols="30" rows="10">
                  </div>                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Create</button>
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