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
            <h1 class="m-0">Create Data out_cash</h1>            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Data out_cash </li>
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
                <h3 class="card-title">Form Create out_cash</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{asset('out_cash/create')}}" method="POST">
              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>No PO Supplier</label>
                  <select name="id_po" id="" class="form-control">
                    <option value="0">Non PO</option>
                    @foreach($pos as $p)                    
                    <option value="{{ $p->id_po }}">{{ $p->id_po }}</option>
                    @endforeach
                  </select>
                  </div>                  
                  <div class="form-group">
                    <label>Amount</label>
                    <input type="number" name="amount_out" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="tgl_out_cash" class="form-control">
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
                    <label>Category</label>
                    <select name="category" id="categorySelect" class="form-control" onchange="showTextInput()">
                      <option value="pembelian_bahan_baku">pembelian bahan baku</option>
                      <option value="investasi">investasi</option>
                      <option value="pembelian_gas">pembelian gas</option>
                      <option value="lain-lain">lain-lain</option>                                            
                    </select>
                  </div>
                  <div id="textInputContainer" style="display: none;">
                    <label>Other Category</label>
                    <input type="text" name="other_category" class="form-control">
                </div>
                <script>
                  function showTextInput() {
                      var select = document.getElementById("categorySelect");
                      var selectedOption = select.options[select.selectedIndex].value;
                      var textInputContainer = document.getElementById("textInputContainer");
          
                      if (selectedOption === "lain-lain") {
                          textInputContainer.style.display = "block";
                      } else {
                          textInputContainer.style.display = "none";
                      }
                  }
              </script>                             
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