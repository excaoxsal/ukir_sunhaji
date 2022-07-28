@extends('layouts.konsumen')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Status Orders</h2>
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
@foreach ($orders as $p)
    
@endforeach
<form action="{{ url('edit/saveStatus') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="hidden"  class="form-control" name="orderId" value="{{$p->id}}"  id="tfDefault">
  <div class="card-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Status Pengiriman</label>
      <input type="name" name="status" value="{{$p->status}}" class="form-control" placeholder="Product Name">
    </div>
  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  
</form>

@endsection