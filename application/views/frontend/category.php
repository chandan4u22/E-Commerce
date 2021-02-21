
<!--  Start Carousel-->
<div id="demo" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-interval="1000">
      <img src="<?php echo base_url('assets/images/slide/slider-2.png'); ?>" class="d-block w-100" alt="Image">
    </div>
    <div class="carousel-item" data-interval="2000">
      <img src="<?php echo base_url('assets/images/slide/slider-1.png'); ?>" class="d-block w-100" alt="Image">
    </div>
    <div class="carousel-item" data-interval="3000">
      <img src="<?php echo base_url('assets/images/slide/slider-3.png'); ?>" class="d-block w-100" alt="Image">
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="fa fa-chevron-left fa-2x"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="fa fa-chevron-right fa-2x"></span>
  </a>
</div>
<!-- End Carousel -->

</body>
</html>
<div class="row mb-5">
  <?php $this->load->view('frontend/common/script'); ?>
    <?php $this->load->view('frontend/common/footer'); ?>
<!-- Optional JavaScript -->
<!-- End Optional JavaScript -->
