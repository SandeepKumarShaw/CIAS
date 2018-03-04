<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoleModel extends CI_Model {
    public function insertRole($data){
        $this->db->insert('tbl_roles', $data); 
        return $this->db->insert_id();
    }
    public function getRoles($searchText = '', $page, $segment){
        $this->db->select('*');
        $this->db->from('tbl_roles');
        if (!empty($searchText)) {
            $likeCriteria = "(tbl_roles.role LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }    
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        $result  = $query->result();
        return $result;

    }
    public function roleListingCount($searchText = ''){
        $this->db->select('*');
        $this->db->from('tbl_roles');
        if (!empty($searchText)) {
            $likeCriteria = "(tbl_roles.role LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }    
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function getRoleInfo($roleId){
        $this->db->select('*');
        $this->db->from('tbl_roles');
        $this->db->where('roleId',$roleId);
        $query = $this->db->get();
        return $query->result();
    }
    public function updateRole($data, $roleId){
        $this->db->where('roleId', $roleId);
        $this->db->update('tbl_roles', $data);        
        return TRUE;

    }
    	
}
