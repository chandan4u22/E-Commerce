<?php
class Admin extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('UserModel', 'user');
  }

  public function index() {

    $this->load->view('admin/home');
  }

  public function login() {
    if ($this->session->has_userdata('user_id')) {
      redirect('admin');
    }

    $data['error'] = '';

    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $user_info = $this->user->login($this->input->post('username'), $this->input->post('password'));

      if ($user_info) {
        $this->session->set_userdata('user_id', $user_info->user_id);
        if ($this->session->has_userdata('redirect')) {
          redirect($this->session->userdata('redirect'));
        } else {
          redirect('admin');
        }
      } else {
        $data['error'] = 'Warning: Username or pasword is invalid!';
      }
    }

    $this->load->view('admin/login', $data);
  }

  public function logout() {
    if ($this->session->has_userdata('user_id')) {
      $this->session->unset_userdata('user_id');
    }

    redirect('admin/login');
  }

  public function upload() {
    $json = [];

    $upload_path = ASSET_PATH  . 'images' . DIRECTORY_SEPARATOR;

    if ($this->input->post('dir_name')) {
      $upload_path .= $this->input->post('dir_name');
    }

    $config = [
      'upload_path' => $upload_path,
      'allowed_types' => 'gif|jpeg|jpg|png|svg',
    ];

    $this->load->library('upload', $config);
    
    if ($this->upload->do_upload('image')) {
      $error = $this->upload->display_errors();
      if ($error) {
        $json['error'] = $error;
      } else {
        $json['url'] = base_url('assets/images/' . $this->input->post('dir_name') . '/' . $this->upload->data()['file_name']);

        $json['path'] = 'images' . DIRECTORY_SEPARATOR . $this->input->post('dir_name') . '/' . $this->upload->data()['file_name'];
      }
    }

    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($json));
  }
}
