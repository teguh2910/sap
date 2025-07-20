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
            <h1 class="m-0">List PO Supplier</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List PO Supplier</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <a href="{{ asset('po-suppliers/create')}}" class="btn btn-sm btn-success">Create</a>
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
                    <th>no_po</th>
                    <th>barang</th>
                    <th>vendor</th>
                    <th>tgl_po</th>
                    <th>top</th>
                    <th>delivery_by</th>
                    <th>delivery_date</th>
                    <th>quot_no</th>
                    <th>requestion_no</th>
                    <th>vat%</th>
                    <th>action</th>                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($pos as $po)
                  <tr>
                  <td>{{ $po->id_po }}</td>
                  <td><a href="{{ asset('/detailpo/'.$po->id_po) }}" class="btn btn-xs btn-primary">view</a></td>
                  <td>{{ $po->vendor ? $po->vendor->nama_vendor : 'N/A' }}</td>
                  <td>{{ $po->tgl_po }}</td>
                  <td>{{ $po->top }}</td>
                  <td>{{ $po->delivery_by }}</td>
                  <td>{{ $po->delivery_date }}</td>
                  <td>{{ $po->quot_no }}</td>
                  <td>{{ $po->pr_no }}</td>
                  <td>{{ $po->vat }}</td>
                  <td>
                    <a href="{{ asset('po-suppliers/'.$po->id_po.'/print') }}" class="btn btn-xs btn-success">Cetak</a>
                    <a href="{{ asset('po-suppliers/'.$po->id_po.'/edit') }}" class="btn btn-xs btn-primary">Edit</a>
                    <form action="{{ route('po-suppliers.destroy', $po->id_po) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                    </form>
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