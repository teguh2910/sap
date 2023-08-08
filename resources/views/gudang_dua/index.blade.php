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
        {{-- <a href="{{ asset('usageg2/create') }}" class="btn btn-sm btn-primary">input penggunaan RM Gudang Dua</a> --}}
        <a href="{{ asset('prodg2/') }}" class="btn btn-sm btn-primary">Input hasil Produksi Gudang Dua</a>
        <a href="{{ asset('sjg2/create') }}" class="btn btn-sm btn-info">Create Qty Surat Jalan Gudang Dua</a>
        <a href="{{ asset('stog2/create') }}" class="btn btn-sm btn-danger">Create Qty STO</a>        
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
                          {{-- <th>action</th> --}}
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
                          @if($g->category_part=="FG")
                          @foreach($g->incoming as $i)
                          <td>{{ $i->total_qty_prod_g2 }}</td>
                          @endforeach
                          @elseif($g->category_part=="RM")
                          @foreach($g->incoming as $i)
                          <td>{{ $i->total_qty_prod_g2 }}</td>
                          @endforeach                          
                          @endif
                          <td><td>{{ $g->usage_balance }}</td></td>
                          <td>{{ $g->beginning_balance + $g->incoming_balance - $g->usage_balance }}</td>              
                          <!-- Check if there are associated STOs (stock transfer orders) -->
                          @if($g->stos->count() > 0)
                                  @php
                                    $s = $g->stos->last();
                                  @endphp                      
                                  <td>{{ $s->qty_sto }}</td>
                                  <td>{{ $g->beginning_balance + $g->incoming_balance - $g->usage_balance - $s->qty_sto }}</td>                              
                          @else
                              <!-- If there are no STOs, display 0 in the corresponding columns -->
                              <td>0</td>
                              <td>{{ $g->beginning_balance + $g->incoming_balance - $g->usage_balance }}</td>
                          @endif
              
                          {{-- <td>
                              <a href="{{ asset('stok/edit/'.$g->id_stok) }}" class="btn btn-xs btn-primary">Edit</a>
                              <a href="{{ asset('stok/delete/'.$g->id_stok) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-xs btn-danger">Delete</a>
                          </td> --}}
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