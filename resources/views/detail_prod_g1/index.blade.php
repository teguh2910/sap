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
            <h1 class="m-0">List Produksi Gudang SAC</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Produksi Gudang SAC</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row --> 
        <a href="{{asset('prodg1/create')}}" class="btn btn-sm btn-primary">Input hasil Produksi Gudang SAC</a>
        <a href="{{ asset('prodg1/cetak/'.$id) }}" class="btn btn-sm btn-success">Cetak</a>
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
                          <th>id_prod_g1</th>
                          <th>Kategori</th>
                          <th>part number</th>
                          <th>part name</th>
                          <th>qty</th>
                          <th>price</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($detail_prod_g1 as $d)
                      <tr>
                          <td>{{ $d->id_prod_g1 }}</td>
                          @foreach($d->gudang_satus as $g)
                          <td>{{ $g->category_part }}</td>
                          <td>{{ $g->part_no }}</td>
                          <td>{{ $g->part_name }}</td>
                          @endforeach
                          <td>
                            <a href="#" class="detail_prod_g1" 
                               data-pk="{{$d->id_detail_prod_g1}}"
                               data-name="qty_prod_g1">
                               {{$d->qty_prod_g1}}</a>
                          </td>
                          <td>
                            <a href="#" class="detail_prod_g1" 
                               data-pk="{{$d->id_detail_prod_g1}}"
                               data-name="price_g1">
                               {{$d->price_g1}}</a>
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