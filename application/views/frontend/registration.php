<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/libs/css/style.css'); ?>">
  <link href="<?php echo base_url('assets/vendor/fonts/circular-std/style.css" rel="stylesheet'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/libs/css/style.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fonts/fontawesome/css/fontawesome-all.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url ('assets/vendor/charts/chartist-bundle/chartist.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url ('assets/vendor/charts/morris-bundle/morris.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url ('assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fonts/flag-icon-css/flag-icon.min.css'); ?>">
  <title>User Login </title>
</head>
<body>
  <div class="dashboard-main-wrapper login-container">
    <div class="container" style="margin-top:20px;">
      <h1 class="text-center">Registration Form</h1>
      <form method='post' name='process' enctype="multipart/form-data">
        <div class="form-group">
          <label for="firstname">Firstname *</label>
          <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Enter Firstname">
        </div>

        <div class="form-group">
          <label for="lastname">Lastname *</label>
          <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter Lastname">
        </div>

        <div class="form-group">
          <label for="email">Email *</label>
          <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email">
        </div>

        <div class="form-group">
          <label for="password">Password *</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
        </div>

        <div class="form-group">
          <label for="mobile">Mobile *</label>
          <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile">
        </div>

        <div class="form-group">
          <label for="address">Address1 *</label>
          <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address">
        </div>
        <div class="form-group">
          <label for="address">Address2 *</label>
          <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address">
        </div>

        <div class="form-group">
          <label for="city">City</label>
          <input type="text" name="city" class="form-control" id="city" placeholder="Enter City">
        </div>

        <div class="form-group">
          <label for="country">Country</label>
          <input type="text" name="country" class="form-control" id="country" placeholder="Enter Country">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <?php if ($error) { ?>
          <div class="alert alert-danger alert-dismissable">
            <?php echo $error; ?>
          </div>
          <?php } ?>
      </form>
    </div>
  </div>
</body>

</html>
