  <?php $this->load->view('admin/common/header'); ?>
<!-- navbar -->
<?php $this->load->view('admin/common/navbar'); ?>
<!-- end navbar -->

<?php $this->load->view('admin/common/sidebar'); ?>

<!-- wrapper  -->

<div class="content-wrapper">
  <div class="card">
    <div class="card-header">
      <h1><i class="fa fa-list"></i> Product List
        <a data-toggle="tooltip" title="Add Product" class="btn btn-primary
        float-right" href="<?php echo base_url('admin/product/add'); ?>"><i
        class="fa fa-plus-circle"></i></a>
      </h1>
  </div>
    <div class="card-body">
      <form method="post">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th><input type="checkbox" onchange="$('input[name=\'selected\']').attr('checked', this.checked);"/></th>
              <th>Image</th>
              <th>Product Name</th>
              <th>Model</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Status</th>
              <th class="text-right">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($products as $product){ ?>
              <tr>
                <td>
                  <input type="checkbox" name="selected" value="<?php echo
                  $product->product_id; ?>">
                </td>
                <td>
                  <?php if ($product->image && is_file(ASSET_PATH . $product->image)) { ?>
                    <img src="<?php echo base_url('assets/' .$product->image); ?>" height="60"/>
                  <?php } ?>
                </td>
                <td><?php echo $product->name; ?></td>
                <td><?php echo $product->model; ?></td>
                <td><?php echo $product->price; ?></td>
                <td><?php echo $product->quantity; ?></td>
                <td><?php echo $product->status ? 'Enabled' : 'Disabled'; ?></td>
                <td class="text-right">
                  <a href="<?php echo base_url('admin/product/edit/' . $product->product_id); ?>" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
          <?php if (!$products): ?>
            <tfoot>
              <tr>
                <td colspan="8" class="text-center">No data found!</td>
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
