<?php 
$this->load->view('_template/head');
$this->load->view('_template/topbar');
$this->load->view('_template/sidebar');

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Produk
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Beranda</a></li>
        <li><a href="#">Produk</a></li>
       
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Produk Anda</h3>
            </div>
              &nbsp;&nbsp;&nbsp;<button class="btn btn-success" onclick="add_produk()"><i class="glyphicon glyphicon-plus"></i> Tambah Produk</button><div><br></div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10%">No</th>
                  <th width="40%">Nama Produk</th>
                  <th width="10%">Kategori</th>
                  <th width="10%">Harga</th>
                  <th width="20%">Gambar</th>
                   <th  width="10%">Aksi</th>
                 
                </tr>
                </thead>
                <tbody>
                <?php 
$no=0;
                foreach ($queri as $key ){ 
   
                  ?>

                <tr>

                   <td> <?php $no++; echo $no; ?> </td>
                  <td><?php echo $key->namaproduk; ?></td>
                  <td><?php echo $key->kategori; ?></td>
                  <td><?php echo number_format($key->harga); ?></td>
                  <td><img src="<?php echo base_url('assets/produk/').$key->gambar;?>" width="100" height="70"></td>
      
                  <td>    
                  <button class="btn btn-warning" onclick="edit_produk('<?php echo $key->id;?>')"><i class="glyphicon glyphicon-edit"></i></button>               
                  <button class="btn btn-danger" onclick="deletea('<?php echo $key->id;?>')"><i class="glyphicon glyphicon-trash"></i></button>

             </td>
                </tr>

<?php }?></tbody>
                
              </table>
            </div>



              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

<?php
        foreach ($a as $idq) {
  # code...

  // $id_kode= $pemain->id_pemain ;
  
    $urut=  substr($idq->kode, 3,3);
 
    $urut++ ;
//echo $urut;
 

    $id_baru="P".date('d').sprintf("%03s", $urut);
       }
       ?>



<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h3 class="modal-title">Input Produk :  </h3>
    </div>
    <div class="modal-body form">
      <form action="" id="form" method="post" class="form-horizontal" >
        <input type="hidden" name="id" value="<?php echo $id_baru ;?>">
        
        <div class="form-body">
         <div class="form-group">
            <label class="control-label col-md-3">Nama Produk : </label>
            <div class="col-md-9">
              <input name="nama" placeholder="Nama Produk" class="form-control" type="text" required="">
            </div>
          </div>
        <div class="form-group">
            <label class="control-label col-md-3">Kategori Produk : </label>
            <div class="col-md-9">
            <select name="kategori" class="input-sm">
            <?php foreach ($queri1 as $key) {
              
            ?>
              <option value="<?php echo $key->id ;?>"><?php echo $key->kategori ;?></option>
<?php } ?>
            </select><a href="<?php echo base_url('halamanutama/kategori'); ?>"> Tambah Kategori</a>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Harga : </label>
            <div class="col-md-9">
            <div class="input-group">
            <span class="input-group-addon">Rp.</span>
              <input name="harga" placeholder="Harga" class="form-control" type="text">
            </div></div>
          </div> 
         <div class="form-group">
            <label class="control-label col-md-3">Gambar : </label>
            <div class="col-md-9">
            <input type="hidden" name="gambar">
              <input type="file" class="form-control" name="userfile" id="userfile" accept="image/*">
            </div>
          </div> 
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" onclick="save()" class="btn btn-success">Simpan</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->



<?php
$this->load->view('_template/js');
?>
<script>

  
   function add_produk()
  {
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('#modal_form').modal('show'); // show bootstrap modal
  //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
  }

 function edit_produk(id)
  {
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals

    //Ajax Load data from ajax
    $.ajax({
      url : "<?php echo base_url('halamanutama/ajax_edit3')?>/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {

          $('[name="id"]').val(data.id);
          $('[name="nama"]').val(data.namaproduk);
          $('[name="kategori"]').val(data.kategori);
          $('[name="harga"]').val(data.harga);
          $('[name="gambar"]').val(data.gambar);


          $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
          $('.modal-title').text('Edit'); // Set title to Bootstrap modal title

      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          alert('Tidak Berhasil Menyimpan / Ada Yang Belum Terisi !!');
      }
  });
  }



function save()
  {
    var url;
   var form = $('#form')[0];
     //var data = FormData(form);
    if(save_method == 'add')
    {
        url = "<?php echo base_url('halamanutama/do_upload')?>";
    }
    else
    {
      url = "<?php echo base_url('halamanutama/update_produk')?>";
    }


 
            $.ajax({
                url: url, // Url to which the request is send
                type: "POST", // Type of request to be send, called as method
                data: new FormData(form), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                 contentType: false, // The content type used when sending data to the server.
                 cache: false, // To unable request pages to be cached
                 processData: false, // To send DOMDocument or non processed data file it is set to false
                 // dataType: "JSON",
                success: function(data) // A function to be called if request succeeds
                    {
                       $('#modal_form').modal('hide');
            location.reload();// for reload a page
                    }
            });
        
  }

function deletea(id)
  {
   if(confirm('Apakah anda ingin menghapus data tersebut..?'))
    {
      // ajax delete data from database
        $.ajax({
          url : "<?php echo base_url('halamanutama/del_produk')?>/"+id,
          type: "POST",
          dataType: "JSON",
          success: function(data)
          {
            

             location.reload();
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
                alert('Data tidak berhasil di hapus ..!! ');
          }
      });
}
    
  }













  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

</body>
</html>
