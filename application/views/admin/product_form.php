<!-- navbar -->
<?php $this->load->view('admin/common/navbar'); ?>
<!-- end navbar -->
<?php $this->load->view('admin/common/sidebar'); ?>
<!-- wrapper  -->
<div class="content-wrapper">
  <div class="card">
    <div class="card-header">
      <h1>Add Product
        <a href="<?php echo base_url('admin/product'); ?>" class="btn btn-danger
        float-right" data-toggle="tooltip" title="Cancel"><i class="fa fa-reply"></i></a>
        <button type="submit" form="form-product" class="btn btn-primary
        float-right" data-toggle="tooltip" title="Save"><i class="fa fa-save"></i></button>
      </h1>
    </div>
     <div class="card-body">
       <form class="form-horizontal" action="<?php echo $action; ?>"
         id="form-product" method="post">

         <ul class="nav nav-tabs">
           <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#tab-general">General</a></li>
           <li class="nav-item"><a class="nav-link" data-toggle="tab"
              href="#tab-link">Link</a></li>
           <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-attribute">Attribute</a></li>
           <!-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-option">Option</a></li> -->
           <li class="nav-item"><a class="nav-link" data-toggle="tab"
              href="#tab-image">Image</a></li>
         </ul>

         <div class="tab-content">
           <div class="tab-pane active" id="tab-general">
             <div class="form-group">
               <label for="name" class="col-sm-3">Name *</label>
               <div class="col-sm-9">
                 <input type="text" name="name" class="form-control"
                  placeholder="Product" id="name" value="<?php echo $name; ?>">
                 <?php if ($error_name): ?>
                   <div class="text-danger">
                     <?php echo $error_name; ?>
                   </div>
                 <?php endif; ?>
               </div>
             </div>

             <div class="form-group">
               <label for="model" class="col-sm-3">Model *</label>
               <div class="col-sm-9">
                    <input type="text" name="model" class="form-control" placeholder="Model" id="model" value="<?php echo $model; ?>">
                    <?php if ($error_model): ?>
                      <div class="text-danger">
                        <?php echo $error_model; ?>
                      </div>
                    <?php endif; ?>
               </div>
             </div>

             <div class="form-group">
               <label for="description" class="col-sm-3">Description</label>
               <div class="col-sm-9">
               <textarea class="form-control" name="description" placeholder="Write Description" id="description"><?php echo $description; ?></textarea>
               </div>
             </div>

             <div class="form-group">
               <label for="price" class="col-sm-3">Price</label>
               <div class="col-sm-9">
                    <input type="text" name="price" class="form-control" placeholder="Price" id="price" value="<?php echo $price; ?>">
               </div>
             </div>

             <div class="form-group">
               <label for="quantity" class="col-sm-3">Quantity</label>
               <div class="col-sm-9">
                    <input type="text" name="quantity" class="form-control" placeholder="1" id="quantity" value="<?php echo $quantity; ?>">
               </div>
             </div>

             <div class="form-group">
               <label for="status" class="col-sm-3">Status</label>
               <div class="col-sm-9">
                   <select class="form-control" name="status">
                     <?php if ($status == 1): ?>
                       <option value="1">Enabled</option>
                       <option value="0">Disabled</option>
                     <?php else: ?>
                       <option value="0">Disabled</option>
                       <option value="1">Enabled</option>
                     <?php endif; ?>
                   </select>
               </div>
             </div>

             <div class="form-group">
               <label for="meta-title" class="col-sm-3">Meta Title *</label>
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
                 <textarea class="form-control" name="meta_keywords" placeholder="Write Meta Keywords" id="meta-keyword"><?php echo $meta_keywords; ?></textarea>
               </div>
             </div>
           </div>
           <!-- Tabe General Ends -->
           <!-- Tabe Link Starts -->
           <div class="tab-pane" id="tab-link">
             <div class="form-group">
               <label for="manufacturer" class="col-sm-3">Manufacturer</label>
               <div class="col-sm-9">
                    <input type="hidden" name="manufacturer_id" value="<?php echo $manufacturer_id; ?>">
                    <input type="text" class="form-control" placeholder="Manufacturer" id="manufacturer" value="<?php echo $manufacturer; ?>">
               </div>
             </div>

             <div class="form-group">
               <label for="category" class="col-sm-3">Category</label>
               <div class="col-sm-9">
                    <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
                    <input type="text" class="form-control" placeholder="Category" id="category" value="<?php echo $category; ?>">
               </div>
             </div>

           </div>
           <!-- Tabe Link Ends -->
           <!-- Tab Attribute Starts Here -->
           <div class="tab-pane" id="tab-attribute">
             <table class="table table-bordered table-hover">
               <thead>
                 <tr>
                   <th>Attribute</th>
                   <th>Description</th>
                   <th class="text-right">Action</th>
                 </tr>
               </thead>
               <tbody id="attribute-list">
                 <?php $row = 0; ?>
                 <?php if ($product_attribute): ?>
                   <?php foreach ($product_attribute as $key => $attribute): ?>
                     <tr>
                       <td>
                         <input type="hidden"  name="product_attribute[<?php echo $row; ?>][attribute_id]" value="<?php echo $attribute['attribute_id']; ?>">

                         <input type="text" id="attribute<?php echo $row; ?>" class="form-control" value="<?php echo $attribute['name']; ?>" placeholder="Select an attribute">
                       </td>
                       <td>
                         <textarea name="product_attribute[<?php echo $row; ?>][value]" rows="4" cols="80" placeholder="Write attribute description"><?php echo $attribute['value']; ?></textarea>
                       </td>
                       <td class="text-right">
                         <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Remove" onclick="$(this).parent().parent().remove();"><i class="fa fa-trash"></></button>
                       </td>
                     </tr>
                     <?php $row ++; ?>
                   <?php endforeach; ?>
                 <?php endif; ?>
               </tbody>
               <tfoot>
                 <tr>
                   <td colspan="2"></td>
                   <th class="text-right">
                     <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Add Attribuet" onclick="addAttribute()"><i class="fa fa-plus-circle"></i></button>
                   </th>
                 </tr>
               </tfoot>
             </table>
           </div>
           <!-- Tab Attribute Ends Here -->
           <!-- Tab Image Starts Here -->
           <div class="tab-pane" id="tab-image">
             <div class="form-group">
               <label for="input-img" class="control-label col-sm-3">Main Image</label>
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
             <div class="form-group">
               <label class="col-sm-3 control-label">Additional Images</label>
               <div class="col-sm-9">
                 <table class="table table-bordered table-hover">
                   <thead>
                     <tr>
                       <th>Image</th>
                       <th>Sort Order</th>
                       <th>Action</th>
                     </tr>
                   </thead>
                   <tbody id="product-images">
                     <?php $key = 0; ?>
                      <?php if ($product_image) { ?>
                        <?php foreach ($product_image as $image) { ?>
                          <tr>
                            <td>
                              <input type="hidden" name="product_image[<?php echo $key; ?>][image]" value="<?php echo $image['image']; ?>">
                              <input type="file" id="image-<?php echo $key; ?>" class="product-image d-none">

                              <a id="button-upload<?php echo $key; ?>">
                              <?php if ($image && is_file(ASSET_PATH . $image['image'])) { ?>
                                <img class="img-thumbnail" id="image-file" width="150" src="<?php echo base_url('assets/' . $image['image']); ?>" alt="Image">
                              <?php } else { ?>
                                <img class="img-thumbnail" id="image-file" width="150" src="<?php echo base_url('assets/images/placeholder.jpg'); ?>" alt="placeholder">
                              <?php } ?>
                              </a>
                            </td>
                            <td>
                              <input type="text" name="product_image[<?php echo $key; ?>][sort_order]" value="<?php echo $image['sort_order']; ?>" class="form-control" placeholder="Sort Order">
                            </td>
                            <td>
                              <button type="button" data-toggle="tooltip" title="Remove" onclick="$(this).parent().parent().remove">
                                <i class="fa fa-minus-circle"></i>
                              </button>
                            </td>
                          </tr>
                          <?php $key++; ?>
                        <?php } ?>
                      <?php } ?>
                   </tbody>
                   <tfoot>
                     <tr>
                       <td colspan="3" class="text-right">
                         <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Add Image" onclick="addImage()">
                           <i class="fa fa-plus-circle"></i>
                         </button>
                       </td>
                     </tr>
                   </tfoot>
                 </table>
               </div>
             </div>
           </div>
           <!-- Tab Image Ends Here -->
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
let key = <?php echo $key; ?>;
 triggerImageButton = () => {
   $('a[id^="button-upload"]').on('click', (event) => {
     const parent = event.target.parentElement.parentElement;
     const file_input = parent.querySelector('input[type="file"]');
     file_input.click();
   });

   $('input[type="file"]').on('change', (event) => {
      const input = event.target;
     if (input.files[0] != undefined) {
       var formData = new FormData();

       formData.append('dir_name', 'product');
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

             $(input).parent().find('img').prop('src', response['url']);

             $(input).parent().find('input[type="hidden"]').val(response.path);

           } else if (response['error']) {
             alert(response['error']);
           } else {
             alert('Something went wrong!');
           }
         }
       });
     }
   });
 }

  addImage = () => {
    let html = ''
    html += '<tr>'
    html += ' <td>'
    html += '   <input type="hidden" name="product_image[' + key + '][image]">'
    html += '  <input type="file" id="image-' + key + '" class="product-image d-none">'

    html += '   <a id="button-upload' + key + '">'
    html += '     <img class="img-thumbnail" id="image-file" width="150" src="<?php echo base_url('assets/images/placeholder.jpg'); ?>" alt="placeholder">'
    html += '    </a>'
    html += '  </td>'
    html += '<td>'
    html += '  <input type="text" name="product_image[' + key + '][sort_order]" class="form-control" placeholder="Sort Order">'
    html += '</td>'
    html += '<td>'
    html += '  <button class="btn btn-danger" type="button" data-toggle="tooltip" title="Remove" onclick="$(this).parent().parent().remove">'
    html += '    <i class="fa fa-minus-circle"></i>'
    html += '  </button>'
    html += '</td>'
    html += '</tr>'

    key++;
    $('#product-images').append(html);
    triggerImageButton()
  }
</script>
<script type="text/javascript">
(() => {
  $('#attribute-list tr').each((el) => {

  });
  let row = <?php echo $row; ?>;
  addAttribute = () => {

    let html = '';
    html += '<tr>'
    html += '  <td>';
    html += '    <input type="hidden"  name="product_attribute[' + row + '][attribute_id]" value="">';
    html += '    <input type="text" id="attribute' + row + '" class="form-control" placeholder="Select an attribute">';
    html += '  </td>';
    html += '  <td>';
    html += '    <textarea name="product_attribute[' + row + '][value]" rows="4" placeholder="Write attribute description" cols="80"></textarea>';
    html += '  </td>';
    html += '  <td class="text-right">';
    html += '    <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Remove" onclick="$(this).parent().parent().remove();"><i class="fa fa-trash"></i></button>';
    html += '  </td>';
    html += '</tr>';

    $('#attribute-list').append(html);
    attributeAutocomplete(row);

    row ++;
  };

  attributeAutocomplete = (row) => {
    $('#attribute' + row).autocomplete({
      source: (request, response) => {
        $.ajax({
          url: '<?php echo base_url("admin/attribute/autocomplete"); ?>?filter_name=' +  encodeURIComponent(request),
          dataType: 'json',
          success: function(json) {

            response($.map(json, function(item) {
              return {
                label: item['name'],
                value: item['attribute_id']
              }
            }));
          }
        });
      },
      select: (item) => {
        console.log($('input[name="product_attribute[' + row + '][attribute_id]"]'));
        $('input[name="product_attribute[' + row + '][attribute_id]"]').val(item['value']);
        $('#attribute' + row).val(item['label'])
      }
    });
  }

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

   $('#manufacturer').autocomplete({
   	'source': function(request, response) {
   		$.ajax({
   			url: '<?php echo base_url("admin/manufacturer/autocomplete"); ?>?filter_name=' +  encodeURIComponent(request),
   			dataType: 'json',
   			success: function(json) {

   				response($.map(json, function(item) {
   					return {
   						label: item['name'],
   						value: item['manufacturer_id']
   					}
   				}));
   			}
   		});
   	},
   	'select': function(item) {
   		$('#manufacturer').val(item['label']);
   		$('input[name=\'manufacturer_id\']').val(item['value']);
   	}
   });

   $('#category').autocomplete({
     'source': function(request, response) {
       $.ajax({
         url: '<?php echo base_url("admin/category/autocomplete"); ?>?filter_name=' +  encodeURIComponent(request),
         dataType: 'json',
         success: function(json) {

           response($.map(json, function(item) {
             return {
               label: item['name'],
               value: item['category_id']
             }
           }));
         }
       });
     },
     'select': function(item) {
       $('#category').val(item['label']);
       $('input[name=\'category_id\']').val(item['value']);
     }
   });
   $('[data-toggle="tooltip"]').tooltip();
   triggerImageButton()
})();
</script>
<?php $this->load->view('admin/common/script'); ?>
