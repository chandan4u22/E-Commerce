<?php

class AdminCustomer extends CI_Controller{
    private $error = [];

    public function __construct() {
        parent::__construct();
        $this->load->model('CustomerModel', 'customer');
    }

    public function index() {
      $data = [];

      $sort = $this->input->get('sort');
      $order = $this->input->get('order');
      $page = $this->input->get('page')? $this->input->get('page') : 1;
      $limit = 10;

      $filter_data = [
        'sort' => $sort ? $sort : 'customer_id',
        'order' => $order ? $order : 'ASC',
        'limit' => $limit,
        'start' => ($page - 1) * $limit
      ];

      $customers = $this->customer->getCustomers($filter_data);

      $total = $this->customer->getTotalCustomer();

      $data['customers'] = $customers;
      $data['total'] = $total;

      $this->load->library('pagination');

      $config['base_url'] = base_url('admin/customer/');
      $config['total_rows'] = $total;
      $config['per_page'] = $limit;
      $this->pagination->initialize($config);
      $data['pagination'] = $this->pagination->create_links();
      $this->load->view('admin/common/header', ['title' => 'Customer List']);
      $this->load->view('admin/customer_list', $data);
    }

    public function add() {
      $data = [
        'customer_id' => '',
        'name' => '',
        'parent_id' => '',
        'description' => '',
        'meta_title' => '',
        'meta_description' => '',
        'meta_keyword' => ''
      ];

      $data['action'] = base_url('admin/customer/add');

      if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->validateForm()) {
        $this->customer->addCustomer($this->input->post());
        redirect('admin/customer');
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

      $data['customers'] = $this->customer->getCustomers();
      $this->load->view('admin/common/header', ['title' => 'Add Customer']);
      $this->load->view('admin/customer_form', $data);
    }

    public function edit($customer_id) {

      $data = [
        'customer_id' => '',
        'name' => '',
        'parent_id' => '',
        'description' => '',
        'meta_title' => '',
        'meta_description' => '',
        'meta_keyword' => ''
      ];

      $customer = $this->customer->getCustomer($customer_id);

      if ($customer) {
        $data = (array)$customer;
        $data['action'] = base_url('admin/customer/edit/' . $customer_id);
      } else {
        $data['action'] = base_url('admin/customer/add');
      }

      if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->validateForm()) {
        $this->customer->addCustomer($data);
        redirect('admin/customer');
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

      $data['customers'] = $this->customer->getCustomers();
      $this->load->view('admin/common/header', ['title' => 'Edit Customer']);
      $this->load->view('admin/customer_form', $data);
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
