<?php $this->load->view('frontend/common/header'); ?>
  <!-- ======= Contact Us Section ======= -->
  <!--  Start Carousel-->
  <div id="demo" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?php echo base_url('assets/images/slide/banner.jpg'); ?>" class="d-block w-100" alt="Image">
      </div>
    </div>
  </div>
  <!-- End Carousel -->
  <div class="container">
    <hr class="w-25 mx-auto pt-5">
    <div class="row">
      <div class="col-md-8">
        <h1 class="contactus_formSech2">Send Me Your Query</h1>
        <form name="contactus_frm" action="" method="post" enctype="multipart/form-data" class="form-horizontal" novalidate="novalidate">
          <fieldset>
            <div class="form-group required">
              <label class="col-md-4 control-label" for="input-name">Customer Type</label>
              <div class="col-md-8">
                <select required="required" name="customertype" value="" class="form-control valid" id="input-customer" aria-invalid="false">
                  <option value="" disable="">Please Select Customer Type</option>
                  <option value="Existing Customer">Existing Customer</option>
                  <option value="New Customer">New Customer</option>
                </select>
              </div>
            </div>
            <div class="form-group required">
              <label class="col-md-4 control-label" for="input-name">Enquiry Type</label>
              <div class="col-md-8">
                <select required="required" name="enquirytype" value="" class="form-control valid" id="input-enquiry_type" aria-invalid="false">
                  <option value="" disable="">Please Select Enquiry Type</option>
                  <option value="Product">Product</option>
                  <option value="Shipping">Shipping</option>
                  <option value="Pricing">Pricing</option>
                  <option value="Return">Return</option>
                  <option value="Payment">Payment</option>
                  <option value="Deals">Deals</option>
                  <option value="General">General</option>
                </select>
              </div>
            </div>
            <div class="form-group required">
              <label class="col-md-4 control-label" for="input-name">Your Name</label>
              <div class="col-md-8">
                <input type="text" name="name" value="" id="input-name" class="form-control">
              </div>
            </div>
            <div class="form-group required">
              <label class="col-md-4 control-label" for="input-phone">Telephone</label>
              <div class="col-md-8">
                <input type="text" name="phone" value="" id="input-phone" class="form-control">
              </div>
            </div>
            <div class="form-group required">
              <label class="col-md-4 control-label" for="input-email">E-Mail Address</label>
              <div class="col-md-8">
                <input type="text" name="email" value="" id="input-email" class="form-control">
              </div>
            </div>
            <div class="form-group required">
              <label class="col-md-4 control-label" for="input-enquiry">Enquiry</label>
              <div class="col-md-8">
                <textarea name="enquiry" rows="5" id="input-enquiry" class="form-control"></textarea>
              </div>
            </div>
          </fieldset>
          <div class="form-group">
            <div class="col-md-10 col-md-offset-2">
              <div class="buttons" style="margin-left: 70px;">
                <input class="btn btn-primary" type="submit" value="Send Query">
              </div>
            </div>
            <br>
            <br>
            <p id="success_msg_contact"></p>
          </div>
        </form>
      </div>

      <div class="col-md-4">
        <div class="help-phone">
          <h1>Phone</h1>
          <a href="tel:8552178763" class="help_phone_anchor"> <img src="" alt="callus_chat" class="img-responsive"> (855) 217-8763 </a>
          <h4>Speak live with a support representative.</h4>
        </div>

        <div class="help-chat">
          <h1>Chat</h1>
          <a href="javascript:$zopim.livechat.window.show();"> <img src="" alt="Chat_icons_chat" class="img-responsive"> Chat with an Advisor </a>
          <h4>Monday to Friday
        <br>08AM - 05PM (KOLKATA)</h4>
        </div>

        <div class="help-location">
          <h1>Our Location</h1>
          <a href="" class="help_phone_anchor"> <img src="" alt="Locationicon_chat" class="img-responsive"> Check Your Order Status </a>
          <h4>52 Hydrabad Ammerpet, Unit 105
        Highlight Springs, Pa 12345</h4>
        </div>
      </div>
    </div>
  </div>
    <div class="row">
        <?php $this->load->view('frontend/common/script'); ?>
          <?php $this->load->view('frontend/common/footer'); ?>
            <!-- End Contact Us -->
