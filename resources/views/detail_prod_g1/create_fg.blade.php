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
            <h1 class="m-0">Create Data Finish Goods Gudang Satu</h1>            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Data Qty Finish Goods Gudang Satu</li>
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
                <h3 class="card-title">Form Create Data Qty Finish Goods Gudang Satu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ asset('detailprodg1/create') }}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="id_prod_g1" value="{{ $id_prod_g1 }}">
                <div class="card card-primary">
                  <div class="card-body">
                    <div id="input-container">
                      <!-- Default Input -->
                      <div class="form-group row">
                        <select class="form-control col-md-3 select2" name="id_gudang_satu_0">
                          @foreach($part_fg as $g)
                          <option value="{{ $g->id_gudang_satu }}">{{ $g->part_name }}</option>
                          @endforeach
                        </select>
                        <!-- <input type="number" required class="form-control col-md-3" name="price_g1_0" placeholder="Harga"> -->
                        <input type="number" required class="form-control col-md-3" name="qty_prod_g1_0" placeholder="Qty">                        
                        <input type="text" readonly class="form-control col-md-2" name="satuan_0" value="Kg">
                      </div>
                      <!-- The dynamic input fields will be added here -->
                    </div>
                    <button type="button" class="btn btn-primary mt-2" onclick="addInput()">Add New Input</button>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" name="submit_fg" value="submit_fg" class="btn btn-primary">Next</button>
                  </div>
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
<script>
  let inputCount = 1;

  function addInput() {
    const container = document.getElementById("input-container");

    const inputGroup = document.createElement("div");
    inputGroup.className = "form-group row";

    // Create Part Number Select
    const partNoSelect = document.createElement("select");
    partNoSelect.className = "form-control col-md-3 select2";
    partNoSelect.name = "id_gudang_satu_" + inputCount;

    // Add options to the select
    @foreach($part_fg as $g)
    const option{{ $g->id_gudang_satu }} = document.createElement("option");
    option{{ $g->id_gudang_satu }}.value = "{{ $g->id_gudang_satu }}";
    option{{ $g->id_gudang_satu }}.text = "{{ $g->part_name }}";
    partNoSelect.appendChild(option{{ $g->id_gudang_satu }});
    @endforeach

    // Create Quantity Input
    const qtyInput = document.createElement("input");
    qtyInput.type = "number";
    qtyInput.className = "form-control col-md-3";
    qtyInput.name = "qty_prod_g1_" + inputCount;
    qtyInput.placeholder = "Qty";

    // Create Harga Input
    // const hargaInput = document.createElement("input");
    // hargaInput.type = "number";
    // hargaInput.className = "form-control col-md-3";
    // hargaInput.name = "price_g1_" + inputCount;
    // hargaInput.placeholder = "Harga";

    // Create Satuan Input
    const satuanInput = document.createElement("input");
    satuanInput.type = "text";
    satuanInput.className = "form-control col-md-2";
    satuanInput.value = "Kg";
    satuanInput.readOnly = true;
    satuanInput.name = "satuan_" + inputCount;

    const removeBtn = document.createElement("button");
    removeBtn.type = "button";
    removeBtn.className = "btn btn-danger col-md-1";
    removeBtn.textContent = "Remove";
    removeBtn.onclick = function() {
      container.removeChild(inputGroup);
    };

    inputGroup.appendChild(partNoSelect);    
    inputGroup.appendChild(hargaInput);
    inputGroup.appendChild(qtyInput);
    inputGroup.appendChild(satuanInput);
    inputGroup.appendChild(removeBtn);
    container.appendChild(inputGroup);
    // Reinitialize Select2 on the new "Part Number" select input
    $(inputGroup).find(".select2").select2({
      width: 'resolve',
      theme: 'bootstrap4'
    });

    inputCount++;
  }  
</script>