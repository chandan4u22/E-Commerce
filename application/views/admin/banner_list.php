<?php $this->load->view('admin/common/header'); ?>
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
      <h1><i class="fa fa-list"></i>Banner List
        <a data-toggle="tooltip" title="Add Banner" class="btn btn-primary float-right" href="<?php echo base_url('admin/banner/add'); ?>"><i class="fa fa-plus-circle"></i></a>
      </h1>
    </div>
      <div class="card-body">
        <form method="post">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th><input type="checkbox" onchange="$('input[name=\'selected\']').attr('checked', this.checked);"/></th>
                <th>Banner Name</th>
                <th>Images</th>
                <th>Sort Order</th>
                <th class="text-right">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($banners as $banner) { ?>
                <tr>
                  <td>
                    <input type="checkbox" name="selected" value="<?php echo $banner->banner_id; ?>">
                  </td>
                  <td><?php echo $banner->name; ?></td>
                  <td>
                    <?php if ($banner->image && is_file(ASSET_PATH . $banner->image)) { ?>
                      <img class="img-thumbnail" id="image-file" width="150" src="<?php echo base_url('assets/' . $banner->image); ?>" alt="Image">
                    <?php } else { ?>
                      <img class="img-thumbnail" id="image-file" width="150" src="<?php echo base_url('assets/images/placeholder.jpg'); ?>" alt="placeholder">
                    <?php } ?>
                  </td>
                  <td><?php echo $banner->sort_order; ?></td>
                  <td class="text-right">
                    <a href="<?php echo base_url('admin/banner/edit/' . $banner->banner_id); ?>" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </form>
      </div>
  </div>

    <?php $this->load->view('admin/common/footer'); ?>
</div>
<!-- ============================================================== -->
<!-- end wrapper  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<?php $this->load->view('admin/common/script'); ?>
