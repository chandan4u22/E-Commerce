<?php

class AttributeModel extends CI_Model {
  public function addAttribute($data) {

    $this->db->insert('attribute', $data);
  }

  public function updateAttribute($attribute_id, $data) {
    $this->db->query("UPDATE `attribute` SET `name` = '" . $data['name'] . "', `sort_order` = '" . $data['sort_order'] . "' WHERE `attribute_id` = " . $attribute_id);
  }

  public function getAttribute($attribute_id) {
    $query = $this->db->query("SELECT * FROM `attribute` WHERE `attribute_id` = $attribute_id");
    return $query->row();
  }

  public function deleteAttribute($attribute_id,$data){
  $this->db->query("DELETE FROM `attribute` WHERE
    attribute_id=$attribute_id");
  }

  public function getAttributes($data = []) {
    $sql = "SELECT * FROM `attribute` WHERE 1";

    if (isset($data['filter_name']) && $data['filter_name']) {
      $sql .= " AND name LIKE '%" . $data['filter_name'] . "%'";
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

  public function getTotalAttribute() {
    $sql = "SELECT COUNT(attribute_id) AS total FROM `attribute`";

    $query = $this->db->query($sql);
    return $query->row()->total;
  }
}
