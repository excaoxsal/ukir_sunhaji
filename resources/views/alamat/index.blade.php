@extends('layouts.konsumen')


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
                    <th>Nama Penerima</th>
                    <th>email</th>
                    <th>Provinsi</th>
                    <th>Kabupaten</th>
                    <th>No HP</th>
                    <th>Alamat Lengkap</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($alamat as $a)
                  <tr>
                    <td>
                      
                    </td>
                    <td>{{$a->nama}}</td>
                    <td>{{$a->email}}</td>
                    <td>{{$a->nama_provinsi}}</td>
                    <td>{{$a->region}}</td>
                    <td>{{$a->phonenumber}}</td>
                    <td>{{$a->fulladdress}}</td>
                    <td>
                        <form action="{{ route('alamat.destroy',$a->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('alamat.edit',$a->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
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