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
            <h1 class="m-0">List Truk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Truk</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <a href="{{ asset('truk/create') }}" class="btn btn-sm btn-success">Create</a>
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>id_truk</th>
                    <th>jenis_truk</th>
                    <th>nopol_truk</th>
                    <th>action</th>                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($truk as $b)
                  <td>{{ $b->id_truk }}</td>
                  <td>{{ $b->jenis_truk }}</td>
                  <td>{{ $b->nopol_truk }}</td>
                  <td>
                    <a href="{{ asset('truk/edit/'.$b->id_truk) }}" class="btn btn-sm btn-primary">Edit</a>
                    <a href="{{ asset('truk/delete/'.$b->id_truk) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-danger">Delete</a>
                  </td>
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