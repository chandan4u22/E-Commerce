<?php

class ManufacturerModel extends CI_Model{
  public function addManufacturer($data) {
    $this->db->insert('manufacturer', $data);
  }

  public function updateManufacturer($manufacturer_id, $data) {
    $this->db->query("UPDATE `manufacturer` SET `name` = '" . $data['name'] . "', `image` = '" . $data['image'] . "' WHERE `manufacturer_id` = " . $manufacturer_id);

    // $this->db->where('manufacturer_id',  $manufacturer_id);
    // $this->db->update('manufacturer',  $data);
  }

  public function getManufacturer($manufacturer_id) {
    $query = $this->db->query("SELECT * FROM `manufacturer` WHERE `manufacturer_id` = $manufacturer_id");
    return $query->row();
  }

  public function deleteManufacturer($manufacturer_id,$data){
  $this->db->query("DELETE FROM `manufacturer` WHERE manufacturer_id=$manufacturer_id");
}

  public function getManufacturers($data = []) {
    $sql = "SELECT * FROM `manufacturer`WHERE 1";

    if (isset($data['filter_name']) && $data['filter_name']) {
      $sql .= " AND `name` LIKE '%" . $data['filter_name'] . "%'";
    }

    if (isset($data['sort']) && $data['order']) {
        $sql .= " ORDER BY " . $data['sort'] . " " . $data['order'];
    }

    if (isset($data['start']) && isset($data['limit'])) {
      $sql .= " LIMIT " . $data['start'] . ", " . $data['limit'];
    }

    $query = $this->db->query($sql);
    return $query->result();
  }

  public function getTotalManufacturer() {
    $sql = "SELECT COUNT(manufacturer_id) AS total FROM `manufacturer`";

    $query = $this->db->query($sql);
    return $query->row()->total;
  }
}
