<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Invoice Print</title>


  <link rel="stylesheet" href="{{url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ url('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ url('plugins/summernote/summernote-bs4.min.css')}}">
  
</head>
<body>
    @foreach ($alamat as $a)
        
    @endforeach
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <img src="{{url('image/UkirSunHaji.png')}}" width="150" height="150" alt="Logo">
          
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>Ukir Sunhaji</strong><br>
          Desa Ngroto Rt 02 Rw01<br>
          Kecamatan Mayong Jepara Jawa Tengah<br>
          Phone: (+62)82322060412<br>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong>{{$a->nama}}</strong><br>
          {{$a->fulladdress}}<br>
          {{$a->nama_provinsi}},{{$a->region}}<br>
          Phone: (+62) {{$a->phonenumber}}<br>
          Email: {{$a->email}}
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Invoice #UKSH{{$a->orderID}}</b><br>
        <br>
        <b>Order ID:</b> {{$a->orderID}}<br>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Product</th>
            <th>Description</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>1</td>
            <td>{{$a->product_name}}</td>
            <td>{{$a->detail}}</td>
            <td>Rp.{{$a->produkprice}}</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Ongkir</td>
            <td>Ongkir dari Jawa tengah menuju {{$a->nama_provinsi}}</td>
            <td>Rp.{{$a->ongkir}}</td>
          </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
        <p class="lead">Payment Methods:</p>
        <p>REKENING BRI 589601047546534</p>
         <p> Atas Nama : Sunhaji</p>
        <p>QRIS Ukir Gebyok Pak Sunhaji</p>
        <p>Scan untuk bayar</p>
        <img src="{{url('image/qris2.jpg')}}" width="150" height="150" alt="QRIS">

        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
          Untuk verifikasi pembayaran, tunjukan struk ini 
        </p>
        <p>dan juga bukti pembayaran ke wa <a href="https://wa.me/082322060412">082322060412</a> </p>
      </div>
      <!-- /.col -->
      <div class="col-6">
        

        <div class="table-responsive">
          <table class="table">
            <tr>
              
            <tr>
              <th>Total:</th>
              <td>Rp.{{$a->total}}</td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
