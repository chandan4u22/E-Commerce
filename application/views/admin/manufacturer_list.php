<?php $this->load->view('admin/common/header'); ?>
<!-- navbar -->
<?php $this->load->view('admin/common/navbar'); ?>
<!-- end navbar -->

<?php $this->load->view('admin/common/sidebar'); ?>

<!-- wrapper  -->

<div class="content-wrapper">
  <div class="card">
    <div class="card-header">
      <h1><i class="fa fa-list"></i> Manufacturer List
        <a data-toggle="tooltip" title="Add Product" class="btn btn-primary
        float-right" href="<?php echo base_url('admin/manufacturer/add'); ?>"><i
        class="fa fa-plus-circle"></i></a>
      </h1>
  </div>
    <div class="card-body">
      <form method="post">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th><input type="checkbox" onchange="$('input[name=\'selected\']').attr('checked', this.checked);"/></th>
              <th>Manufacturer Name</th>
              <th>Images</th>
              <th class="text-right">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($manufacturers as $manufacturer) { ?>
              <tr>
                <td>
                  <input type="checkbox" name="selected" value="<?php echo
                  $manufacturer->manufacturer_id; ?>">
                </td>
                <td><?php echo $manufacturer->name; ?></td>
                <td>
                  <?php if ($manufacturer->image && is_file(ASSET_PATH . $manufacturer->image)) { ?>
                    <img class="img-thumbnail" id="image-file" width="150" src="<?php echo base_url('assets/' . $manufacturer->image); ?>" alt="Image">
                  <?php } else { ?>
                    <img class="img-thumbnail" id="image-file" width="150" src="<?php echo base_url('assets/images/placeholder.jpg'); ?>" alt="placeholder">
                  <?php } ?>
                </td>
              <td class="text-right">
                <a href="<?php echo base_url('admin/manufacturer/edit/' .
                $manufacturer->manufacturer_id); ?>" data-toggle="tooltip" title="Edit"
                class="btn btn-primary"><i class="fa fa-edit"></i></a>
                <a href="<?php echo base_url('admin/manufacturer/delete/' .
                $manufacturer->manufacturer_id); ?>" data-toggle="tooltip" title="Delete"
                class="btn btn-danger"><i class="fa fa-trash"></i></a>
              </td>
              </tr>
            <?php } ?>
          </tbody>
          <?php if (!$manufacturers): ?>
            <tfoot>
              <tr>
                <td colspan="4" class="text-center">No data found!</td>
              </tr>
            </tfoot>
          <?php endif; ?>
        </table>
      </form>
    </div>
  </div>

  <?php $this->load->view('admin/common/footer'); ?>
</div>
<!-- end wrapper  -->

<!-- Optional JavaScript -->
<?php $this->load->view('admin/common/script'); ?>
