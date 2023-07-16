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
            <h1 class="m-0">Create Data PO</h1>            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Data PO</li>
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
                <h3 class="card-title">Form Create Data PO</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{asset('po/create')}}" method="POST">
              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Vendor</label>
                    <select name="id_vendor" class="form-control">
                        @foreach($vendor as $v)
                        <option value="{{ $v->id_vendor }}">{{ $v->nama_vendor }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Nama Bank</label>
                    <select name="id_bank" class="form-control">
                        @foreach($bank as $b)
                        <option value="{{ $b->id_bank }}">{{ $b->nama_bank }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>TOP</label>
                    <select name="id_top" class="form-control">
                        @foreach($top as $t)
                        <option value="{{ $t->id_top }}">{{ $t->name_top }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Delivery By</label>
                    <input type="text" name="delivery_by" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Delivery Date</label>
                    <input type="date" name="delivery_date" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Quot No</label>
                    <input type="text" name="quot_no" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Requestion No</label>
                    <input type="text" name="pr_no" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Vat (%)</label>
                    <input type="number" name="vat" value="11" class="form-control">
                  </div>                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Create</button>
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