<?php

class OrderModel extends CI_Model{
  public function addOrder($data) {

    $this->db->insert('order', $data);
  }

  public function updateOrder($order_id, $data) {
    $this->db->update('order',  $data);
  }

  public function getOrder($order_id) {
    $query = $this->db->query("SELECT * FROM `order` WHERE `order_id` = $order_id");
    return $query->row();
  }

  public function getOrders($data = []) {
    $sql = "SELECT * FROM `order`";

    if (isset($data['sort']) && $data['order']) {
        $sql .= " ORDER BY " . $data['sort'] . " " . $data['order'];
    }

    if (isset($data['start']) && isset($data['limit'])) {
      $sql .= " LIMIT " . $data['start'] . ", " . $data['limit'];
    }
    $query = $this->db->query($sql);
    return $query->result();
  }

  public function getTotalOrder() {
    $sql = "SELECT COUNT(order_id) AS total FROM `order`";

    $query = $this->db->query($sql);
    return $query->row()->total;
  }
}
