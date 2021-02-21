<?php

class Cart extends CI_Controller{
  public function index(){
    $this->load->view('frontend/cart');
  }
}
