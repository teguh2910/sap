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
            <h1 class="m-0">List gr</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List gr</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <a href="{{ asset('gr/create') }}" class="btn btn-sm btn-success">Create</a>
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
                <table id="example1" class="table table-bordered table-striped" style="width: 100%">
                  <thead>
                  <tr>
                    <th>no_po</th>
                    <th>Kode_barang</th>
                    <th>nama_barang</th>
                    <th>qty_gr</th>
                    @if(auth()->user()->position == 'admin' || auth()->user()->position == 'bod' || auth()->user()->position == 'fac')
                    <th>harga_gr</th>
                    @endif
                    <th>qty_order</th>
                    <th>qty_outstanding</th>
                    <th>tgl_gr</th>
                    <th>Uom</th>
                    <th>gudang</th>                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($gr as $g)
                  <tr>
                  <td>{{ $g->detail_pos->first()->id_po }}</td>
                  <td>{{ $g->materials->first()->part_number }}</td>
                  <td>{{ $g->materials->first()->part_name }}</td>
                  <td>
                    <a href="#" class="xedit" 
                       data-pk="{{$g->id_gr}}"
                       data-name="qty_gr">
                       {{$g->qty_gr}}</a>
                  </td>
                  @if(auth()->user()->position == 'admin' || auth()->user()->position == 'bod' || auth()->user()->position == 'fac')
                  <td>
                    <a href="#" class="xedit" 
                       data-pk="{{$g->id_gr}}"
                       data-name="harga_gr">                       
                       {{$g->harga_gr}}</a>                       
                  </td>
                  @endif
                  <td>{{ $g->detail_pos->first()->qty_po }}</td>
                  <td>{{ $g->detail_pos->first()->qty_po - $g->qty_gr }}</td>
                  <td>{{ $g->tgl_gr }}</td>
                  <td>{{ $g->uom }}</td>
                  <td>{{ $g->gudang }}</td>                 
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