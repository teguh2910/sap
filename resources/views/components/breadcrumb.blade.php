<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0">{{ $title or '' }}</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active">{{ $title or '' }}</li>
    </ol>
  </div>
</div>
