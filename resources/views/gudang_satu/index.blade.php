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
            <h1 class="m-0">List Stok Gudang Satu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Stok Gudang Satu</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <a href="{{ asset('gudangsatu/create') }}" class="btn btn-sm btn-success">Upload Beginning Stok</a>
        <a href="{{ asset('gr/create') }}" class="btn btn-sm btn-warning">Create Qty Good Receipt Gudang Satu</a>
        {{-- <a href="{{ asset('usageg1/create') }}" class="btn btn-sm btn-primary">input penggunaan RM Gudang Satu</a> --}}
        <a href="{{ asset('prodg1/') }}" class="btn btn-sm btn-primary">Input hasil Produksi Gudang Satu</a>
        <a href="{{ asset('sjg1/1') }}" class="btn btn-sm btn-info">Create Qty Surat Jalan Gudang Satu</a>     
        <a href="{{ asset('stog1/create') }}" class="btn btn-sm btn-danger">Create Qty STO</a>      
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
                          <th>id_stok</th>
                          <th>Category</th>
                          <th>Part No</th>
                          <th>Part Name</th>
                          <th>beginning_balance</th>
                          <th>incoming_balance</th>
                          <th>usage_balance</th>
                          <th>ending_balance</th>
                          <th>STO</th>
                          <th>ending_after_sto</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($gudang_satus as $g)
                    @php
                        $beginningBalance = $g->beginning_balance;
                        if($g->category_part == 'RM')
                        {
                        $totalQtyProd = $g->part_supplier->first()->grs->sum('qty_gr');
                        $usageBalance = $g->prods->sum('qty_prod_g1');
                        }
                        else
                        {
                          $totalQtyProd=$g->prods->sum('qty_prod_g1');
                          $usageBalance = $g->sjs->sum('qty_sj_g1');
                        }
                        
                        $stoQty = $g->stos->count() > 0 ? $g->stos->last()->qty_sto : 0;
                        $endingBalance = $beginningBalance + $totalQtyProd - $usageBalance - $stoQty;
                    @endphp
                
                    <tr>
                        <td>{{ $g->id_gudang_satu }}</td>
                        <td>{{ $g->category_part }}</td>
                        <td>{{ $g->part_no }}</td>
                        <td>{{ $g->part_name }}</td>
                        <td>{{ $beginningBalance }}</td>
                        <td>{{ $totalQtyProd }}</td>
                        <td>{{ $usageBalance }}</td>
                        <td>{{ $endingBalance }}</td>
                        <td>{{ $stoQty }}</td>
                        <td>{{ $stoQty - $endingBalance }}</td>
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