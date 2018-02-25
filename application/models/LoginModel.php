<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {
    public function logincheck($email, $password){
    	$this->db->select('*');
    	$this->db->from('tbl_users');
    	$this->db->where('email', $email);
    	$this->db->where('password', $password);
    	$query = $this->db->get();
		$user  = $query->result();
    	if ($user) {
    		return $user;
    	} else {
    		return false;
    	}
    	
    }	
	
}
