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
      <h1><i class="fa fa-list"></i> Category List
        <a data-toggle="tooltip" title="Add Category" class="btn btn-primary float-right" href="<?php echo base_url('admin/category/add'); ?>"><i class="fa fa-plus-circle"></i></a>
      </h1>
    </div>
      <div class="card-body">
        <form method="post">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th><input type="checkbox" onchange="$('input[name=\'selected\']').attr('checked', this.checked);"/></th>
                <th>Name</th>
                <th>Parent</th>
                <th class="text-right">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($categories as $category) { ?>
                <tr>
                  <td>
                    <input type="checkbox" name="selected" value="<?php echo $category->category_id; ?>">
                  </td>
                  <td><?php echo $category->name; ?></td>
                  <td><?php echo $category->parent ? $category->parent : 'NA'; ?></td>
                  <td class="text-right">
                    <a href="<?php echo base_url('admin/category/edit/' . $category->category_id); ?>" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
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
