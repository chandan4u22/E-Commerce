<?php
class Homepage extends CI_Controller{
  public function index(){
    $this->load->view('frontend/homepage');
  }
}
