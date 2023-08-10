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
            <h1 class="m-0">Create Data detail Nomor {{ $po->id_po }}</h1>            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Data detail PO </li>
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
                <h3 class="card-title">Form Create Data detail Nomor {{ $po->id_po }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{asset('detailpo/create/'.$po->id_po)}}" method="POST">
              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Material</label>
                    <select name="id_material" id="" class="form-control select2">
                      @foreach($material as $m)
                      <option value="{{ $m->id_material }}">{{ $m->nama_material }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Qty PO</label>
                    <input type="number" name="qty_po" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Harga</label>
                    <input type="integer" name="harga_po" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Uom</label>
                    <select name="uom" class="form-control">
                      <option value="kg">Kg</option>
                      <option value="pcs">Pcs</option>
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