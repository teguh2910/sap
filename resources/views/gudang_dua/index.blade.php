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
            <h1 class="m-0">List Stok Gudang CF</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Stok Gudang CF</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <a href="{{ asset('gudangdua/create') }}" class="btn btn-sm btn-success">Upload Beginning Stok</a>
        <a href="{{ asset('gr/create') }}" class="btn btn-sm btn-warning">Create Qty Good Receipt Gudang CF</a>
        {{-- <a href="{{ asset('usageg2/create') }}" class="btn btn-sm btn-primary">input penggunaan RM Gudang CF</a> --}}
        <a href="{{ asset('prodg2/') }}" class="btn btn-sm btn-primary">Input hasil Produksi Gudang CF</a>
        <a href="{{ asset('sjg2') }}" class="btn btn-sm btn-info">Create Qty Surat Jalan Gudang CF</a>
        <a href="{{ asset('stog2/create') }}" class="btn btn-sm btn-danger">Upload Qty STO</a>        
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
                          <th>Variant</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($gudang_duas as $g)
                    @php
                        $beginningBalance = $g->beginning_balance;
                        if($g->category_part == 'RM')
                        {
                        $totalQtyProd = $g->part_supplier->first()->grs->sum('qty_gr');
                        $usageBalance = $g->prods->sum('qty_prod_g2');
                        }
                        else
                        {
                          $totalQtyProd=$g->prods->sum('qty_prod_g2');
                          $usageBalance = $g->sjs->sum('qty_sj');
                        }
                        
                        $stoQty = $g->stos->count() > 0 ? $g->stos->last()->qty_sto : 0;
                        $endingBalance = $beginningBalance + $totalQtyProd - $usageBalance - $stoQty;
                    @endphp
                
                    <tr>
                        <td>{{ $g->id_gudang_dua }}</td>
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