@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="card-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Product Name</label>
      <input type="name" name="name" class="form-control" placeholder="Product Name">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Detail</label>
      <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Price</label>
      <input type="number" name="price" class="form-control" placeholder="Price">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Weight</label>
      <input type="number" name="weight" class="form-control" placeholder="Weight">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Stock</label>
      <input type="number" name="stock" class="form-control" placeholder="Stock">
    </div>
    <div class="form-group">
      <label for="exampleInputFile">Input Pictures</label>
      <div class="input-group">
        <div class="form-group">
            <div class="custom-file">
              <input type="file" class="form-control" id="tf2" value="{{ old('file') }}" name="file" >
            </div>
          </div><!-- /.form-group -->
      </div>
    </div>
  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  
</form>
@endsection