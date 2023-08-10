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
            <h1 class="m-0">List part_customer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List part_customer</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <a href="{{ asset('part_customer/create') }}" class="btn btn-sm btn-success">Create</a>
        <a href="{{ asset('part_customer/upload') }}" class="btn btn-sm btn-success">Upload</a>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">          
          <!-- /.col-md-12 -->
          <div class="col-md-12">
          <div class="card">
              <!-- /.card-header -->
              <div class="card-body">                
                <table id="example1" class="table table-bordered table-striped" style="width: 100%">
                  <thead>
                  <tr>
                    <th>part_number</th>
                    <th>part_name</th>
                    <th>action</th>                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($part_customer as $p)
                  <tr>
                  <td>{{ $p->part_number }}</td>
                  <td>{{ $p->part_name }}</td>
                  <td>
                    <a href="{{ asset('part_customer/edit/'.$p->id_part_customer) }}" class="btn btn-sm btn-primary">Edit</a>
                    <a href="{{ asset('part_customer/delete/'.$p->id_part_customer) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-danger">Delete</a>
                  </td>
                  </tr>
                  @endforeach
                  </tbody>                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  
@endsection