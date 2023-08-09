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
    <!-- Bar Chart -->
      <div class="col-md-6">
          <div class="box box-primary">
              <div class="box-header with-border">
                  <h3 class="box-title">Stock per Customer VS PO Customer</h3>
              </div>
              <div class="box-body">
                  <canvas id="stockPoBarChart" style="height: 300px;"></canvas>
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
  var pieChartCtx = document.getElementById("pieChart").getContext("2d");
  var pieChart = new Chart(pieChartCtx, {
    type: "pie",
    data: {
      labels: ["ADC12", "ADT4", "AC2C", "AC2B", "AC4B"],
      datasets: [{
        data: [80, 40, 30, 70, 60], // Example data values
        backgroundColor: ["#f56954", "#00a65a", "#f39c12", "#3c8dbc", "#d2d6de"], // Example colors
      }],
    },
    options: {
      // Additional options for customization
    }
  });

 // JavaScript code to create the Stock per Customer VS PO Customer bar chart using Chart.js
 var stockPoBarChartCtx = document.getElementById("stockPoBarChart").getContext("2d");
  var stockPoBarChart = new Chart(stockPoBarChartCtx, {
    type: "bar",
    data: {
      labels: ["ADC12", "ADT4", "AC2C", "AC2B", "AC4B"],
      datasets: [
        {
          label: "Stock Quantity",
          data: [50, 30, 60, 45, 70], // Example stock quantity values per customer
          backgroundColor: "#00a65a", // Example color for stock
        },
        {
          label: "PO Quantity",
          data: [50, 40, 35, 25, 50], // Example PO quantity values per customer
          backgroundColor: "#3c8dbc", // Example color for PO quantities
        },
      ],
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
                    max:100,
                }
            }]
        }
    }
  });
</script>
@endsection

