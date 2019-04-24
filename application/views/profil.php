<?php 
$this->load->view('head');
?>
<div class="container text-center">
  <h3>TENTANG KAMI</h3>
  <p> <?php foreach ($queri as $key) {
    echo $key->profilperusahaan;
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