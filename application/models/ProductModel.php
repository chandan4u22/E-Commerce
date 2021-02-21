<?php

class ProductModel extends CI_Model {
  public function addProduct($data) {
    if (isset($data['files'])) {
      unset($data['files']);
    }

    if (isset($data['product_image'])) {
      $product_image = $data['product_image'];
      unset($data['product_image']);
    } else {
      $product_image = [];
    }

    if (isset($data['product_attribute'])) {
      $product_attribute = $data['product_attribute'];
      unset($data['product_attribute']);
    } else {
      $product_attribute = [];
    }

    $this->db->insert('product', $data);
    $product_id = $this->db->insert_id();

    if ($product_image) {
      foreach ($product_image as $image) {
        $image['product_id'] = $product_id;
        $this->db->insert('product_image', $image);
      }
    }

    if ($product_attribute) {
      foreach ($product_attribute as $attribute) {
        $attribute['product_id'] = $product_id;
        $this->db->insert('product_attribute', $attribute);
      }
    }
  }

  public function updateProduct($product_id, $data) {
    if (isset($data['files'])) {
      unset($data['files']);
    }

    if (isset($data['product_image'])) {
      $product_image = $data['product_image'];
      unset($data['product_image']);
    } else {
      $product_image = [];
    }

    if (isset($data['product_attribute'])) {
      $product_attribute = $data['product_attribute'];
      unset($data['product_attribute']);
    } else {
      $product_attribute = [];
    }

    $this->db->where('product_id', $product_id);
    $this->db->update('product', $data);

    $this->db->query("DELETE FROM `product_image` WHERE `product_id` = " . (int)$product_id);
    $this->db->query("DELETE FROM `product_attribute` WHERE `product_id` = " . (int)$product_id);

    if ($product_image) {
      foreach ($product_image as $image) {
        $image['product_id'] = $product_id;
        $this->db->insert('product_image', $image);
      }
    }

    if ($product_attribute) {
      foreach ($product_attribute as $attribute) {
        $attribute['product_id'] = $product_id;
        $this->db->insert('product_attribute', $attribute);
      }
    }
  }

  public function getProduct($product_id) {
    $query = $this->db->query("SELECT p.*, c.name AS category, m.name AS manufacturer FROM `product` p LEFT JOIN category c ON (p.category_id=c.category_id) LEFT JOIN manufacturer m ON (m.manufacturer_id=p.manufacturer_id) WHERE `product_id` = $product_id");
    return $query->row();
  }

  public function getProducts($data = []) {
    $sql = "SELECT * FROM `product` WHERE 1";

    if (isset($data['sort']) && $data['order']) {
        $sql .= " ORDER BY " . $data['sort'] . " " . $data['order'];
    }

    if (isset($data['filter_category_id'])) {
      $sql .= " AND category_id = " . (int)$data['filter_category_id'];
    }

    if (isset($data['start']) && isset($data['limit'])) {
      $sql .= " LIMIT " . $data['start'] . ", " . $data['limit'];
    }

    $query = $this->db->query($sql);
    return $query->result();
  }

  public function getTotalProduct() {
    $sql = "SELECT COUNT(product_id) AS total FROM `product` WHERE 1 ";

    if (isset($data['filter_category_id'])) {
      $sql .= " AND category_id = " . (int)$data['filter_category_id'];
    }

    $query = $this->db->query($sql);
    return $query->row()->total;
  }

  public function getProductImages($product_id) {
    $sql = "SELECT * FROM `product_image` WHERE `product_id` = " .(int)$product_id;
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function getProductAttributes($product_id) {
    $sql = "SELECT * FROM `product_attribute` WHERE `product_id` = " .(int)$product_id;
    $query = $this->db->query($sql);
    return $query->result_array();
  }
}
