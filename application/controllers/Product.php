<?php

class Product extends CI_Controller{
  public function index(){
    $this->load->view('frontend/product');
  }
}
