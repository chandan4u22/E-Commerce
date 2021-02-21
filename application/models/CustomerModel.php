<?php

class CustomerModel extends CI_Model {
  public function addCustomer($data) {

    $this->db->insert('customer', $data);
  }

  public function updateCustomer($customer_id, $data) {
    $this->db->update('customer',  $data);
  }

  public function getCustomer($customer_id) {
    $query = $this->db->query("SELECT * FROM `customer` WHERE `customer_id` = $customer_id");
    return $query->row();
  }

  public function getCustomers($data = []) {
    $sql = "SELECT * FROM `customer`";

    if (isset($data['sort']) && $data['order']) {
        $sql .= " ORDER BY " . $data['sort'] . " " . $data['order'];
    }

    if (isset($data['start']) && isset($data['limit'])) {
      $sql .= " LIMIT " . $data['start'] . ", " . $data['limit'];
    }

    $query = $this->db->query($sql);
    return $query->result();
  }

  public function getTotalCustomer() {
    $sql = "SELECT COUNT(customer_id) AS total FROM `customer`";

    $query = $this->db->query($sql);
    return $query->row()->total;
  }
}
