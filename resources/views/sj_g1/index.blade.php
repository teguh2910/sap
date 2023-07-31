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
            <h1 class="m-0">List Stok</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Stok</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <a href="{{ asset('sjg1/create') }}" class="btn btn-sm btn-info">Create Qty Surat Jalan Gudang Satu</a>    
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
                <table id="example1" class="table table-bordered table-striped" style="width:100%">
                  <thead>
                  <tr>
                    <th>id_sj_g1</th>
                    <th>Category</th>
                    <th>Part No</th>
                    <th>Part Name</th>
                    <th>qty_sj</th>
                    <th>po customer</th>
                    <th>truk</th>
                    <th>action</th>                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($sjg1 as $s)
                  <tr>
                  <td>{{ $s->id_sj_g1 }}</td>
                  <td>{{ $s->gudang_satus->first()->category_part }}</td>                  
                  <td>{{ $s->gudang_satus->first()->part_no }}</td>
                  <td>{{ $s->gudang_satus->first()->part_number }}</td>
                  <td>{{ $s->qty_sj_g1 }}</td>
                  <td>{{ $s->po_customers->first()->id_po_customer }}</td>
                  <td>{{ $s->truks->first()->plat_no }}</td>
                  <td>
                    <a href="{{ asset('stok/edit/'.$s->id_sj_g1) }}" class="btn btn-xs btn-primary">Edit</a>
                    <a href="{{ asset('stok/delete/'.$s->id_sj_g1) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-xs btn-danger">Delete</a>
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