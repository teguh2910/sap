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
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
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
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3></h3>
                <p>PO</p>
              </div>
              <div class="icon">
                <i class="fas fa-file"></i>
              </div>
              <a href="{{asset('/po_all')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3></h3>
                <p>Stok</p>
              </div>
              <div class="icon">
                <i class="fas fa-file"></i>
              </div>
              <a href="{{asset('/filter_stok_all')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3></h3>
                <p>Cash</p>
              </div>
              <div class="icon">
                <i class="fas fa-file"></i>
              </div>
              <a href="{{asset('/cashflow')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <!-- Pie Chart -->
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Qty Finish Goods</h3>
                </div>
                <div class="box-body">
                    <canvas id="pieChart" style="height: 300px;"></canvas>
                </div>
            </div>
        </div>
    </div>

  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

@endsection

@section('scripts')

<script>
  // JavaScript code to create the pie chart using Chart.js
  var ctx = document.getElementById("pieChart").getContext("2d");
  var pieChart = new Chart(ctx, {
    type: "pie",
    data: {
      labels: ["ADC12", "ADT4", "AC2C" , "AC2B" , "AC4B"],
      datasets: [{
        data: [80, 40, 30, 70, 60], // Example data values
        backgroundColor: ["#f56954", "#00a65a", "#f39c12"], // Example colors
      }],
    },
    options: {
      // Additional options for customization
    }
  });
</script>
@endsection
