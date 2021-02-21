<?php $this->load->view('admin/common/header'); ?>
<!-- navbar -->
<?php $this->load->view('admin/common/navbar'); ?>
<!-- end navbar -->

<?php $this->load->view('admin/common/sidebar'); ?>

<!-- wrapper  -->

<div class="content-wrapper">
  <div class="card">
    <div class="card-header">
      <h1> Order
        <a href="<?php echo base_url('admin/order'); ?>" class="btn btn-danger
        float-right" data-toggle="tooltip" title="Cancel"><i class="fa fa-reply"></i></a>
        <button type="submit" form="form-order" class="btn btn-primary
        float-right" data-toggle="tooltip" title="Save"><i class="fa fa-save"></i></button>
      </h1>
    </div>

     <div class="card-body">
       <form class="form-horizontal" action="<?php echo $action; ?>"
         id="form-order">

           <ul class="nav nav-tabs">
             <li class="nav-item active"><a class="nav-link"
               href="#tab-customer-details">1.Customer Details</a></li>
             <li class="nav-item"><a class="nav-link"
               href="#tab-products">2.Products</a></li>
             <li class="nav-item"><a class="nav-link"
                href="#tab-payment-details">3.Payment Details</a></li>
             <li class="nav-item"><a class="nav-link"
                href="#tab-shipping-details">4.Shipping Details</a></li>
             <li class="nav-item"><a class="nav-link"
                href="#tab-totals">5.Totals</a></li>
           </ul>

           <div class="tab-content">
             <div class="tab-pane active" id="tab-customer-details">

              <div class="form-group">
               <label for="Customer" class="col-sm-3">Customer</label>
                <div class="col-sm-9">
                 <input type="text" name="name" class="form-control" placeholder="Customer" id="name" value="<?php echo $name; ?>">
               </div>
              </div>

              <div class="form-group">
               <label for="FirstName" class="col-sm-3">FirstName *</label>
                <div class="col-sm-9">
                 <input type="text" name="name" class="form-control"
                 placeholder="FirstName" id="name" value="<?php echo $name; ?>">
               </div>
              </div>

              <div class="form-group">
               <label for="LastName" class="col-sm-3">LastName *</label>
                <div class="col-sm-9">
                 <input type="text" name="name" class="form-control"
                  placeholder="LastName" id="name" value="<?php echo $name; ?>">
               </div>
              </div>

              <div class="form-group">
               <label for="Email" class="col-sm-3">Email *</label>
                <div class="col-sm-9">
                 <input type="text" name="name" class="form-control"
                 placeholder="Email" id="name" value="<?php echo $name; ?>">
               </div>
              </div>

              <div class="form-group">
               <label for="Mobile" class="col-sm-3">Mobile *</label>
                <div class="col-sm-9">
                 <input type="text" name="name" class="form-control"
                 placeholder="Mobile" id="name" value="<?php echo $name; ?>">
               </div>
              </div>
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
           })
         })();
         </script>

         <?php $this->load->view('admin/common/script'); ?>
