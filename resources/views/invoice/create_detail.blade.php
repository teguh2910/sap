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
            <h1 class="m-0">Create Data Invoice</h1>            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Data Invoice</li>
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
                <h3 class="card-title">Form Create Data Invoice</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{asset('invoice/detail/create/'.$id)}}" enctype="multipart/form-data" method="POST">
              {{ csrf_field() }}
                <div class="card-body">                    
                  <div class="form-group">
                    <label>Part</label>
                    <select name="part" id="" class="form-control select2">
                      @foreach($part as $p)
                      <option value="{{ $p->part_number }}">{{ $p->part_name }}</option>
                      @endforeach
                    </select>                  
                  </div>
                  <div class="form-group">
                    <label>Qty</label>
                    <input type="number" required name="qty" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" required name="tgl" class="form-control">
                  </div>
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