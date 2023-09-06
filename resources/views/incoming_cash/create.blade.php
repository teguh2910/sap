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
            <h1 class="m-0">Create Data incoming_cash</h1>            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Data incoming_cash </li>
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
                <h3 class="card-title">Form Create incoming_cash</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{asset('incoming_cash/create')}}" method="POST">
              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>No PO Customer</label>                  
                  <select name="po_customer" id="" class="form-control select2">
                    @foreach($po_customer as $po)
                    <option value="{{ $po->id_po_customer }}">{{ $po->no_po_customer }}</option>
                    <option value="non_po">NON PO</option>
                    @endforeach
                  </select>
                  </div>                  
                  <div class="form-group">
                    <label>Amount</label>
                    <input type="number" name="amount_incoming" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="tgl_incoming_cash" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Bank</label>
                    <select name="id_bank" id="" class="form-control">
                      @foreach($banks as $b)
                      <option value="{{ $b->id_bank }}">{{ $b->nama_bank }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Customer</label>
                    <select name="id_customer" id="" class="form-control">
                      @foreach($customers as $c)
                      <option value="{{ $c->id_customer }}">{{ $c->nama_customer }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Term Of Payment</label>
                    <select name="top" class="form-control">
                      <option value="1mnth">1 Bulan</option>
                      <option value="3mth">3 Bulan</option>
                    </select>
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