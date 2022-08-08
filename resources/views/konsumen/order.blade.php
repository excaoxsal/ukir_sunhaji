@extends('layouts.konsumen')


@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title text-bold">My Order</h1>
              </div>
              <!-- /.card-header -->
              @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                      <p>{{ $message }}</p>
                  </div>
              @endif
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
                  @foreach ($myorder as $p)
                  <tr>
                    
                    <td><img src="{{url('product_files/'.$p->picture)}}" alt="gambar produk" width="150" height="150"></td>
                    <td>{{$p->name}}</td>
                    <td>Rp.{{$p->price}}</td>
                    <td>{{$p->weight}}</td>
                    <td>{{$p->created_at}}</td>
                    <td>{{$p->status}}</td>
                    <td>
                    @if (count($alamat) == 0)
                    <a class="btn btn-primary" href="{{route('alamat.create',$p->id)}}">Isi Alamat Sekarang</a>
                    @else
                    <a class="btn btn-primary" href="{{route('struk.show',$p->id)}}">Bayar Sekarang</a>
                    @if($p->status == "Bukti Pembayaran Telah Ditambahkan")
                    <button type="submit" class="btn btn-success" disabled>Bukti Telah diUpload</button>
                    @else
                    <form action="{{route('buktibayar.create',$p->id)}}" class="hidden">
                    <button type="submit" class="btn btn-success">Upload Bukti Pembayaran</button>
                    @endif
                    @endif
                    <input type='number' name='order' value="{{$p->id}}" class="invisible" />
                    <form action="{{url('/cancelOrder')}}" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{$p->id}}"><button type="submit" class="btn btn-danger">Batalkan Pesanan</button>
                    </form>
                  </td>
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