@extends('layouts.konsumen')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Input Bukti Pembayaran</h2>
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



<form action="{{ route('buktibayar.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="card-body">{{$order->id}}
    <input type="hidden" name="orderId" class="form-control" value="{{$order->id}}" >
    <div class="form-group">
      <label for="exampleInputFile">Input Bukti Pembayaran</label>
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