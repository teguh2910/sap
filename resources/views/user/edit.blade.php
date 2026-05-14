@extends('layouts.app')


@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ asset('user') }}">User Management</a></li>
              <li class="breadcrumb-item active">Edit</li>
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
          <div class="col-md-12">
            @if ($errors->any())
              <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Edit User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{asset('user/edit/'.$user->id)}}" method="POST">
              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" minlength="6">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
                  </div>
                  <div class="form-group">
                    <label>Position <span class="text-danger">*</span></label>
                    <select name="position" class="form-control" required>
                        <option value="">-- Pilih Position --</option>
                        <option value="admin" {{ $user->position == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="bod" {{ $user->position == 'bod' ? 'selected' : '' }}>BOD</option>
                        <option value="fac" {{ $user->position == 'fac' ? 'selected' : '' }}>FAC</option>
                        <option value="wh" {{ $user->position == 'wh' ? 'selected' : '' }}>Warehouse</option>
                        <option value="produksi" {{ $user->position == 'produksi' ? 'selected' : '' }}>Produksi</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="{{ asset('user') }}" class="btn btn-secondary">Cancel</a>
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
