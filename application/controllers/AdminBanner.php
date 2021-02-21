<?php

class AdminBanner extends CI_Controller{
    private $error = [];

    public function __construct() {
        parent::__construct();
        $this->load->model('BannerModel', 'banner');
    }

    public function index() {
      $data = [];

      $sort = $this->input->get('sort');
      $order = $this->input->get('order');
      $page = $this->input->get('page')? $this->input->get('page') : 1;
      $limit = 10;

      $filter_data = [
        'sort' => $sort ? $sort : 'banner_id',
        'order' => $order ? $order : 'ASC',
        'limit' => $limit,
        'start' => ($page - 1) * $limit

      ];

      $banners = $this->banner->getBanners($filter_data);

      $total = $this->banner->getTotalBanner();

      $data['banners'] = $banners;
      $data['total'] = $total;

      $this->load->library('pagination');
      $config['base_url'] = base_url('admin/banner/');
      $config['total_rows'] = $total;
      $config['per_page'] = $limit;
      $this->pagination->initialize($config);
      $data['pagination'] = $this->pagination->create_links();
      $this->load->view('admin/common/header', ['title' => 'Banner List']);
      $this->load->view('admin/banner_list', $data);
    }

    public function add() {
      $data = [
        'banner_id' => '',
        'name' => '',
        'image' => '',
        'sort_order' => ''
      ];

      $data['action'] = base_url('admin/banner/add');

      if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->validateForm()) {
        $this->banner->addBanner($this->input->post());
        redirect('admin/banner');
      }

      if (isset($this->error['name'])) {
        $data['error_name'] = $this->error['name'];
      } else {
        $data['error_name'] = '';
      }

      $data['banners'] = $this->banner->getBanners();
      $this->load->view('admin/common/header', ['title' => 'Add Banner']);
      $this->load->view('admin/banner_form', $data);
    }

    public function edit($banner_id) {
      $data = [
        'banner_id' => '',
        'name' => '',
        'image' => '',
        'sort_order' => ''
      ];

      $banner = $this->banner->getBanner($banner_id);

      if ($banner) {
        $data = (array)$banner;
        $data['action'] = base_url('admin/banner/edit/' . $banner_id);
      } else {
        $data['action'] = base_url('admin/banner/add');
      }

      if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->validateForm()) {
        $this->banner->updateBanner($banner_id, $this->input->post());
        redirect('admin/banner');
      }

      if (isset($this->error['name'])) {
        $data['error_name'] = $this->error['name'];
      } else {
        $data['error_name'] = '';
      }

      $data['banners'] = $this->banner->getBanners();
      $this->load->view('admin/common/header', ['title' => 'Edit Banner']);
      $this->load->view('admin/banner_form', $data);
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
        $json = $this->banner->getBanners($filter_data);
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
