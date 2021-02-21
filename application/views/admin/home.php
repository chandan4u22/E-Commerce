<?php $this->load->view('admin/common/header', ['title' => 'Dashboard']); ?>
<!-- ============================================================== -->
<!-- navbar -->
<?php $this->load->view('admin/common/navbar'); ?>
<!-- end navbar -->
<!-- ============================================================== -->
<?php $this->load->view('admin/common/sidebar'); ?>
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="content-wrapper">
  <div class="card">
    <div class="card-header">
      <h1><i class="fa fa-home"></i> Dashboard
      </h1>
    </div>
      <div class="card-body">
        <!-- Write Dashboard Content -->
      </div>
  </div>

    <?php $this->load->view('admin/common/footer'); ?>
</div>
<!-- ============================================================== -->
<!-- end wrapper  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<?php $this->load->view('admin/common/script'); ?>
