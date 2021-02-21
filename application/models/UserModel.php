<?php
class UserModel extends CI_Model {
  // public function


  public function login($username, $password) {
    $password = md5($password);
    $user = $this->db->get_where('user', ['username' => $username, 'password' => $password]);

    return $user->row();
  }
}
