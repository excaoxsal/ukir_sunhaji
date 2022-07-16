@extends('layouts.home')


@section('content')
<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">
               @foreach ($products as $p)
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{ route('products.show',$p->id) }}" class="option1">
                           See Details
                           </a>
                           <form name="orderForm"  enctype="multipart/form-data" action="{{ url('/cart') }}">
                           <!-- harus buat view di bagian cart biar enak nantinya -->
                           <input type='number' name='order' value="{{$p->id}}" class="invisible" />
                           <a href="javascript: submitform()" class="option2">
                           Buy Now
                           </a>
                           </form>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="{{url('product_files/'.$p->picture)}}" height="380" width="295" alt="">
                     </div>
                     <div class="detail-box">
                        <h5 style="text-align:left;">
                           {{$p->name}}
                        </h5>
                        
                     </div>
                     <div class="detail-box">
                        <h6>
                           Rp.{{$p->price}}
                        </h6>
                        
                     </div>
                  </div>
                  @endforeach
               </div>
               
            </div>
            <div class="btn-box">
               <a href="">
               View All products
               </a>
            </div>
         </div>
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
