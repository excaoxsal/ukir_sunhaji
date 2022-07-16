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
                <form action="">  
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th></th>
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
                    <td>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary2" value="{{$p->id}}">
                        <label for="checkboxPrimary2">
                        </label>
                      </div>
                    </td>
                    <td>{{$p->name}}</td>
                    <td>{{$p->price}}</td>
                    <td>{{$p->weight}}</td>
                    <td>{{$p->created_at}}</td>
                    <td>{{$p->status}}</td>
                    <td><form name="orderForm"  enctype="multipart/form-data" action="{{ url('/cart') }}">
                    <a href="">Pay Now</a><input type='number' name='order' value="{{$p->id}}" class="invisible" /></form></td>
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