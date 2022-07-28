@extends('layouts.home')


@section('content')
<section class="slider_section ">
   <div class="slider_bg_box">
      <img src="{{url('image/ukir1.jpg')}}" alt="">
   </div>
   <div id="customCarousel1" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
         <div class="carousel-item active">
            <div class="container ">
               <div class="row">
                  <div class="col-md-7 col-lg-6 ">
                     <div class="detail-box">
                        <h1 style="color: red">
                           <span>
                           Sale 20% Off
                           </span>
                           <br>
                           On Everything
                        </h1>
                        <p style="color: red">
                           Ukir Gebyok SunHaji DIjamin Mangtaf.
                        </p>
                        <div class="btn-box">
                           <a href="" class="btn1">
                           Shop Now
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="container">
         <ol class="carousel-indicators">
            <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
            <li data-target="#customCarousel1" data-slide-to="1"></li>
            <li data-target="#customCarousel1" data-slide-to="2"></li>
         </ol>
      </div>
   </div>
</section>
<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span style="color: red"> NEW Product</span>
               </h2>
            </div>
            
            <div class="row">
               @foreach ($products as $p)
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{ route('produk.show',$p->id) }}" class="option1">
                           See Details
                           </a>
                           <form name="orderForm"  enctype="multipart/form-data" action="{{ url('/cart') }}">
                           <!-- harus buat view di bagian cart biar enak nantinya -->
                           <input type='hidden' name='order' value="{{$p->id}}" />
                           <a href="{{url('/cart',$p->id)}}" class="option2">
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
                  
               </div>
               @endforeach
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
