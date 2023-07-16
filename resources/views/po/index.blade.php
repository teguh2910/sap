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
            <h1 class="m-0">List PO</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List PO</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <a href="{{ asset('po/create') }}" class="btn btn-sm btn-success">Create</a>
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
                    <th>no_po</th>
                    <th>vendor</th>
                    <th>nama_bank</th>
                    <th>top</th>
                    <th>action</th>                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($pos as $po)
                  <td>{{ $po->id_po }}</td>
                  @foreach($po->vendors as $v)
                  <td>{{ $v->nama_vendor }}</td>
                  @endforeach
                  <td>{{ $po->qty }}</td>
                  @foreach($po->banks as $b)
                  <td>{{ $b->nama_bank }}</td>
                  @endforeach
                  @foreach($po->tops as $t)
                  <td>{{ $t->name_top }}</td>
                  @endforeach
                  <td>
                    <a href="{{ asset('po/cetak/'.$po->id_po) }}" class="btn btn-xs btn-success">Cetak</a>
                    <a href="{{ asset('po/edit/'.$po->id_po) }}" class="btn btn-xs btn-primary">Edit</a>
                    <a href="{{ asset('po/delete/'.$po->id_po) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-xs btn-danger">Delete</a>
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