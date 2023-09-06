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
                <table id="data" class="table table-bordered table-striped" style="width:100%">
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
                  <tr>
                  <td>Gudang 2</td>
                  <td>FG</td>                  
                  <td>{{ $fg_g2 }}</td>
                  <td>{{ $prod_g2 }}</td>
                  <td>{{ $sj_g2 }}</td>
                  <td>{{ $fg_g2+$prod_g2-$sj_g2 }}</td>                  
                  </tr>
                  <tr>
                    <td>Gudang 2</td>
                    <td>Material</td>                  
                    <td>{{ $rm_g2 }}</td>
                    <td>{{ $gr_g2 }}</td>
                    <td>{{ $usage_g2 }}</td>
                    <td>{{ $rm_g2+$gr_g2-$usage_g2 }}</td>                  
                  </tr>
                  <tr>
                    <td>Gudang 1</td>
                    <td>FG</td>                  
                    <td>{{ $fg_g1 }}</td>
                    <td>{{ $prod_g1 }}</td>
                    <td>{{ $sj_g1 }}</td>
                    <td>{{ $fg_g1+$prod_g1-$sj_g1 }}</td>                  
                    </tr>
                    <tr>
                      <td>Gudang 1</td>
                      <td>Material</td>                  
                      <td>{{ $rm_g1 }}</td>
                      <td>{{ $gr_g1 }}</td>
                      <td>{{ $usage_g1 }}</td>
                      <td>{{ $rm_g1+$gr_g1-$usage_g1 }}</td>                  
                    </tr>
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