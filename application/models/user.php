<?php

class User extends CI_Model {

    var $title = '';
    var $content = '';
    var $date = '';

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    public function login($username, $password) {

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $loadQuery = $this->db->get();
        if ($loadQuery->num_rows() > 0) {
            return $loadQuery->result_array();
        } else {
            return false;
        }
    }

    public function checkUser($username = null) {
        $this->db->select('username');
        $this->db->from('user');
        if ($username) {
            $this->db->where('username', $username);
        }
        $loadQuery = $this->db->get();
        if ($loadQuery->num_rows() >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function checkEmail($email = null) {
        $this->db->select('email');
        $this->db->from('user');
        if ($email) {
            $this->db->where('email', $email);
        }
        $loadQuery = $this->db->get();
        if ($loadQuery->num_rows() >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function addUser($username, $password, $email) {
        $data = array(
            'username' => $username,
            'password' => $password,
            'email' => $email
        );
        if ($this->db->insert('user', $data)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function loadUser($id_user){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user', $id_user);
        $loadQuery = $this->db->get();
        if ($loadQuery->num_rows() > 0) {
            return $loadQuery->result_array();
        } else {
            return false;
        }
        
    }
    
     public function loadUserByEmail($email){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $email);
        $loadQuery = $this->db->get();
        if ($loadQuery->num_rows() > 0) {
            return $loadQuery->result_array();
        } else {
            return false;
        }
        
    }
    
    public function updateUser($id_user, $username, $email){
       $data = array(
            'username' => $username,
            'email' => $email
        );
       $this->db->where('id_user', $id_user);
       if($this->db->update('user', $data)){
           return true;
       } else {
           return false;
       }
        
    }
    
    public function updatePassword($id_user, $password){
       $data = array(
            'password' => $password
        );
       $this->db->where('id_user', $id_user);
       if($this->db->update('user', $data)){
           return true;
       } else {
           return false;
       }
        
    }

}
