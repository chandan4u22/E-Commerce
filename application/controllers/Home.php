<?php

class Home extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('CategoryModel', 'category');
  }
  public function index() {
    $data = [];

    // $data['popular_products'] = $this->product->getPopularPopularProducts();
    // $data['best_seller_products'] = $this->product->getBestSellingProducts();
    
    $this->load->view('frontend/common/header', ['categories' => $this->category->getMenus()]);
    $this->load->view('frontend/home');
  }
}
