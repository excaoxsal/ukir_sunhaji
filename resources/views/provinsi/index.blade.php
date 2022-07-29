@extends('layouts.app')


@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <a href="{{route('provinsi.create')}}" class="btn btn-success">Tambah Provinsi</a>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Provinsi</h3>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body"> 
                <table  class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama Provinsi</th>
                    <th>Harga</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($provinsi as $p)
                  
                  <tr>
                    
                    <td>{{$p->nama_provinsi}}</td>
                    <td>{{$p->price}}</td>
                    <td><form action="{{ route('provinsi.destroy',$p->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-primary" href="{{ route('provinsi.edit',$p->id) }}">Edit</a>
                        <button class="btn btn-danger" type="submit">Delete</button></form>
                  </tr>
                  @endforeach
              
              
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
    
<script type="text/javascript">
function submitform()
{
   if(document.orderForm.onsubmit &&
   !document.orderForm.onsubmit())
   {
   return;
   }
   document.orderForm.submit();
}
</script>
    @endsection