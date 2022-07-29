@extends('layouts.konsumen')


@section('content')
<section class="content">
      <div class="container-fluid">
        @if (count($alamat) == 0)
            <a class="btn btn-success" href="{{route('alamat.create')}}">Create Address</a>
        @endif
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Alamatku</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
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
                        
                            <a class="btn btn-primary" href="{{ route('alamat.edit',$a->id) }}">Edit</a>
                        
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