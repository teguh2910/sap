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
            <h1 class="m-0">Create Data Part</h1>            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Data Part</li>
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
                <h3 class="card-title">Form Create Data Part</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{asset('part/create')}}" method="POST">
              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Part Number</label>
                    <input type="text" name="part_no" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Part Name</label>
                    <input type="text" name="part_name" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>UoM</label>
                    <select name="uom" class="form-control">
                        <option value="KG">KG</option>
                        <option value="Pcs">Pcs</option>                        
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control">
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