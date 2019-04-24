<?php 
$this->load->view('head');
?>

  <div class="container">
    <h3 class="text-center">Produk Berdasarkan Kategori :</h3>
   
    <div class="row">
    <?php foreach ($queri as $key) { ?>
      <div class="col-sm-4">
        <div class="thumbnail text-center">
          <img src="<?php echo base_url('assets/produk/').$key->gambar;?>" style="width: 300px;height: 200px" class='img-thumbnail'><hr>
           <font face="verdana" color="black"><h2> <?php echo $key->namaproduk ?> </h2></font>
           <p><font face="verdana" color="Red"><strong> Rp. <?php echo number_format($key->harga) ?> </strong></font></p>
          
        </div>
        </a>
      </div>
      <?php } ?>
    </div>
  
</div>

<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p>Create By <a href="../index.html" data-toggle="tooltip" title="Visit creator">masihotw</a></p> 
</footer>


</body>
</html>