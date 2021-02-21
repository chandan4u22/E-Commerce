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
  <title>Admin Login </title>
</head>
<body>
  <div class="dashboard-main-wrapper login-container">
    <div class="container" style="margin-top:20px;">
      <h1 class="text-center">Login</h1>
      <form method='post' name='process' enctype="multipart/form-data">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
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
