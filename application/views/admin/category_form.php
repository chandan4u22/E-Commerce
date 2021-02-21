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
      <h1>Category
          <a href="<?php echo base_url('admin/category'); ?>" class="btn btn-danger float-right" data-toggle="tooltip" title="Cancel"><i class="fa fa-reply"></i></a>
          <button type="submit" form="form-category" class="btn btn-primary float-right" data-toggle="tooltip" title="Save"><i class="fa fa-save"></i></button>
       </h1>
     </div>
      <div class="card-body">
        <form class="form-horizontal" action="<?php echo $action; ?>" method="post"  id="form-category">
          <div class="form-group">
            <label for="name" class="col-sm-3"><span data-toggle="tooltip" title="Name of the category is required">Name *</span></label>
            <div class="col-sm-9">
              <input type="text" name="name" class="form-control" placeholder="Enter Category Name" id="name" value="<?php echo $name; ?>">
              <?php if ($error_name): ?>
                <div class="text-danger">
                  <?php echo $error_name; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>

          <div class="form-group">
            <label for="parent" class="col-sm-3">Parent</label>
            <div class="col-sm-9">
              <select class="form-control" name="parent_id">
                <option value="0">--Select--</option>
                <?php foreach ($categories as $category) { ?>
                  <?php if ($category_id != $category->category_id): ?>
                    <option <?php if ($parent_id == $category->category_id) { echo 'selected'; } ?> value="<?php echo $category->category_id; ?>"><?php echo $category->name; ?></option>
                  <?php endif; ?>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="description" class="col-sm-3">Description</label>
            <div class="col-sm-9">
              <textarea class="form-control" name="description" placeholder="Write Description" id="description"><?php echo $description; ?></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="meta-title" class="col-sm-3">Meta Title*</label>
            <div class="col-sm-9">
              <input class="form-control" name="meta_title" placeholder="Write Meta Title" id="meta-title" value="<?php echo $meta_title; ?>"/>
              <?php if ($error_meta_title): ?>
                <div class="text-danger">
                  <?php echo $error_meta_title; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>

          <div class="form-group">
            <label for="meta-description" class="col-sm-3">Meta Description</label>
            <div class="col-sm-9">
              <textarea class="form-control" name="meta_description" placeholder="Write Meta Description" id="meta-description"><?php echo $meta_description; ?></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="meta-keyword" class="col-sm-3">Meta Keywords</label>
            <div class="col-sm-9">
              <textarea class="form-control" name="meta_keyword" placeholder="Write Meta Keywords" id="meta-keyword"><?php echo $meta_keyword; ?></textarea>
            </div>
          </div>
       </form>
     </div>
   </div>
 <?php $this->load->view('admin/common/footer'); ?>
</div>
<!-- ============================================================== -->
<!-- end wrapper  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->

<link rel="stylesheet" href="<?php echo base_url('assets/vendor/summernote/css/summernote-bs4.css'); ?>">
<script src="<?php echo base_url('assets/vendor/summernote/js/summernote-bs4.js'); ?>"></script>

<script type="text/javascript">
(() => {
  $('#description').summernote({
    placeholder: $('#description').prop('placeholder'),
       tabsize: 2,
       height: 300,
       toolbar: [
         ['style', ['style']],
         ['font', ['bold', 'underline', 'clear']],
         ['color', ['color']],
         ['para', ['ul', 'ol', 'paragraph']],
         ['table', ['table']],
         ['insert', ['link', 'picture', 'video']],
         ['view', ['fullscreen', 'codeview', 'help']]
       ]
  });

  $('a[data-toggle="tab"]').tab();
 })();
</script>

<?php $this->load->view('admin/common/script'); ?>
