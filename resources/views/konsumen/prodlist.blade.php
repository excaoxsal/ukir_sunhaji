@extends('layouts.konsumen')


@section('content')

<section class="content">
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
                @foreach ($product as $products)
                    {{$products->name}}
                
              <h3 class="d-inline-block d-sm-none">{{$products->name}}</h3>
              <div class="col-12">
                <img src="{{url('product_files/'.$products->picture)}}" class="product-image" alt="Product Image">
              </div>
              
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">{{$products->name}}</h3>
              <p>{{$products->detail}}</p>
              <p>Berat Produk : {{$products->weight}}Kg</p>
              

              <hr>
              
              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  RP. {{$products->price}}
                </h2>
              </div>
              <form name="orderForm"  enctype="multipart/form-data" action="{{ url('/cart') }}" method="POST">
                @csrf
                
                <!-- harus buat view di bagian cart biar enak nantinya -->
              <input type='number' name='order' value="{{$products->id}}" class="invisible" />
              <a href="javascript: submitform()">
              <div class="mt-4">
                <div class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i>
                  Buy it Now
                </div>
              </div>
              </a>
              </form>
                @endforeach
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

@endsection