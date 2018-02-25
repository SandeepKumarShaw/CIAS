<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoleController extends CI_Controller {
    //protected $global = array();	
	public function __construct(){
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('RoleModel');
        
    }
    public function isLoggedIn(){
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE){
            redirect ('login');        
        }        
    }
    public function index(){
        $data['roleListing'] = $this->RoleModel->getRoles();
        $this->global['pageTitle'] = 'Admin | Role';
        loadViews('admin/role/index', $this->global, $data);
    }
    public function addRole(){
        $this->global['pageTitle'] = 'Admin | Add Role';
        loadViews('admin/role/create', $this->global, NULL);
    }
    public function addRoleSuc(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->addRole();
        } else {
            $role = $this->input->post('role');
            $data = array(
                    'role' => $role
                    );
            $result = $this->RoleModel->insertRole($data);
            if ($result) {
                $this->session->set_flashdata('success','Role Inserted Successfully');
                redirect('/role','refresh');
            } else {
                $this->session->set_flashdata('error','Role Failed To Inserted');
                $this->addRole();
            }
        }       
    }
    public function editRole($id){
        $this->global['pageTitle'] = 'Admin | Edit Role';
        loadViews('admin/role/edit', $this->global, NULL);
    }
    public function updateRole(){
        
    }
}    


