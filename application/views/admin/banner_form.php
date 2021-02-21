<?php $this->load->view('admin/common/header'); ?>
<!-- navbar -->
<?php $this->load->view('admin/common/navbar'); ?>
<!-- end navbar -->
<?php $this->load->view('admin/common/sidebar'); ?>
    <!-- wrapper  -->
 <div class="content-wrapper">
  <div class="card">
   <div class="card-header">
    <h1>Banner
     <a href="<?php echo base_url('admin/banner'); ?>"
        class="btn btn-danger
        float-right" data-toggle="tooltip" title="Cancel">
        <i class="fa fa-reply"></i></a>
        <button type="submit" form="form-banner" class="btn btn-primary
        float-right" data-toggle="tooltip" title="Save">
        <i class="fa fa-save"></i></button>
      </h1>
    </div>

    <div class="card-body">
     <form class="form-horizontal" action="<?php echo $action; ?>"
      id="form-banner" method="post">
         <div class="tab-content">
          <div class="tab-pane active" id="tab-home">
           <div class="form-group">
            <label for="name" class="col-sm-3">Banner Name *</label>
             <div class="col-sm-9">
              <input type="text" name="name" class="form-control"
              placeholder="Banner Name" id="name" value="<?php echo $name; ?>">
              <?php if ($error_name): ?>
                <div class="text-danger">
                  <?php echo $error_name; ?>
                </div>
              <?php endif; ?>
           </div>
         </div>
              <div class="form-group">
                 <label for="date" class="col-sm-3">Sort Order</label>
                  <div class="col-sm-9">
                   <input type="text" name="sort_order" class="form-control"
                    placeholder="Sort Order" id="sort_order" value="<?php echo $sort_order; ?>">
                    </div>
                   </div>

                   <div class="form-group">
                    <label for="name" class="col-sm-3">Image</label>
                     <div class="col-sm-9">
                      <input type="file" class="d-none" id="image">
                      <input type="hidden" name="image" value="<?php echo $image; ?>">
                      <a id="button-upload">
                      <?php if ($image && is_file(ASSET_PATH . $image)) { ?>
                        <img class="img-thumbnail" id="image-file" width="150" src="<?php echo base_url('assets/' . $image); ?>" alt="Image">
                      <?php } else { ?>
                        <img class="img-thumbnail" id="image-file" width="150" src="<?php echo base_url('assets/images/placeholder.jpg'); ?>" alt="placeholder">
                      <?php } ?>
                      </a>
                    </div>
                   </div>
              </form>
            </div>
            </div>
          <?php $this->load->view('admin/common/footer'); ?>
         </div>
         <!-- end wrapper  -->
         <!-- Optional JavaScript -->
         <script type="text/javascript">
          (() => {
            $('[data-toggle="tooltip"]').tooltip();
            $('#button-upload').on('click', () => {
              // $('#image').trigger('click');
              $('#image').click();
            });

            $('#image').on('change', (event) => {

              if (event.target.files[0] != undefined) {
                var formData = new FormData();

                formData.append('dir_name', 'banner');
                formData.append("image", event.target.files[0]);

                $.ajax({
                  url: '<?php echo base_url("admin/upload"); ?>',
                  type: 'post',
                  dataType: 'json',
                  processData: false,
                  contentType: false,
                  data: formData,
                  success: (response) => {
                    if (response['url']) {

                      $('#image-file').prop('src', response['url']);

                      $('input[name="image"]').val(response.path);

                    } else if (response['error']) {
                      alert(response['error']);
                    } else {
                      alert('Something went wrong!');
                    }
                  }
                });
              }
            });
          })();

        </script>
         <?php $this->load->view('admin/common/script'); ?>
