@extends('layouts.app')


@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Orders</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body"> 
                @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Gambar Produk</th>
                    <th>Nama Barang</th>
                    <th>Nama Pemesan</th>
                    
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
                    <td>{{$p->namapemesan}}</td>
                    
                    <td>{{$p->created_at}}</td>
                    <td>{{$p->status}}</td>
                    <td>
                      @if ($p->status == 'Anda Belum Mendaftarkan Alamat')
                      <button class="btn btn-success false"  href="{{route('struk.show',$p->idorder)}}" disabled>Belum bisa cetak struk</button>
                      @else
                      <a class="btn btn-success" href="{{route('struk.show',$p->idorder)}}">Cek Struk</a>
                      
                      @endif
                      <a class="btn btn-warning" href="{{route('buktibayar.show',$p->idorder)}}">Cek Bukti Pembayaran</a>

                      <a class="btn btn-primary" href="{{ route('orders.edit',$p->idorder) }}">Change Status</a>
                    <form action="{{ route('orders.destroy',$p->idorder) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button></td>
                    </form>
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