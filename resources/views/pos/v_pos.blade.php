<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PoS | PoS</title>
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
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

 <!-- Navbar -->
 <!-- /.navbar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="row">
    <div class="col-sm-8">
      <div class="form-group">
        <div class="content">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">  
                </div>
                <div class="col-sm-6">
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="form-group">
                          <h5 style="margin-top: 2%"> Input Kode Barcode</h5>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input type="text" id="barcode" name="kode" class="form-control" style="margin-left: -10%">
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body"  style="overflow-y: scroll;height: 500px">
                    <table id="tabel" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>Produk</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                      </tr>
                      </thead>
                      <tbody>
                      
              
                      </tbody>
                     
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

                
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
      </div>


    <div class="col-sm-4">
      <div class="content">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">  
                </div>
                <div class="col-sm-6">
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <h1 style="margin-top: 2%;text-align: center"> BILLING</h1>
                        </div>
                      </div>
                      
                      <div class="col-sm-3">
                        <div class="form-group">
                        </div>
                      </div>
                    </div>

                  </div>
                   <!-- /.card-header -->
                  <div class="card-body">
                    <table  class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th style="text-align: center;">KETERANGAN</th>
                        <th style="text-align: center;">NOMINAL</th>  
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>SUBTOTAL</td>
                        <td id='subtotal' style="text-align: right;">0</td>
                      </tr>
                      <tr>
                        <td>DISKON</td>
                        <td><input id="diskon" name="diskon" onchange="diskon()" value="0" class="form-control" style="text-align: right;"></td>
                      </tr>
                      <tr>
                        <td>TOTAL</td>
                        <td id='total' style="text-align: right;">0</td>
                      </tr>
                      <tr>
                        <td>JUMLAH BAYAR</td>
                        <td><input id="bayar" name="bayar" onchange="bayar()" value="0" class="form-control" style="text-align: right;"></td>
                      </tr>
                      <tr>
                        <td>KEMBALIAN</td>
                        <td  id="kembalian" style="text-align: right;">0</td>
                      </tr>

              
                      </tbody>
                     
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

                
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
      </div>
    </div>

  </div>
  <!-- /.content-row -->
  </div>
  <!-- /.content-wrapper -->
  
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
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });

  $("#barcode").on("change", function(){

    var barcode = $("#barcode").val();

      $.ajax({
        url    :"/jasoninventory/"+barcode,
        dataType : 'json',
        context  : document.body
       }).done(function(data) {

      if($('#tr'+data.ProductId).length){
      var qty = $("#qty"+ data.ProductId).val();
      var jumlah = $("#jumlah"+ data.ProductId).text();


      var qty2 = parseInt(qty) + parseInt(1);
      var jumlah2 = (qty2) * (data.Price);
          $("#qty"+ data.ProductId).val(qty2);
          $("#jumlah"+ data.ProductId).text(jumlah2);
      }else{
       var e = $('<tr id="tr'+data.ProductId+'">'+
                    '<td>'+data.ProductName +'</td>'+
                    '<td>'+
                    '<input id="qty'+ data.ProductId+'" value="1" onchange="ubah('+data.ProductId+')" style="width:30px;text-align:center">'+
                    '</td>'+
                    '<td id="price'+ data.ProductId+'">'+data.Price +'</td>'+
                    '<td id="jumlah'+ data.ProductId+'">'+data.Price +'</td>'+
                        
                  '</tr>');  
              
          $("#tabel").append(e);
      }
          total();
          $("#barcode").val('');
        });
  });

  function ubah (id){
    
    var qty = $("#qty"+id).val();
    var price = $("#price"+id).text();
    if(qty == 0){

        $("#tr"+id).remove();
    }else{    var total = qty*parseInt(price);
    $("#jumlah"+id).text(total);
    }
    var table = document.getElementById("tabel"), sumVal = parseInt(0);
            
            for(var i = 1; i < table.rows.length; i++)
            {
                sumVal =  parseInt(sumVal) + parseFloat(table.rows[i].cells[3].innerHTML);
            }
      
      document.getElementById("subtotal").innerHTML =  sumVal;
  }

  function total (){

     var table = document.getElementById("tabel"), sumVal = parseInt(0);
            
            for(var i = 1; i < table.rows.length; i++)
            {
                sumVal =  parseInt(sumVal) + parseFloat(table.rows[i].cells[3].innerHTML);
            }
      
      document.getElementById("subtotal").innerHTML =  sumVal;
  }
 function diskon()
  {
    
    var subtotal = $("#subtotal").text();
    var diskon = $("#diskon").val();

    var jumlah = parseInt(subtotal) - parseInt(diskon);
    $("#total").text(jumlah);
    bayar()

  }

  function bayar()
  {
    
    var total = $("#total").text();
    var bayar = $("#bayar").val();

    var jumlah = parseInt(bayar) - parseInt(total);
    $("#kembalian").text(jumlah);
  }
</script>
</body>
</html>
