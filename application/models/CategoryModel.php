<?php

class CategoryModel extends CI_Model {
  public function addCategory($data) {
    $this->db->query("INSERT INTO category SET name= '" . $data['name'] . "', description = '" . $data['description'] . "', meta_title = '" . $data['meta_title'] . "', meta_description = '" . $data['meta_description'] . "', meta_keyword = '" . $data['meta_keyword'] . "', parent_id = " . (int)$data['parent_id']);
  }

  public function updateCategory($category_id, $data) {
    $this->db->query("UPDATE category SET name= '" . $data['name'] . "', description = '" . $data['description'] . "', meta_title = '" . $data['meta_title'] . "', meta_description = '" . $data['meta_description'] . "', meta_keyword = '" . $data['meta_keyword'] . "', parent_id = " . (int)$data['parent_id'] . " WHERE category_id = " . (int)$category_id);
  }

  public function getCategory($category_id) {
    $query = $this->db->query("SELECT * FROM `category` WHERE `category_id` = $category_id");
    return $query->row();
  }

  public function getCategories($data = []) {
    $sql = "SELECT c.*, c1.name AS parent FROM `category` c LEFT JOIN `category` c1 ON(c.parent_id = c1.category_id) WHERE 1";

    if (isset($data['filter_name']) && $data['filter_name']) {
      $sql .= " AND c.name LIKE '%" . $data['filter_name'] . "%'";
    }

    if (isset($data['filter_parent'])) {
      $sql .= " AND c.parent_id = " . (int)$data['filter_parent'];
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

  public function getTotalCategory() {
    $sql = "SELECT COUNT(category_id) AS total FROM `category`";

    $query = $this->db->query($sql);
    return $query->row()->total;
  }

  public function getMenus() {
    $categories = [];

    $query = $this->db->query("SELECT * FROM `category` WHERE `parent_id` = 0 OR `parent_id` IS NULL");
    $top_parent_categories = $query->result_array();

    foreach ($top_parent_categories as $parent_category) {
      $query1 = $this->db->query("SELECT * FROM `category` WHERE `parent_id` = " . (int)$parent_category['category_id']);

      $child_categories = $query1->result_array();

      $children = [];

      foreach ($child_categories as $child_category) {
        $children[] = [
          'category_id' => $child_category['category_id'],
          'name' => $child_category['name']
        ];
      }


      $categories[] = [
        'category_id' => $parent_category['category_id'],
        'name' => $parent_category['name'],
        'children' => $children
      ];
    }

    return $categories;
  }
}
