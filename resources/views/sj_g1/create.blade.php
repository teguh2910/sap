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
            <h1 class="m-0">Create Data Qty Surat Jalan</h1>            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Data Qty Surat Jalan</li>
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
                <h3 class="card-title">Form Create Data Qty Surat Jalan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{asset('sjg1/create')}}" enctype="multipart/form-data" method="POST">
              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>NO Sj</label>
                    <input type="text" name="no_sj_g1" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>PO Customer</label>
                    <select name="id_po_customer" class="form-control">
                      <option value="">--Pilih PO--</option>
                      @foreach($po_customer as $p)
                      <option value="{{ $p->id_po_customer }}">{{ $p->no_po_customer }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Part No Finish Goods</label>
                    <select name="id_gudang_satu" class="form-control">
                      <option value="">--Pilih Part No--</option>
                      @foreach($stoks as $stok)
                      <option value="{{ $stok->id_gudang_satu }}">{{ $stok->part_name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Qty Surat Jalan Finish Goods</label>
                    <input type="number" name="qty_sj_g1" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Tanggal Surat Jalan Finish Goods</label>
                    <input type="date" name="tgl_sj_g1" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Plat No Truk</label>
                    <select name="id_truk" class="form-control">
                      <option value="">--Pilih NOPOL--</option>
                      @foreach($truks as $truk)
                      <option value="{{ $truk->id_truk }}">{{ $truk->plat_no }}</option>
                      @endforeach
                    </select>
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