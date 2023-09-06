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
            <h1 class="m-0">List detailpo</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List detailpo</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <a href="{{ asset('detailpo/create/'.$id) }}" class="btn btn-sm btn-success">Create</a>
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
                    <th>kode_barang</th>
                    <th>nama_barangg</th>
                    <th>Qty_Po</th>
                    <th>Uom</th>
                    @if(auth()->user()->position == 'admin' || auth()->user()->position == 'bod' || auth()->user()->position == 'fac')
                    <th>Harga_po</th>
                    @endif
                    <th>action</th>                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($detailpos as $d)
                  <tr>
                  <td>{{ $d->id_po }}</td>
                  @foreach($d->materials as $m)
                  <td>{{ $m->part_number }}</td>
                  <td>{{ $m->part_name }}</td>
                  @endforeach                  
                  <td>{{ number_format($d->qty_po) }}</td>                                    
                  <td>{{ $d->uom }}</td>
                  @if(auth()->user()->position == 'admin' || auth()->user()->position == 'bod' || auth()->user()->position == 'fac')
                  <td>Rp {{ number_format($d->harga_po) }}</td>
                  @endif
                  <td>
                    <a href="{{ asset('detailpo/edit/'.$d->id_detail_po) }}" class="btn btn-sm btn-primary">Edit</a>
                    <a href="{{ asset('detailpo/delete/'.$d->id_detail_po) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-danger">Delete</a>
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