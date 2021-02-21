<?php

class AdminAttribute extends CI_Controller{
    private $error = [];

    public function __construct() {
        parent::__construct();
        // if (!$this->session->has_userdata('user_id')) {
        //   redirect('admin/login');
        // }

        $this->load->model('AttributeModel', 'attribute');
    }

    public function index() {
      $data = [];

      $sort = $this->input->get('sort');
      $order = $this->input->get('order');
      $page = $this->input->get('page')? $this->input->get('page') : 1;
      $limit = 10;

      $filter_data = [
        'sort' => $sort ? $sort : 'attribute_id',
        'order' => $order ? $order : 'ASC',
        'limit' => $limit,
        'start' => ($page - 1) * $limit
      ];

      $attributes = $this->attribute->getAttributes($filter_data);

      $total = $this->attribute->getTotalAttribute();

      $data['attributes'] = $attributes;
      $data['total'] = $total;

      $this->load->library('pagination');

      $config['base_url'] = base_url('admin/attribute/');
      $config['total_rows'] = $total;
      $config['per_page'] = $limit;
      $this->pagination->initialize($config);
      $data['pagination'] = $this->pagination->create_links();
      $this->load->view('admin/common/header', ['title' => 'Attribute List']);
      $this->load->view('admin/attribute_list', $data);
    }

    public function add() {
      $data = [
        'attribute_id' => '',
        'name' => '',
        'sort_order' => ''
      ];

      $data['action'] = base_url('admin/attribute/add');

      if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->validateForm()) {
        $this->attribute->addAttribute($this->input->post());
        redirect('admin/attribute');
      }

      if (isset($this->error['name'])) {
        $data['error_name'] = $this->error['name'];
      } else {
        $data['error_name'] = '';
      }

      $data['attributes'] = $this->attribute->getAttributes();
      $this->load->view('admin/common/header', ['title' => 'Add Attribute']);
      $this->load->view('admin/attribute_form', $data);
    }

    public function edit($attribute_id) {
      $data = [
        'attribute_id' => '',
        'name' => '',
        'sort_order' => ''
      ];

      $attribute = $this->attribute->getAttribute($attribute_id);

      if ($attribute) {
        $data = (array)$attribute;
        $data['action'] = base_url('admin/attribute/edit/' . $attribute_id);
      } else {
        $data['action'] = base_url('admin/attribute/add');
      }

      if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->validateForm()) {
        $this->attribute->updateAttribute($attribute_id, $this->input->post());
        redirect('admin/attribute');
      }

      if (isset($this->error['name'])) {
        $data['error_name'] = $this->error['name'];
      } else {
        $data['error_name'] = '';
      }

      $this->load->view('admin/common/header', ['title' => 'Edit Attribute']);
      $this->load->view('admin/attribute_form', $data);
    }

    public function autocomplete() {
      $json = [];
      // if ($this->input->get('filter_name')) {
        $filter_data = [
          'filter_name' => $this->input->get('filter_name'),
          'sort' => 'name',
          'order' => 'ASC',
          'limit' => 8,
          'start' => 0
        ];
        $json = $this->attribute->getAttributes($filter_data);
      // }
      $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($json));
    }

    protected function validateForm() {
      if (strlen(trim($_POST['name'])) < 2) {
        $this->error['name'] = 'Warning: Name should be at 2 characters!';
      }
      return !$this->error;
    }
  }
   ?>
