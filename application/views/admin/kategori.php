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
       
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Beranda</a></li>
        <li class="active">kategori</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
         <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Kategori Produk</h3>
           
            </div>
        <br>
  &nbsp;&nbsp;&nbsp;<button class="btn btn-success" onclick="add_kategori()"><i class="glyphicon glyphicon-plus"></i> Tambah Kategori</button><div><br></div>
<div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th width="10%">No</th>

                  <th width="50%">Kategori</th>
                   <th width="10%">Aksi</th>
                 
                </tr>
                <?php 
$no=0;
                foreach ($queri as $key ){ 
   
                  ?>

                <tr>

                   <td> <?php $no++; echo $no; ?> </td>
                  <td><?php echo $key->kategori; ?></td>
                  
                  <td>    
                 
                  <button class="btn btn-danger" onclick="deletea('<?php echo $key->id;?>')"><i class="glyphicon glyphicon-trash"></i></button>

             </td>
                </tr>
<?php }?>
                
              </table>
            </div>


<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h3 class="modal-title">Masukkan Kategori</h3>
    </div>
    <div class="modal-body form">
      <form action="" id="form" class="form-horizontal">

        
        <div class="form-body">
          <div class="form-group">
            <label class="control-label col-md-3">Kategori</label>
            <div class="col-md-9">
              <input name="nama" placeholder="Jenis Kategori" class="form-control" type="text">
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



          </div>
          <!-- /.box -->
        </div>

  

     
      </div>
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1
    </div>
    <strong>Copyright &copy; 2019 </strong> Admin
  
  </footer>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php
$this->load->view('_template/js');
?>

<script type="text/javascript">
  
   function add_kategori()
  {
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('#modal_form').modal('show'); // show bootstrap modal
  //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
  }


function save()
  {
    var url;
    
        url = "<?php echo base_url('halamanutama/add_kategori')?>";
    

     // ajax adding data to database
        $.ajax({
          url : url,
          type: "POST",
          data: $('#form').serialize(),
          dataType: "JSON",
          success: function(data)
          {
             //if success close modal and reload ajax table
             $('#modal_form').modal('hide');
            location.reload();// for reload a page
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
                alert('Tidak Berhasil Menyimpan / Ada Yang Belum Terisi !!');
          }
      });
  }

function deletea(id)
  {
   if(confirm('Apakah anda ingin menghapus data tersebut..?'))
    {
      // ajax delete data from database
        $.ajax({
          url : "<?php echo base_url('halamanutama/del_kategori')?>/"+id,
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

</script>

</script>
</body>
</html>
