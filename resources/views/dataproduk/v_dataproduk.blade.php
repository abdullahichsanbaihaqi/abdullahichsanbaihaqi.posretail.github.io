<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PoS | Produk</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 
 @include('sweet::alert') 
 @include('header')

 @include('sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          

          <div class="card">
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr style="text-align: center">
                  <th style="text-align: left">Produk</th>
                  <th style="width: 40%">Jumlah Product</th>
                </tr>
                </thead>
                <tbody>

                <?php 
                $x=1;
                ?>
                @foreach($dataproduk as $val)
                <tr id="tr{{$val->id}}" style="text-align: center">
                  <td style="text-align: left">{{$val->ProductName}}</td>
                  <td>{{$val->total}}</td>
                  
                </tr>
                @endforeach
                
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
 @include('footer')
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('lte/dist/js/demo.js') }}"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });

    $(".delete").on("click", function(){

      var id = $(this).data("id");
      var name = $(this).data("name");
      var token = $("meta[name='csrf-token']").attr("content");

         swal({
          title: "Yakin Hapus "+name+" ?",
          text: "",
          icon: "warning",
          buttons: [
            'Batal',
            'Yakin'
          ],
          dangerMode: true,
        }).then(function(isConfirm) {
          if (isConfirm) { 
            swal({
              title: name + ' telah dihapus!',
              text: '',
              icon: 'success'
            }).then(function() {
              
                 $.ajax({
                  url: "delete_kategori/"+id,
                  type: 'DELETE',
                  data: {
                      "id": id,
                      "_token": token,
                  },
               });
              $('#tr'+id).closest( "tr" ).remove();
            });
          } else {
            swal("Batal Hapus "+name, "", "error");
          }
        });
    });
</script>
</body>
</html>
