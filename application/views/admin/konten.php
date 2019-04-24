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
        <li class="active">pengaturan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
         <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Konten Mengapa Harus Kami ?</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  
                </div>
              </div>
            </div>
           
<div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th width="10%">No</th>

                  <th width="70%">Mengapa harus kami</th>
                  <th width="20%">Aksi</th>
                </tr>
                <?php 
$no=0;
                foreach ($queri as $key ){ 
   
                  ?>

                <tr>

                   <td> <?php $no++; echo $no; ?> </td>
                  <td><?php echo $key->konten; ?></td>
                  
                  <td>    
                  <button onclick="edit_konten('<?php echo $key->id; ?>');" class="btn btn-warning" title="Edit Data"><i class="glyphicon glyphicon-pencil"></i></button>
                <!--button class="btn btn-danger" title="Hapus Data"><i class="glyphicon glyphicon-remove"></i></button>
                --></td>
                </tr>
<?php }?>
                
              </table>
            </div>




          </div>
          <!-- /.box -->
        </div>

  

         <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Profil Perusahaan</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  
                </div>
              </div>
            </div>
           
<div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th width="10%">No</th>
                  <th width="70%">Profil Perusahaan</th>
                 <th width="20%">Aksi</th>
                </tr>
                <?php 
$no=0;
                foreach ($queri1 as $key ){ 
   
                  ?>

                <tr>

                   <td> <?php $no++; echo $no; ?> </td>
                  <td><?php echo $key->profilperusahaan; ?></td>
                  
                  <td>   
                  <button onclick="edit_profil('<?php echo $key->id; ?>');" class="btn btn-warning" title="Edit Data"><i class="glyphicon glyphicon-pencil"></i></button>
                <!--button class="btn btn-danger" title="Hapus Data"><i class="glyphicon glyphicon-remove"></i></button>
                --></td>
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
      <h3 class="modal-title">Input Profil</h3>
    </div>
    <div class="modal-body form">
      <form action="#" id="form" class="form-horizontal">
       
        <div class="form-body">
          <div class="form-group">
            <label class="control-label col-md-3">Profil Perusahaan</label>
            <div class="col-md-9">
      <textarea name="profil" class="form-control" ></textarea>
            </div>
          </div>         
        </div>
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->




<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form1" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h3 class="modal-title">Input Konten</h3>
    </div>
    <div class="modal-body form">
      <form action="#" id="form1" class="form-horizontal">
       
        <div class="form-body">
          <div class="form-group">
            <label class="control-label col-md-3">Mengapa ?</label>
            <div class="col-md-9">
         <textarea name="kontena" id="kontena" class="form-control"></textarea>
            </div>
          </div>         
        </div>
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
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


   function edit_profil(id)
  {
   
   save_metod= "profil";
    $('#form')[0].reset(); // reset form on modals
           

       //Ajax Load data from ajax
     $.ajax({
       url : "<?php echo base_url('halamanutama/ajax_edit/')?>" + id,
       type: "GET",
       dataType: "JSON",
       success: function(data)
       {

       
          $('[name="profil"]').val(data.profilperusahaan);
          
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
   
     //var data = FormData(form);
   
if (save_metod=="konten1") {
      var form = $('#form1')[0];
      url = "<?php echo base_url('halamanutama/edit_konten2')?>";
 }else{
  var form = $('#form')[0];
        url = "<?php echo base_url('halamanutama/edit_konten')?>";

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


  function edit_konten(id)
  {
   
   save_metod="konten1";
    $('#form1')[0].reset(); // reset form on modals
           

       //Ajax Load data from ajax
     $.ajax({
       url : "<?php echo base_url('halamanutama/ajax_edit2/')?>" + id,
       type: "GET",
       dataType: "JSON",
       success: function(data)
       {

       
          $('[name="kontena"]').val(data.konten);
          
           $('#modal_form1').modal('show'); // show bootstrap modal when complete loaded
           $('.modal-title').text('Edit'); // Set title to Bootstrap modal title

       },
       error: function (jqXHR, textStatus, errorThrown)
       {
          alert('Tidak Berhasil Menyimpan / Ada Yang Belum Terisi !!');
       }
   });
}


</script>


</body>
</html>
