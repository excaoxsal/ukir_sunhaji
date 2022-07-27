@extends('layouts.konsumen')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Address</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href=""> Back</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('alamat.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="card-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Nama Penerima</label>
      <input type="name" name="name" class="form-control" placeholder="Product Name">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Email</label>
      <input type="email" name="email" class="form-control" placeholder="Email">
      
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Nomor telepon yg dapat dihubungi</label>
      <input type="number" name="phonenumber" class="form-control" placeholder="Price">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Provinsi</label>
        <select selected="form-control select2" style="width: 100%;" name="provinsi" class="custom-select" id="selDefault"selected>
        <option selected>.....
        @foreach($provinsi as $p)
        <option name="provinsi" value="{{$p['id']}}" >{{$p['nama_provinsi']}} </option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Kota/Kabupaten</label>
      <input type="text" name="region" class="form-control" placeholder="Kota/Kabupaten">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Alamat Lengkap</label>
      <textarea class="form-control" style="height:150px" name="fulladdress" placeholder="Alamat Lengkap"></textarea>
    </div>
  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  
</form>

@endsection