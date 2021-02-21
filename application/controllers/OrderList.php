<?php

class OrderList extends CI_Controller{
  public function index(){
    $this->load->view('frontend/order_list');
  }
}
