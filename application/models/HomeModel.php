<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model {
    public function sendContact($data){
        $this->db->insert('tbl_contact', $data); 
        return $this->db->insert_id();
    }
    public function getContacts(){
        $this->db->select('*');
        $this->db->from('tbl_contact');
       /* if (!empty($searchText)) {
            $likeCriteria = "(tbl_contact.role LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }    
        $this->db->limit($page, $segment);*/
        $query = $this->db->get();
        $result  = $query->result();
        return $result;

    }
    public function delete_contact($data){
        $this->db->where('id', $data);
        $result=$this->db->delete('tbl_contact');
        return $result;
    }

    	
}
