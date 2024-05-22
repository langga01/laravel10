@extends('layout.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $tittle }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">{{ $tittle }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <section class="content">
      <div class="container-fluid">
        <form action="{{ route('user.update', ['id' => $data->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">{{ $tittle }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" class="form-control" name="email" value="{{ $data->email }}" id="exampleInputEmail1" placeholder="Enter email">
                          @error('email')
                              <small> {{ $message }} </small>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama</label>
                          <input type="text" class="form-control" name="nama" value="{{ $data->name }}" id="exampleInputEmail1" placeholder="Name">
                          @error('nama')
                              <small> {{ $message }} </small>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                          @error('password')
                              <small> {{ $message }} </small>
                          @enderror
                        </div>
                      </div>
                      <!-- /.card-body -->
      
                      <div class="card-footer d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary mx-auto">Submit</button>
                            <a href="{{ route('index') }}" class="btn btn-outline-warning mx-auto">Batal</a>
                      </div>
                    </form>
                  </div>
            </div>
        </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection