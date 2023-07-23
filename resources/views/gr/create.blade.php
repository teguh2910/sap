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
            <h1 class="m-0">Create Data GR PO</h1>            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Data GR PO </li>
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
                <h3 class="card-title">Form Create GR PO</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{asset('gr/create')}}" method="POST">
              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>No PO</label>
                    <select name="id_po" id="select2" class="form-control">
                      @foreach($po as $d)
                      <option value="{{ $d->id_po }}">{{ $d->id_po }}</option>
                      @endforeach
                    </select>
                  </div>                  
                  <div class="form-group">
                    <label>Tgl GR</label>
                    <input type="date" name="tgl_gr" required class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Gudang</label>
                    <select name="gudang" class="form-control">
                      <option value="gudang_dua">Gudang Dua</option>
                      <option value="gudang_satu">Gudang Satu</option>
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