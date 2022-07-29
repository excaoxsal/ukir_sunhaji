@extends('layouts.app')


@section('content')

<section class="content">
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">{{$product->name}}</h3>
              <div class="col-12">
                <img src="{{url('product_files/'.$product->picture)}}" class="product-image" alt="Product Image">
              </div>
              
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">{{$product->name}}</h3>
              <p>{{$product->detail}}</p>
              <p>Berat Produk : {{$product->weight}}Kg</p>
              

              <hr>
              
              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  RP. {{$product->price}}
                </h2>
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

@endsection