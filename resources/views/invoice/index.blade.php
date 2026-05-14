@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <x-alert />
      <div class="container-fluid">
        <x-breadcrumb title="List Invoice" />
        <a href="{{ url('invoice/create') }}" class="btn btn-sm btn-primary">Input Invoice</a>
      </div>
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <x-card title="Invoices">
              <x-table>
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
                          <a href="{{ url('invoice/view/'.$i->id_invoice) }}" class="btn btn-xs btn-info">View</a>
                          <a href="{{ url('invoice/cetak/'.$i->id_invoice) }}" class="btn btn-xs btn-success">Print</a>
                          <a href="{{ url('invoice/edit/'.$i->id_invoice) }}" class="btn btn-xs btn-primary">Edit</a>
                          <x-delete-form action="{{ url('invoice/delete/'.$i->id_invoice) }}" label="Delete" />
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </x-table>
            </x-card>
          </div>
        </div>
      </div>
    </div>

@endsection