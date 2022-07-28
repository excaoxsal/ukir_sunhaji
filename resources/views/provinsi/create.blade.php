@extends('layouts.app')


@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tambah Provinsi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body"> 
                <form action="{{route('provinsi.store')}}" method="post"enctype="multipart/form-data">
                @csrf
                  <label for="Nama Provinsi">Nama Provinsi</label>
                  <input type="text" name="namaprovinsi" placeholder="Nama Provinsi" class="form-control">
                  <input type="number" name="price" placeholder="Ongkir" class="form-control">
                  <button type="submit" class="btn btn-success">Submit</button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    

    @endsection