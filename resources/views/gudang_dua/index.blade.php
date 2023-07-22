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
            <h1 class="m-0">List Stok Gudang Dua</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Stok Gudang Dua</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <a href="{{ asset('gudangdua/create') }}" class="btn btn-sm btn-success">Upload Beginning Stok</a>
        <a href="{{ asset('gr/create') }}" class="btn btn-sm btn-warning">Create Qty Good Receipt Gudang Dua</a>
        <a href="{{ asset('usageg2/create') }}" class="btn btn-sm btn-primary">Create Qty Usage Production Gudang Dua</a>
        <a href="{{ asset('prodg2/create') }}" class="btn btn-sm btn-primary">Create Qty Production Gudang Dua</a>
        <a href="{{ asset('sj/create') }}" class="btn btn-sm btn-info">Create Qty Surat Jalan Gudang Dua</a>        
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
                    <th>id_stok</th>
                    <th>Category</th>
                    <th>Part No</th>
                    <th>Part Name</th>
                    <th>beginning_balance</th>
                    <th>incoming_balance</th>
                    <th>usage_balance</th>
                    <th>ending_balance</th>
                    <th>action</th>                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($gudang_duas as $g)
                  <tr>
                  <td>{{ $g->id_gudang_dua }}</td>
                  <td>{{ $g->category_part }}</td>                  
                  <td>{{ $g->part_no }}</td>
                  <td>{{ $g->part_name }}</td>
                  <td>{{ $g->beginning_balance }}</td>
                  <td>{{ $g->incoming_balance }}</td>
                  <td>{{ $g->usage_balance }}</td>
                  <td>{{ $g->beginning_balance+$g->incoming_balance-$g->usage_balance }}</td>
                  <td>
                    <a href="{{ asset('stok/edit/'.$g->id_stok) }}" class="btn btn-xs btn-primary">Edit</a>
                    <a href="{{ asset('stok/delete/'.$g->id_stok) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-xs btn-danger">Delete</a>
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