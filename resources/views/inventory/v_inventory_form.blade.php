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
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
   
 @include('header')

 @include('sidebar')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ $judul }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-2">
        </div>
        <div class="col-8">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">{{ $judul }}</h3>
                </div>
                <div class="card-body">
            <form action="{{ $action }}" method="post">
                  {{ csrf_field() }}

              <input type="hidden" name="id" value="{{$id}}">
                <div class="form-group">
                    <label>Nomor PO :</label>
                            @if($errors->has('PONumber'))
                                <div class="text-danger">
                                    {{ $errors->first('PONumber')}}
                                </div>
                            @endif
                    <div class="input-group">
                      <input type="text" class="form-control" name="PONumber" value="{{ ($status=='create'?old('PONumber'):$PONumber) }}" data-mask>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                  <div class="form-group">
                    <label>Kode Produk :</label>
                            @if($errors->has('ProductCode'))
                                <div class="text-danger">
                                    {{ $errors->first('ProductCode')}}
                                </div>
                            @endif
                    <div class="input-group">
                      <input type="text" class="form-control" name="ProductCode" value="{{ ($status=='create'?old('ProductCode'):$ProductCode) }}" data-mask>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->

               
                  <div class="form-group">
                    <label>Nama Produk :</label>
                            @if($errors->has('ProductName'))
                                <div class="text-danger">
                                    {{ $errors->first('ProductName')}}
                                </div>
                            @endif
                    <div class="input-group">
                      <select id="list_kategori" type="text" name="ProductId" class="form-control select2" >
                        <option value="{{$ProductId}}">{{$ProductName}}</option>
                        @foreach($product as $val)
                          @if($val->id != $ProductId)
                            <option value="{{$val->id}}">{{$val->ProductName}}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                  

                  <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>
                  <a href="/inventory" type="submit" class="btn btn-default"><i class="fas fa-chevron-circle-left"></i> Kembali</a>

            </form>
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

    
    $('#list_kategori').select2({
      placeholder : 'Pilih Produk...',
      data : '',
    });
    

</script>
</body>
</html>
