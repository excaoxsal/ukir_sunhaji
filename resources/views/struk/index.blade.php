@extends('layouts.konsumen')


@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List Receipt</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body"> 
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th></th>
                    <th>Nama Provinsi</th>
                    <th>Harga</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($provinsi as $p)
                  <tr>
                    <td>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary2" value="{{$p->id}}">
                        <label for="checkboxPrimary2">
                        </label>
                      </div>
                    </td>
                    <td>{{$p->nama_provinsi}}</td>
                    <td>{{$p->price}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('products.edit',$p->id) }}">Edit</a>
                        <a class="btn btn-info" href="{{ route('products.destroy',$p->id) }}">Delete</a>
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