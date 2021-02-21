<?php

class BannerModel extends CI_Model {
  public function addBanner($data) {

    $this->db->insert('banner', $data);
  }

  public function updateBanner($banner_id, $data) {
    $this->db->query("UPDATE `banner` SET `name` = '" . $data['name'] . "',
    `image` ='". $data['image'] ."', `sort_order` = '" . $data['sort_order'] . "' WHERE `banner_id` = " . $banner_id);
  }

  public function getBanner($banner_id) {
    $query = $this->db->query("SELECT * FROM `banner` WHERE `banner_id` = $banner_id");
    return $query->row();

  }

  public function deleteBanner($banner_id,$data){
  $this->db->query("DELETE FROM `banner` WHERE
    banner_id= $banner_id");
  }

  public function getBanners($data = []) {
    $sql = "SELECT * FROM `banner` WHERE 1";

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

  public function getTotalBanner() {
    $sql = "SELECT COUNT(banner_id) AS total FROM `banner`";

    $query = $this->db->query($sql);
    return $query->row()->total;

  }
}
