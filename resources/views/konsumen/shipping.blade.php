@extends('layouts.konsumen')


@section('content')
@foreach ($products as $products)
    
@endforeach
<section class="content">
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">{{$products->productname}}</h3>
              <div class="col-12">
                <img src="{{url('product_files/'.$products->picture)}}" class="product-image" alt="Product Image">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">{{$products->productname}}</h3>
              <p>{{$products->detail}}</p>
              <hr>
              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  RP. {{$products->harga}}
                </h2>
                <h6>harga produk Rp.{{$products->price}}</h6>
                <h6>ongkir Rp.{{$products->ongkir}}</h6>
              </div>
              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  Berat produk {{$products->weight}} Kg
                </h2>
              </div>
              <form name="orderForm"  enctype="multipart/form-data" action="{{ url('/struk') }}">
                <!-- harus buat view di bagian cart biar enak nantinya -->
                <label for="">pengiriman ke alamat</label>

              <input type='number' name='order' value="{{$products->orderID}}" class="invisible" />
              <div class="icheck-primary d-inline">
                
                <input type="radio" id="radioPrimary2" name="r1">
                <label for="radioPrimary2">
                  <div>
                    <h3>Nama Penerima : {{$products->nama}}</h3>
                  </div>
                  <div>Provinsi : {{$products->nama_provinsi}}</div>
                  <div>Kota/Kabupaten : {{$products->region}}</div>
                  <div>Alamat : {{$products->fulladdress}}</div>
                  <div>Nomor Hp yang dapat dihubungi : {{$products->phonenumber}}</div>
                </label>
              </div>
                
              
              <div class="mt-4">
                <a href="javascript: submitform()">
                <div class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i>
                  Selesaikan
                </div>
                </a>
                </form>
                <form name="orderForm"  enctype="multipart/form-data" action="{{ url('/batalkan') }}">
                <a href="javascript: cancelform()">
                <div class="btn btn-danger btn-lg btn-flat">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i>
                  Batalkan
                </div>
                </a>
                </form>
              </div>
              

            </div>
          </div>
          
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

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
<script type="text/javascript">
function cancelform()
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