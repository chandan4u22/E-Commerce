<?php
class AdminProduct extends CI_Controller {
  private $error = [];

  public function __construct() {
      parent::__construct();
      $this->load->model('ProductModel', 'product');
  }

  public function index() {
    $data = [];

    $sort = $this->input->get('sort');
    $order = $this->input->get('order');
    $page = $this->input->get('page')? $this->input->get('page') : 1;
    $limit = 10;

    $filter_data = [
      'sort' => $sort ? $sort : 'name',
      'order' => $order ? $order : 'ASC',
      'limit' => $limit,
      'start' => ($page - 1) * $limit
    ];

    $products = $this->product->getProducts($filter_data);

    $total = $this->product->getTotalProduct();

    $data['products'] = $products;
    $data['total'] = $total;

    $this->load->library('pagination');

    $config['base_url'] = base_url('admin/product/');
    $config['total_rows'] = $total;
    $config['per_page'] = $limit;
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    $this->load->view('admin/common/header', ['title' => 'Product List']);
    $this->load->view('admin/product_list', $data);
  }

  public function add() {

    $data = [
      'category_id' => '',
      'category' => '',
      'name' => '',
      'manufacturer_id' => '',
      'manufacturer' => '',
      'model' => '',
      'description' => '',
      'meta_title' => '',
      'meta_description' => '',
      'meta_keywords' => '',
      'image' => '',
      'price' => 0,
      'quantity' => 0,
      'status' => 0,
      'options' => []
    ];

    $data['product_attribute'] = [];
    $data['product_image'] = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->validateForm()) {
      $this->product->addProduct($this->input->post());
      redirect('admin/product');
    }

    if ($this->input->post()) {
      foreach ($this->input->post() as $key => $post) {
        $data[$key] = $post;
      }
    }

    $data['action'] = base_url('admin/product/add');

    if (isset($this->error['name'])) {
      $data['error_name'] = $this->error['name'];
    } else {
      $data['error_name'] = '';
    }

    if (isset($this->error['meta_title'])) {
      $data['error_meta_title'] = $this->error['meta_title'];
    } else {
      $data['error_meta_title'] = '';
    }
    if (isset($this->error['model'])) {
      $data['error_model'] = $this->error['model'];
    } else {
      $data['error_model'] = '';
    }

    $this->load->view('admin/common/header', ['title' => 'Add Product']);
    $this->load->view('admin/product_form', $data);
  }

  public function edit($product_id) {

    $data = [

      'category_id' => '',
      'category' => '',
      'name' => '',
      'manufacturer_id' => '',
      'manufacturer' => '',
      'model' => '',
      'description' => '',
      'meta_title' => '',
      'meta_description' => '',
      'meta_keywords' => '',
      'image' => '',
      'price' => 0,
      'quantity' => 0,
      'status' => 0,
      'options' => []
    ];

    $product = $this->product->getProduct($product_id);

    if ($product) {

      $data = (array)$product;
      $data['action'] = base_url('admin/product/edit/' . $product_id);
    } else {
      $data['action'] = base_url('admin/product/add');
    }

    $data['product_attribute'] = $this->product->getProductAttributes($product_id);
    $data['product_image'] = $this->product->getProductImages($product_id);

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->validateForm()) {
      $this->product->updateProduct($product_id, $this->input->post());
      redirect('admin/product');
    }

    if (isset($this->error['name'])) {
      $data['error_name'] = $this->error['name'];
    } else {
      $data['error_name'] = '';
    }

    if (isset($this->error['model'])) {
      $data['error_model'] = $this->error['model'];
    } else {
      $data['error_model'] = '';
    }

    if (isset($this->error['meta_title'])) {
      $data['error_meta_title'] = $this->error['meta_title'];
    } else {
      $data['error_meta_title'] = '';
    }

    $data['products'] = $this->product->getProducts();
    $this->load->view('admin/common/header', ['title' => 'Edit Product']);
    $this->load->view('admin/product_form', $data);

  }

  protected function validateForm() {
    if (strlen(trim($_POST['name'])) < 2) {
      $this->error['name'] = 'Warning: Name should be at 2 characters!';
    }

    if (strlen(trim($_POST['meta_title'])) < 2) {
      $this->error['meta_title'] = 'Warning: Meta Title should be at 2 characters!';
    }

    if (strlen(trim($_POST['model'])) < 2) {
      $this->error['model'] = 'Warning: Model should be at 2 characters!';
    }

    return !$this->error;
  }
}
 ?>
