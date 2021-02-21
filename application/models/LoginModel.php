<?php

class LoginModel extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    public function validate(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $query = $this->db->get('users');
        if($query->num_rows == 1)
        {
            $row = $query->row();
            $data = array(
                    'userid' => $row->userid,
                    'firstname' => $row->firstname,
                    'lastname' => $row->lastname,
                    'username' => $row->username,
                    'validated' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
        return false;
    }
}
