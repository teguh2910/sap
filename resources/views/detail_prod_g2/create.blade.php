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
            <h1 class="m-0">Create Data Raw Material Gudang Dua</h1>            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Data Qty Raw Material Gudanag Dua</li>
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
                <h3 class="card-title">Form Create Data Qty Raw Material Gudanag Dua</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ asset('detailprodg2/create') }}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="id_prod_g2" value="{{ $prod_g2->id_prod_g2 }}">
                <div class="card card-primary">
                  <div class="card-body">
                    <div id="input-container">
                      <!-- Default Input -->
                      <div class="form-group row">
                        <select class="form-control col-md-3 select2" name="id_gudang_dua_0">
                          @foreach($gudangdua as $g)
                          <option value="{{ $g->id_gudang_dua }}">{{ $g->part_name }}</option>
                          @endforeach
                        </select>
                        <input type="number" required class="form-control col-md-3" name="price_g2_0" placeholder="Harga">
                        <input type="number" required class="form-control col-md-3" name="qty_prod_g2_0" placeholder="Qty">                        
                        <input type="text" readonly class="form-control col-md-2" name="satuan_0" value="Kg">
                      </div>
                      <!-- The dynamic input fields will be added here -->
                    </div>
                    <button type="button" class="btn btn-primary mt-2" onclick="addInput()">Add New Input</button>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" name="rm_submit" value="submit_rm" class="btn btn-primary">Next</button>
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
    partNoSelect.name = "id_gudang_dua_" + inputCount;

    // Add options to the select
    @foreach($gudangdua as $g)
    const option{{ $g->id_gudang_dua }} = document.createElement("option");
    option{{ $g->id_gudang_dua }}.value = "{{ $g->id_gudang_dua }}";
    option{{ $g->id_gudang_dua }}.text = "{{ $g->part_name }}";
    partNoSelect.appendChild(option{{ $g->id_gudang_dua }});
    @endforeach

    // Create Quantity Input
    const qtyInput = document.createElement("input");
    qtyInput.type = "number";
    qtyInput.className = "form-control col-md-3";
    qtyInput.name = "qty_prod_g2_" + inputCount;
    qtyInput.placeholder = "Qty";

    // Create Harga Input
    const hargaInput = document.createElement("input");
    hargaInput.type = "number";
    hargaInput.className = "form-control col-md-3";
    hargaInput.name = "price_g2_" + inputCount;
    hargaInput.placeholder = "Harga";

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