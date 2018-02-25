<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoleModel extends CI_Model {
    public function insertRole($data){
        $this->db->insert('tbl_roles', $data); 
        return $this->db->insert_id();
    }
    public function getRoles(){
        $this->db->select('*');
        $this->db->from('tbl_roles');
        $query = $this->db->get();
        $result  = $query->result();
        return $result;

    }
    	
}
