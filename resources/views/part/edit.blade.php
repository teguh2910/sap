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
            <h1 class="m-0">edit Data Part</h1>            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">edit Data Part</li>
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
                <h3 class="card-title">Form edit Data Part</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{asset('part/edit/'.$part->id_part)}}" method="POST">
              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Part Number</label>
                    <input type="text" name="part_no" value="{{ $part->part_no }}" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Part Name</label>
                    <input type="text" name="part_name" value="{{ $part->part_name }}" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>UoM</label>
                    <select name="uom" class="form-control">
                        <option value="KG" @if($part->uom == 'KG') selected @endif>KG</option>
                        <option value="Pcs" @if($part->uom == 'Pcs') selected @endif>Pcs</option>                        
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" value="{{ $part->price }}" class="form-control">
                  </div>                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Edit</button>
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