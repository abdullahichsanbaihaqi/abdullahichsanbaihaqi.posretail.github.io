<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PoS | Inventory</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/select2/css/select2.min.css') }}">
  <!-- Select2 style -->
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
            <h1>Inventory</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Inventory</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
     
    
    <div class="content">
 
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          

          <div class="card">

              <div class="card-header clearfix">
                <a href="/inventory/add_inventory" class="btn btn-info float-left"><i class="fas fa-plus"></i></a>
                <a href="export_excel" class="btn btn-success float-left" style="margin-left: 67%" target="_blank"><i class="fas fa-download"></i> EXPORT EXCEL</a>
                <a href="export_excel" class="btn btn-info float-left" style="margin-left: 1%" data-toggle="modal" data-target="#import"><i class="fas fa-upload"></i> IMPORT EXCEL</a>
    
               
              </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr style="text-align: center">
                  <th>Nomor PO</th>
                  <th>Kode Barcode</th>
                  <th>Produk</th>
                  <th>Kategori</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php 
                ?>
                @foreach($inventory as $val)
                <tr id="tr{{$val->id}}" style="text-align: center">
                  <td>{{$val->PONumber}}</td> 
                  <td>{{$val->ProductCode}}</td> 
                  <td>{{$val->get_product->ProductName}}</td>
                  <td>{{$val->get_product->get_category->CategoryName}}</td>
                  <td style="width: 100px">
                    <a href="/inventory/edit_inventory/{{$val->id}}" class="btn btn-warning" ><i class="fas fa-edit"></i></a>
                    <a href="#" data-id="{{$val->id}}" data-name="{{$val->ProductName}}" class="btn btn-danger delete"><i class="fas fa-trash-alt"></i></a>
                  </td>
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

<!-- Modal Import Star -->
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Product From Excel
           <a href="download_excel" class="btn btn-success" title="download template" ><i class="fas fa-file-excel"></i></a>
         </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="importexcel" class="form-horizontal" method="post" enctype="multipart/form-data" id="dataupload">
          @csrf
          <div class="form-group">
            <input type="file" name="import_file" id="importfile">
          </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Import File</button>
      </div>

        </form>
    </div>
  </div>
</div>
<!-- Modal Import End -->

<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('lte/plugins/select2/js/select2.min.js') }}"></script>
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
                  url: "delete_inventory/"+id,
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

    $('#list_kategori').select2({
      placeholder : 'Pilih Kategori...',
      data : '',
    });
</script>
</body>
</html>
