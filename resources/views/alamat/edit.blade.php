@extends('layouts.konsumen')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Update Address</h2>
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
@foreach ($almat as $p)
    
@endforeach
<form action="{{ url('edit/update') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="text"  class="form-control" name="alamat" value="{{$p->id}}" hidden="true" id="tfDefault">
  <div class="card-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Nama Penerima</label>
      <input type="name" name="name" value="{{$p['nama']}}" class="form-control" placeholder="Product Name">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Email</label>
      <input type="email" name="email" value="{{$p['email']}}" class="form-control" placeholder="Email">
      
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Nomor telepon yg dapat dihubungi</label>
      <input type="number" name="phonenumber" class="form-control" value="{{$p['phonenumber']}}" placeholder="Nomor Telepon">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Provinsi</label>
        <select selected="form-control select2" style="width: 100%;" name="provinsi" class="custom-select" id="selDefault"selected>
        <option selected>.....
        @foreach($provinsi as $pv)
        <option name="provinsi" value="{{$pv['id']}}" >{{$pv['nama_provinsi']}} </option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Kota/Kabupaten</label>
      <input type="text" name="region" class="form-control" value="{{$p['region']}}" placeholder="Kota/Kabupaten">
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