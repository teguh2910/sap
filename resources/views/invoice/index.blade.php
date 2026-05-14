@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      @include('components.alert')
      <div class="container-fluid">
        @include('components.breadcrumb', ['title' => 'List Invoice'])
        <a href="{{ url('invoice/create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Input Invoice</a>
      </div>
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Invoices</h3>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="data" class="table table-bordered table-striped table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>No Invoice</th>
                            <th>Date</th>
                            <th>FP No</th>
                            <th>Customer</th>
                            <th>PO No</th>
                            <th>PO Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoice as $i)
                        <tr>
                            <td>{{ $i->no_invoice }}</td>
                            <td>{{ $i->tgl_invoice }}</td>
                            <td>{{ $i->no_fp }}</td>
                            @foreach($i->po_customers as $p)
                            <td>{{ $p->customers->first()->nama_customer }}</td>
                            <td>{{ $p->no_po_customer }}</td>
                            <td>{{ $p->tgl_po_customer }}</td>
                            @endforeach
                            <td>
                              <a href="{{ url('invoice/view/'.$i->id_invoice) }}" class="btn btn-xs btn-info"><i class="fas fa-eye"></i> View</a>
                              <a href="{{ url('invoice/cetak/'.$i->id_invoice) }}" class="btn btn-xs btn-success"><i class="fas fa-print"></i> Print</a>
                              <a href="{{ url('invoice/edit/'.$i->id_invoice) }}" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i> Edit</a>
                              <a href="{{ url('invoice/delete/'.$i->id_invoice) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
