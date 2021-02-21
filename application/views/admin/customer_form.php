<?php $this->load->view('admin/common/header'); ?>
<!-- navbar -->
<?php $this->load->view('admin/common/navbar'); ?>
<!-- end navbar -->
<?php $this->load->view('admin/common/sidebar'); ?>

    <!-- wrapper  -->
 <div class="content-wrapper">
  <div class="card">
   <div class="card-header">
    <h1>Customer
     <a href="<?php echo base_url('admin/customer'); ?>"
        class="btn btn-danger
        float-right" data-toggle="tooltip" title="Cancel"><i class="fa fa-reply"></i></a>
        <button type="submit" form="form-product" class="btn btn-primary
        float-right" data-toggle="tooltip" title="Save"><i class="fa fa-save"></i></button>
      </h1>
    </div>

    <div class="card-body">
     <form class="form-horizontal" action="<?php echo $action; ?>"
      id="form-customer" method="post">

          <ul class="nav nav-tabs">
           <li class="nav-item active"><a class="nav-link" data-toggle="tab"
           href="#tab-general">General</a></li>
           <li class="nav-item"><a class="nav-link" data-toggle="tab"
             href="#tab-address">Address</a></li>
          </ul>

         <div class="tab-content">
          <div class="tab-pane active" id="tab-general">
           <div class="form-group">
            <label for="name" class="col-sm-3">Customer Name *</label>
             <div class="col-sm-9">
              <input type="text" name="name" class="form-control" placeholder="Enter Customer Name" id="name" value="<?php echo $name; ?>">
              <?php if ($error_name): ?>
               <div class="text-danger">
                 <?php echo $error_name; ?>
               </div>
             <?php endif; ?>
           </div>
         </div>

         <div class="form-group">
          <label for="firtname" class="col-sm-3">Firstname *</label>
           <div class="col-sm-9">
            <input type="text" name="name" class="form-control"
              placeholder="Enter FirstName" id="name" value="<?php
               echo $name; ?>">
              </div>
            </div>

            </div>
               <div class="form-group">
                <label for="Lastname" class="col-sm-3">Lastname *</label>
                 <div class="col-sm-9">
                  <input type="text" name="name" class="form-control"
                    placeholder="Enter LastName" id="name" value="<?php
                     echo $name; ?>">
                    </div>
                  </div>

                  </div>
                     <div class="form-group">
                      <label for="email" class="col-sm-3">Email *</label>
                       <div class="col-sm-9">
                        <input type="text" name="email" class="form-control"
                          placeholder="Enter Email Name" id="name" value="<?php
                           echo $name; ?>">
                          </div>
                        </div>

        <div class="form-group">
          <label for="password" class="col-sm-3">Password *</label>
           <div class="col-sm-9">
            <input type="text" name="name" class="form-control"
              placeholder="Enter Password" id="name" value="<?php
               echo $name; ?>">
              </div>
            </div>

                  <div class="form-group">
                     <label for="status" class="col-sm-3">Status</label>
                      <div class="col-sm-9">
                        <input type="text" name="name" class="form-control"  placeholder="Status" id="name" value="<?php
                       echo $name; ?>">
                     </div>
                   </div>

              <div class="form-group">
                 <label for="date" class="col-sm-3">Date</label>
                  <div class="col-sm-9">
                   <input type="text" name="name" class="form-control"    placeholder="Date" id="name" value="<?php echo$name; ?>">
                    </div>
                   </div>

                 <!-- Tabe General Ends -->
                 <!-- Tabe Address Starts -->
                 <div class="tab-pane" id="tab-address">
                   <h1>Address</h1>
                 </div>
                 <!-- Tabe Address Ends -->
               </div>
              </form>
            </div>
            </div>
          <?php $this->load->view('admin/common/footer'); ?>
         </div>
         <!-- end wrapper  -->
         <!-- Optional JavaScript -->
         <link rel="stylesheet" href="<?php echo base_url('assets/vendor/summernote/css/summernote-bs4.css'); ?>">
         <script src="<?php echo base_url('assets/vendor/summernote/js/summernote-bs4.js'); ?>">
         </script>

         <script type="text/javascript">
         (() => {
          $('a[data-toggle="tab"]').tab();
         })();
         </script>
         <?php $this->load->view('admin/common/script'); ?>
