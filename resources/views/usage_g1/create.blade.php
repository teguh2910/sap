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
            <h1 class="m-0">Create Data Qty Usage</h1>            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Data Qty Usage Material</li>
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
                <h3 class="card-title">Form Create Data Qty Usage Material</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{asset('usageg1/create')}}" enctype="multipart/form-data" method="POST">
              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Material</label>
                    <select name="id_base_metal" style="width:100%" id="select2">
                      <option value="">--Pilih Part No--</option>
                      @foreach($base_metal as $m)
                      <option value="{{ $m->id_base_metal }}">{{ $m->nama_base_metal }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Qty_usage</label>
                    <input type="number" name="qty_usage_g1" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Tanggal Usage</label>
                    <input type="date" name="tgl_usage_g1" class="form-control">
                  </div>  
                  <div class="form-group">
                    <label>Lot Usage</label>
                    <input type="text" name="lot_usage_g1" class="form-control">
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