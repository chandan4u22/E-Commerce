<?php $this->load->view('admin/common/header'); ?>
<!-- navbar -->
<?php $this->load->view('admin/common/navbar'); ?>
<!-- end navbar -->

<?php $this->load->view('admin/common/sidebar'); ?>

<!-- wrapper  -->

<div class="content-wrapper">
  <div class="card">
    <div class="card-header">
      <h1> Attribute
        <a href="<?php echo base_url('admin/attribute'); ?>" class="btn btn-danger
        float-right" data-toggle="tooltip" title="Cancel"><i class="fa fa-reply"></i></a>
        <button type="submit" form="form-attribute" class="btn btn-primary
        float-right" data-toggle="tooltip" title="Save"><i class="fa fa-save"></i></button>
      </h1>
    </div>

       <form class="form-horizontal" action="<?php echo $action; ?>"
         id="form-attribute" method="post">
         <div class="form-group">
           <label for="name" class="col-sm-3">Attribute Name *</label>
           <div class="col-sm-9">
             <input type="text" name="name" class="form-control" placeholder="Enter Attribute Name" id="name" value="<?php echo $name; ?>">
             <?php if ($error_name): ?>
               <div class="text-danger">
                 <?php echo $error_name; ?>
               </div>
             <?php endif; ?>
           </div>
         </div>

       <div class="form-group">
        <label for="sort_order" class="col-sm-3">Sort-Order</label>
         <div class="col-sm-9">
          <input type="text" name="sort_order" class="form-control" placeholder="Sort Order" id="sort_order" value="<?php echo $sort_order; ?>">
     </div>
   </div>
  </form>
 </div>
</div>

 <?php $this->load->view('admin/common/footer'); ?>
</div>
<!-- end wrapper  -->
<!-- Optional JavaScript -->
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/summernote/css/summernote-bs4.css'); ?>">
<script src="<?php echo base_url('assets/vendor/summernote/js/summernote-bs4.js'); ?>"></script>

<script type="text/javascript">

 </script>
 <?php $this->load->view('admin/common/script'); ?>
