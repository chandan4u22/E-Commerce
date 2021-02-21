<?php

class AdminOrder extends CI_Controller{
  private $error = [];

  public function __construct() {
      parent::__construct();
      $this->load->model('OrderModel', 'order');
  }

  public function index() {
    $data = [];

    $sort = $this->input->get('sort');
    $order = $this->input->get('order');
    $page = $this->input->get('page')? $this->input->get('page') : 1;
    $limit = 10;

    $filter_data = [
      'sort' => $sort ? $sort : 'order_id',
      'order' => $order ? $order : 'DESC',
      'limit' => $limit,
      'start' => ($page - 1) * $limit
    ];

    $orders = $this->order->getOrders($filter_data);

    $total = $this->order->getTotalOrder();

    $data['orders'] = $orders;
    $data['total'] = $total;

    $this->load->library('pagination');

    $config['base_url'] = base_url('admin/order/');
    $config['total_rows'] = $total;
    $config['per_page'] = $limit;
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    $this->load->view('admin/common/header', ['title' => 'Order List']);
    $this->load->view('admin/order_list', $data);
  }

  public function add() {
    $data = [
      'order_id' => '',
      'name' => '',
      'parent_id' => '',
      'description' => '',
      'meta_title' => '',
      'meta_description' => '',
      'meta_keyword' => ''
    ];

    $data['action'] = base_url('admin/order/add');

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->validateForm()) {
      $this->order->addOrder($this->input->post());
      redirect('admin/order');
    }

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

    $data['orders'] = $this->order->getOrders();
    $this->load->view('admin/common/header', ['title' => 'Add Order']);
    $this->load->view('admin/order_form', $data);
  }

  public function edit($order_id) {

    $data = [
      'order_id' => '',
      'name' => '',
      'parent_id' => '',
      'description' => '',
      'meta_title' => '',
      'meta_description' => '',
      'meta_keyword' => ''
    ];

    $order = $this->order->getOrder($order_id);

    if ($order) {
      $data = (array)$order;
      $data['action'] = base_url('admin/order/add/' . $order_id);
    } else {
      $data['action'] = base_url('admin/order/add');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->validateForm()) {
      $this->order->addOrder($data);
      redirect('admin/order');
    }

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

    $data['orders'] = $this->product->getOrders();
    $this->load->view('admin/common/header', ['title' => 'Edit Order']);
    $this->load->view('admin/order_form', $data);
  }

  protected function validateForm() {
    if (strlen(trim($_POST['name'])) < 2) {
      $this->error['name'] = 'Warning: Name should be at 2 characters!';
    }

    if (strlen(trim($_POST['meta_title'])) < 2) {
      $this->error['meta_title'] = 'Warning: Meta Title should be at 2 characters!';
    }

    return !$this->error;
  }
}
 ?>
