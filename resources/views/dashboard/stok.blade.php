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
            <h1 class="m-0">Dashboard Stok</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard Stok</li>
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
          <div class="card">
              <!-- /.card-header -->
              <div class="card-body">                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Gudang</th>
                    <th>Category</th>                    
                    <th>beginning_balance</th>
                    <th>incoming_balance</th>
                    <th>usage_balance</th>
                    <th>ending_balance</th>                                        
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($gudang_satu as $stok)
                  <tr>
                  <td>Gudang 1</td>
                  <td>{{ $stok->category_part }}</td>                  
                  <td>{{ $stok->total_beginning_balance }}</td>
                  <td>{{ $stok->total_incoming_balance }}</td>
                  <td>{{ $stok->total_usage_balance }}</td>
                  <td>{{ $stok->total_beginning_balance+$stok->total_incoming_balance-$stok->total_usage_balance }}</td>                  
                  </tr>
                  @endforeach
                  @foreach($gudang_dua as $stok)
                  <tr>
                  <td>Gudang 2</td>
                  <td>{{ $stok->category_part }}</td>                  
                  <td>{{ $stok->total_beginning_balance }}</td>
                  <td>{{ $stok->total_incoming_balance }}</td>
                  <td>{{ $stok->total_usage_balance }}</td>
                  <td>{{ $stok->total_beginning_balance+$stok->total_incoming_balance-$stok->total_usage_balance }}</td>                  
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