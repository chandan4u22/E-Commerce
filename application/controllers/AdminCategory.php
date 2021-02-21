<?php
class AdminCategory extends CI_Controller {
  private $error = [];

  public function __construct() {
      parent::__construct();
      $this->load->model('CategoryModel', 'category');
  }

  public function index() {
    $data = [];

    $sort = $this->input->get('sort');
    $order = $this->input->get('order');
    $page = $this->input->get('page') ? $this->input->get('page') : 1;
    $limit = 10;

    $filter_data = [
      'sort' => $sort ? $sort : 'name',
      'order' => $order ? $order : 'ASC',
      'limit' => $limit,
      'start' => ($page - 1) * $limit
    ];

    $categories = $this->category->getCategories($filter_data);

    $total = $this->category->getTotalCategory();

    $data['categories'] = $categories;
    $data['total'] = $total;

    $this->load->library('pagination');

    $config['base_url'] = base_url('admin/category/');
    $config['total_rows'] = $total;
    $config['per_page'] = $limit;
    $this->pagination->initialize($config);

    $data['pagination'] = $this->pagination->create_links();

    $this->load->view('admin/common/header', ['title' => 'Category List']);
    $this->load->view('admin/category_list', $data);
  }

  public function add() {
    $data = [
      'category_id' => '',
      'name' => '',
      'parent_id' => '',
      'description' => '',
      'meta_title' => '',
      'meta_description' => '',
      'meta_keyword' => ''
    ];

    $data['action'] = base_url('admin/category/add');

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->validateForm()) {
      $this->category->addCategory($this->input->post());
      redirect('admin/category');
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

    if ($this->input->post('name')) {
      $data['name'] = $this->input->post('name');
    }

    if ($this->input->post('description')) {
      $data['description'] = $this->input->post('description');
    }

    if ($this->input->post('meta_title')) {
      $data['meta_title'] = $this->input->post('meta_title');
    }

    if ($this->input->post('meta_description')) {
      $data['meta_description'] = $this->input->post('meta_description');
    }

    if ($this->input->post('meta_keyword')) {
      $data['meta_keyword'] = $this->input->post('meta_keyword');
    }

    if ($this->input->post('parent')) {
      $data['parent'] = $this->input->post('name');
    }

    $data['categories'] = $this->category->getCategories(['filter_parent' => 0]);

    $this->load->view('admin/common/header', ['title' => 'Add Category']);
    $this->load->view('admin/category_form', $data);
  }

  public function edit($category_id) {

    $data = [
      'category_id' => '',
      'name' => '',
      'parent_id' => '',
      'description' => '',
      'meta_title' => '',
      'meta_description' => '',
      'meta_keyword' => ''
    ];

    $category = $this->category->getCategory($category_id);

    if ($category) {
      $data = (array)$category;
      $data['action'] = base_url('admin/category/edit/' . $category_id);
    } else {
      $data['action'] = base_url('admin/category/add');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->validateForm()) {
      $this->category->updateCategory($category_id, $this->input->post());
      redirect('admin/category');
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

    if ($this->input->post('name')) {
      $data['name'] = $this->input->post('name');
    }

    if ($this->input->post('description')) {
      $data['description'] = $this->input->post('description');
    }

    if ($this->input->post('meta_title')) {
      $data['meta_title'] = $this->input->post('meta_title');
    }

    if ($this->input->post('meta_description')) {
      $data['meta_description'] = $this->input->post('meta_description');
    }

    if ($this->input->post('meta_keyword')) {
      $data['meta_keyword'] = $this->input->post('meta_keyword');
    }

    if ($this->input->post('parent')) {
      $data['parent'] = $this->input->post('name');
    }

    $data['categories'] = $this->category->getCategories(['filter_parent' => 0]);

    $this->load->view('admin/common/header', ['title' => 'Edit Category']);
    $this->load->view('admin/category_form', $data);
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

      $json = $this->category->getCategories($filter_data);
    }

    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($json));
  }

  protected function validateForm() {
    if (strlen(trim($_POST['name'])) < 2) {
      $this->error['name'] = 'Warning: Name must be greater than 2 and less than 255 characters!';
    }

    if (strlen(trim($_POST['meta_title'])) < 2) {
      $this->error['meta_title'] = 'Warning: Meta Title must be greater than 2 and less than 255 characters!';
    }

    return !$this->error;
  }
}
 ?>
