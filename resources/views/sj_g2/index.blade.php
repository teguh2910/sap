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
            <h1 class="m-0">List Sj Gudang Dua</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Sj Gudang Dua</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->      
        <a href="{{ asset('sjg2/create') }}" class="btn btn-sm btn-info">Create Qty Surat Jalan Gudang Dua</a>    
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
                <table id="data" class="table table-bordered table-striped" style="width:100%">
                  <thead>
                  <tr>
                    <th>id_sj</th>
                    <th>Category</th>
                    <th>Part No</th>
                    <th>Part Name</th>
                    <th>Qty</th>
                    <th>Tgl</th>
                    <th>Truk</th>
                    <th>action</th>                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $d)
                  <tr>
                  <td>{{ $d->id_sj }}</td>
                  <td>{{ $d->gudang_duas()->first()->category_part }}</td>                  
                  <td>{{ $d->gudang_duas()->first()->part_no }}</td>
                  <td>{{ $d->gudang_duas()->first()->part_name }}</td>
                  <td>{{ $d->qty_sj }}</td>
                  <td>{{ $d->tgl_sj }}</td>
                  <td>{{ $d->truks->first()->plat_no }}</td>
                  <td>
                    <a href="{{ asset('sjg2/edit/'.$d->id_sj) }}" class="btn btn-xs btn-primary">Edit</a>
                    <a href="{{ asset('sjg2/delete/'.$d->id_sj) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-xs btn-danger">Delete</a>
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