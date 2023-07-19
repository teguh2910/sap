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
            <h1 class="m-0">edit Data PO</h1>            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">edit Data PO</li>
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
                <h3 class="card-title">Form edit Data PO</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{asset('po/edit/'.$po->id_po)}}" method="POST">
              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Vendor</label>
                    <select name="id_vendor" class="form-control">
                        @foreach($vendors as $v)
                        <option value="{{ $v->id_vendor }}" {{ $v->id_vendor == $po->id_vendor ? 'selected' : '' }}>
                            {{ $v->nama_vendor }}
                        </option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Tanggal PO</label>
                    <input type="date" name="tgl_po" value="{{ $po->tgl_po }}" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>TOP</label>
                    <select name="top" class="form-control">
                        <option value="cash" @if($po->top == 'cash') selected @endif>CASH</option>
                        <option value="hutang" @if($po->top == 'hutang') selected @endif>Hutang</option>
                        <option value="deposit" @if($po->top == 'deposit') selected @endif>Deposit</option>                                                
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Delivery By</label>
                    <input type="text" name="delivery_by" value="{{ $po->delivery_by }}" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Delivery Date</label>
                    <input type="date" name="delivery_date" value="{{ $po->delivery_date }}" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Quot No</label>
                    <input type="text" name="quot_no" value="{{ $po->quot_no }}" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Requestion No</label>
                    <input type="text" name="pr_no" value="{{ $po->pr_no }}" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Vat (%)</label>
                    <select name="vat" class="form-control">
                      <option value="11" @if($po->vat == 11) selected @endif>11%</option>
                      <option value="2" @if($po->vat == 2) selected @endif>2%</option>                      
                    </select>
                  </div>                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">edit</button>
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