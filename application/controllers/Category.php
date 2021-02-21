<?php

class Category extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('CategoryModel', 'category');
    $this->load->model('ProductModel', 'product');
  }

  public function index($category_id = 0) {
    $sort = $this->input->get('sort');
    $order = $this->input->get('order');
    $page = $this->input->get('page')? $this->input->get('page') : 1;
    $limit = 10;

    $filter_data = [
      'category_id' => $category_id,
      'sort' => $sort ? $sort : 'name',
      'order' => $order ? $order : 'ASC',
      'limit' => $limit,
      'start' => ($page - 1) * $limit
    ];

    $data['products'] = $this->product->getProducts($filter_data);

    $this->load->view('frontend/common/header', ['categories' => $this->category->getMenus()]);
    $this->load->view('frontend/category', $data);
 }

  public function test() {
    echo "<h1>Category Test Page</h1>";
  }

}
