@extends('layouts.app')


@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Bukti Pembayaran</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body"> 
                
                @if ($buktibayar=="not_found.gif")
                Konsumen belum menyertakan bukti Pembayaran
                <img src="{{url('product_files/'.$buktibayar)}}" style="height: 10em; width: 10em" class="product-image" alt="Product Image">    

                @else
                <img src="{{url($buktibayar->picture)}}" class="product-image" alt="Product Image">    
                @endif
                

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