<?php 
$this->load->view('head');
?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="<?php echo base_url('assets/carausel/2.jpg');?>" alt="New York" width="1200" height="700">
        <div class="carousel-caption">
          <h3>JUDUL</h3>
          <p>isi</p>
        </div>      
      </div>

      <div class="item">
        <img src="<?php echo base_url('assets/carausel/2.jpg');?>" alt="Chicago" width="1200" height="500">
        <div class="carousel-caption">
           <h3>JUDUL</h3>
          <p>isi</p>
          </div>      
      </div>
    
      <div class="item">
        <img src="<?php echo base_url('assets/carausel/2.jpg');?>" alt="Los Angeles" width="1200" height="700">
        <div class="carousel-caption">
           <h3>JUDUL</h3>
          <p>isi</p>
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
<div class="container text-center">
  <h3>Mengapa Harus Kami ?</h3>
  <p><?php foreach ($queri as $key) {
    echo $key->konten;
  } ?></p>
  <br>
 
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