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
            <h1 class="m-0">Dashboard hutang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard hutang</li>
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
          <div class="card">
              <!-- /.card-header -->
              <div class="card-body">                
                <table id="example1" class="table table-bordered table-striped" style="width:100%">
                  <thead>
                  <tr>
                    <th>No PO</th>
                    <th>Amount PO</th>                    
                    <th>Out Cash</th>
                    <th>Remain</th>                                                            
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($po_by_id as $id_po => $sumAmount)
                  <tr>
                  <td>{{ $id_po }}</td>
                  <td>{{ $sumAmount }}</td>
                  <td>
                    @if ($pos->where('id_po', $id_po)->first()->out_cashs->isNotEmpty())                        
                            @foreach ($pos->where('id_po', $id_po)->first()->out_cashs as $out_cashs)
                                {{ $out_cashs->amount_out }}
                                <!-- Display other OutCash attributes as needed -->
                            @endforeach                        
                    @else
                        0
                    @endif
                </td>
                  <td>{{ $sumAmount }}</td>                  
                  </tr>
                  @endforeach
                  </tbody>                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  
@endsection