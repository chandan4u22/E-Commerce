<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Shopping Cart</title>
  <!-- Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/libs/css/menu.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/libs/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/libs/css/bootstrap.min.css'); ?>">
  <!-- jquery 3.3.1 -->
  <script src="<?php echo base_url('assets/vendor/jquery/jquery-3.3.1.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/libs/js/common.js'); ?>"></script>
  <!-- bootstap bundle js -->
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.js'); ?>"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fonts/fontawesome/css/fontawesome-all.css'); ?>">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/libs/css/owl.carousel.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/libs/css/main.css');
   ?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/libs/css/responsive.css'); ?>">
</head>
<body>
  <!-- ============================================================== -->
  <!-- main header -->
  <!-- ============================================================== -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark custom-navbar">
      <a class="navbar-brand" href="<?php
      echo base_url('home'); ?>">
       <img src="<?php echo base_url('assets/images/banner/logo.png'); ?>" alt="Image"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <form class="form-inline custom-form-inline ml-4">
        <input class="form-control custom-form-control p-4" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0 ml-4 p-3" type="submit">Search</button>
      </form>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item" class="dropdown">
          <a class="nav-link" href="#" title="My Account" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i> My Account<span class="caret" data-toggle="modal" data-target="#myModal"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa fa-cart-plus"></i> Checkout</a></li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i> My Cart</a></li>
      </ul>
    </nav>
  </header>
  <!-- Dropdown menu start -->
  <div id="menu">
    <ul>
      <?php if ($categories) { ?>
        <?php foreach ($categories as $category) { ?>
            <li><a href="<?php echo base_url('category/' . $category['category_id']); ?>"><?php echo $category['name']; ?></a>
              <?php if ($category['children']) { ?>
                <ul class="child-menu">
                  <?php foreach ($category['children'] as $children) { ?>
                    <li><a href="<?php echo base_url('category/' . $children['category_id']); ?>"><?php echo $children['name']; ?></a></li>
                  <?php } ?>
                </ul>
              <?php } ?>
            </li>
        <?php } ?>
      <?php } ?>
    </ul>
  </div>
  <!-- End Dropdown menu -->
