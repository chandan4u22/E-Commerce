<?php

class AdminManufacturer extends CI_Controller{
  private $error = [];

  public function __construct() {
      parent::__construct();
      $this->load->model('ManufacturerModel', 'manufacturer');
  }

  public function index() {
    $data = [];
    $sort = $this->input->get('sort');
    $order = $this->input->get('order');
    $page = $this->input->get('page')? $this->input->get('page') : 1;
    $limit = 10;

    $filter_data = [
      'filter_name' => '',
      'sort' => $sort ? $sort : 'name',
      'order' => $order ? $order : 'ASC',
      'limit' => $limit,
      'start' => ($page - 1) * $limit
    ];

    $manufacturers = $this->manufacturer->getManufacturers($filter_data);

    $total = $this->manufacturer->getTotalManufacturer();

    $data['manufacturers'] = $manufacturers;
    $data['total'] = $total;

    $this->load->library('pagination');

    $config['base_url'] = base_url('admin/manufacturer/');
    $config['total_rows'] = $total;
    $config['per_page'] = $limit;
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    $this->load->view('admin/common/header', ['title' => 'Manufacturer List']);
    $this->load->view('admin/manufacturer_list', $data);
  }

  public function add() {
    $data = [
      'manufacturer_id' => '',
      'name' => '',
      'image' => ''
    ];

    $data['action'] = base_url('admin/manufacturer/add');

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->validateForm()) {
      $this->manufacturer->addManufacturer($this->input->post());
      redirect('admin/manufacturer');
    }

    if (isset($this->error['name'])) {
      $data['error_name'] = $this->error['name'];
    } else {
      $data['error_name'] = '';
    }

    $this->load->view(
      'admin/common/header', [
      'title' => 'Add Manufacturer'
    ]);
    $this->load->view('admin/manufacturer_form', $data);
  }

  public function edit($manufacturer_id) {

    $data = [
      'manufacturer_id' => '',
      'name' => '',
      'image' => ''
    ];

    $manufacturer = $this->manufacturer->getManufacturer($manufacturer_id);

    if ($manufacturer) {
      $data = (array)$manufacturer;
      $data['action'] = base_url('admin/manufacturer/edit/' . $manufacturer_id);
    } else {
      $data['action'] = base_url('admin/manufacturer/add');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->validateForm()) {
      $this->manufacturer->updateManufacturer($manufacturer_id, $this->input->post());
      redirect('admin/manufacturer');
    }

    if (isset($this->error['name'])) {
      $data['error_name'] = $this->error['name'];
    } else {
      $data['error_name'] = '';
    }

    $this->load->view('admin/common/header', ['title' => 'Edit Category']);
    $this->load->view('admin/manufacturer_form', $data);
  }

  public function autocomplete() {
    $json = [];

    if ($this->input->get('filter_name')) {
      $filter_data = [
        'filter_name' => $this->input->get('filter_name'),
        'sort' => 'name',
        'order' => 'ASC',
        'limit' => 8,
        'start' => 0
      ];

      $json = $this->manufacturer->getManufacturers($filter_data);
    }

    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($json));
  }

  protected function validateForm() {
    if (strlen(trim($_POST['name'])) < 2) {
      $this->error['name'] = 'Warning: Name must be greater than 2 and less than 255 characters!';
    }

    return !$this->error;
  }
}
 ?>
