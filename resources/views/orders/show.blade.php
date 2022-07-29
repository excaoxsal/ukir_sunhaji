@extends('layouts.app')


@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body"> 
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Gambar Produk</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Berat</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($orders as $p)
                  <tr>
                    <td><img src="{{url('product_files/'.$p->picture)}}" alt="gambar produk" width="150" height="150"></td>
                    <td>{{$p->name}}</td>
                    <td>{{$p->price}}</td>
                    <td>{{$p->weight}}</td>
                    <td>{{$p->created_at}}</td>
                    <td>{{$p->status}}</td>
                    <td>
                      <a class="btn btn-success" href="{{route('struk.show',$p->idorder)}}">Cek Struk</a>
                      <form name="orderForm" enctype="multipart/form-data" action="{{ route('orders.edit',$p->idorder) }}">
                    <input type='hidden' name='order' value="{{$p->id}}" class="invisible" /><button type="submit" class="btn btn-primary">Change Status</button></form>
                    <form action="{{ route('orders.destroy',$p->idorder) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button></td>
                  </tr>
                  @endforeach
              
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