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
            <h1 class="m-0">Edit Data Bank</h1>            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Data Bank</li>
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
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Edit Data Bank</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{asset('bank/edit/'.$bank->id_bank)}}" method="POST">
              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama Bank</label>
                    <input type="text" name="nama_bank" value="{{ $bank->nama_bank }}" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Cabang Bank</label>
                    <input type="text" name="cabang_bank" value="{{ $bank->cabang_bank }}" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Currency</label>
                    <select name="currency_bank" class="form-control">
                        <option value="{{ $bank->currency_bank }}">{{ $bank->currency_bank }}</option>
                        <option value="IDR">IDR</option>
                        <option value="USD">USD</option>
                        <option value="JPY">JPY</option>
                        <option value="THB">THB</option>
                    </select>
                  </div>                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Edit</button>
                </div>
              </form>
            </div>
          </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  
@endsection