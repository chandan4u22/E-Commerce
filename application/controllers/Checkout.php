<?php

class Checkout extends CI_Controller{
  public function index(){
    $this->load->view('frontend/checkout');
  }
}
