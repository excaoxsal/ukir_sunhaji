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
                @foreach ($provinsi as $p)
                    
                @endforeach 
                <form action="{{route('provinsi.update',$p->id)}}" method="post"enctype="multipart/form-data">
                  @method('PUT')
                @csrf
                  <label for="Nama Provinsi">Nama Provinsi</label>
                  <input type="text" name="namaprovinsi" value="{{$p->nama_provinsi}}" placeholder="Nama Provinsi" class="form-control">
                  <label for="Nama Provinsi">Ongkos Kirim</label>
                  <input type="number" name="price" value="{{$p->price}}" placeholder="Ongkir" class="form-control">
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