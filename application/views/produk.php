<?php 
$this->load->view('head');
?>

  <div class="container">
    <h3 class="text-center">Semua Produk</h3>
   
    <div class="row">
    <?php foreach ($queri as $key) { ?>
      <div class="col-sm-4">
      <a href="<?php echo base_url('halamanutama/detail_produk/').$key->idkat;?>">
        <div class="thumbnail" style="background: #95690d">
        <p><strong style="color: #fff"> <?php echo $key->kategor ?> </strong></p>
          <small class="label pull-left bg-gray"><?php echo $key->total;?> item</small><br>
          <hr>
          <?php if ($key->total=='0') { 

            echo "<img src='".base_url()."/assets/vendor/no-produk.jpg' alt='produk' style='opacity:0.5; width: 300px;height: 250px' class='img-thumbnail'>";
            
          }else{ ?> 
          <img class='img-thumbnail' src="<?php echo base_url('assets/produk/').$key->gambar;?>" style="width: 300px;height: 250px">
          <?php } ?>
        </div>
        </a>
      </div>
      <?php } ?>
    </div>
  
</div>
<!-- Live Chat Widget powered by https://keyreply.com/chat/ -->
<!-- Advanced options: -->
<!-- data-align="left" -->
<!-- data-overlay="true" -->
<script data-align="right" data-overlay="false" id="keyreply-script" src="//keyreply.com/chat/widget.js" data-color="#009688" data-apps="JTdCJTIyd2hhdHNhcHAlMjI6JTIyMDg1NzA2MzAzNDUyJTIyJTdE"></script>

<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p>Create By <a href="../index.html" data-toggle="tooltip" title="Visit creator">masihotw</a></p> 
</footer>


</body>
</html>