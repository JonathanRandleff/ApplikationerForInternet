<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model
{
    // declare private variable
    private $_userID;
    private $_userName;
    private $_password;

    public function setUserID($userID)
    {
        $this->_userID = $userID;
    }

    public function setUserName($userName)
    {
        $this->_userName = $userName;
    }

    public function setPassword($password)
    {
        $this->_password = $password;
    }

    public function createUser()
    {
        $data = array(
            'username' => $this->_userName,
            'password' => $this->_password,
        );
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }

    public function getUserInfo()
    {
        $this->db->select(array('u.id', 'u.username'));
        $this->db->from('user as u');
        $this->db->where('u.id', $this->_userID);
        $query = $this->db->get();
        return $query->row_array();
    }

    function login()
    {
        $this->db->select('id');
        $this->db->from('user');
        $this->db->where('username', $this->_userName);
        $this->db->where('password', $this->_password);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
}