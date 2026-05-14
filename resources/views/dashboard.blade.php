@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      @include('components.alert')
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <!-- KPI Cards -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $total_po_supplier }}</h3>
                <p>PO Supplier</p>
              </div>
              <div class="icon">
                <i class="fas fa-file-invoice"></i>
              </div>
              <a href="{{ url('po') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $total_po_customer }}</h3>
                <p>PO Customer</p>
              </div>
              <div class="icon">
                <i class="fas fa-file-invoice"></i>
              </div>
              <a href="{{ url('po_customer') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $total_invoices }}</h3>
                <p>Invoices</p>
              </div>
              <div class="icon">
                <i class="fas fa-file-invoice-dollar"></i>
              </div>
              <a href="{{ url('invoice') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ number_format($total_stock) }}</h3>
                <p>Total Stock</p>
              </div>
              <div class="icon">
                <i class="fas fa-warehouse"></i>
              </div>
              <a href="{{ url('stok_all') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        <!-- Stock by Category Chart -->
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Stock by Category</h3>
              </div>
              <div class="card-body">
                <canvas id="stockCategoryChart" style="height: 300px;"></canvas>
              </div>
            </div>
          </div>
          <!-- Top Products Chart -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Top 5 Products by Stock</h3>
              </div>
              <div class="card-body">
                <canvas id="topProductsChart" style="height: 300px;"></canvas>
              </div>
            </div>
          </div>
        </div>

        <!-- Stock Summary -->
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Stock Summary</h3>
              </div>
              <div class="card-body">
                <table class="table table-sm">
                  <tr>
                    <td><strong>Warehouse 1 (Gudang Satu)</strong></td>
                    <td class="text-right">{{ number_format($total_stock_g1) }}</td>
                  </tr>
                  <tr>
                    <td><strong>Warehouse 2 (Gudang Dua)</strong></td>
                    <td class="text-right">{{ number_format($total_stock_g2) }}</td>
                  </tr>
                  <tr class="bg-light font-weight-bold">
                    <td>Total</td>
                    <td class="text-right">{{ number_format($total_stock) }}</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Stock by Category Chart
    var stockCategoryCtx = document.getElementById("stockCategoryChart").getContext("2d");
    var stockCategoryChart = new Chart(stockCategoryCtx, {
        type: "doughnut",
        data: {
            labels: {!! json_encode($stock_by_category->pluck('category_part')->toArray()) !!},
            datasets: [{
                data: {!! json_encode($stock_by_category->pluck('total_qty')->toArray()) !!},
                backgroundColor: ["#00a65a", "#f39c12", "#3c8dbc", "#d2d6de"]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    // Top Products Chart
    var topProductsCtx = document.getElementById("topProductsChart").getContext("2d");
    var topProductsChart = new Chart(topProductsCtx, {
        type: "bar",
        data: {
            labels: {!! json_encode($top_products->pluck('part_no')->toArray()) !!},
            datasets: [{
                label: "Stock Quantity",
                data: {!! json_encode($top_products->pluck('total_qty')->toArray()) !!},
                backgroundColor: "#00a65a"
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
});
</script>
@endsection
