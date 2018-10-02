<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoleController extends CI_Controller {
    //protected $global = array();	
	public function __construct(){
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('RoleModel');
        $this->load->library('Templates');

        
    }
    public function isLoggedIn(){
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE){
            redirect ('login');        
        }        
    }
    public function index(){
        $searchText = $this->input->post('searchText');
        //echo $searchText;
        $count = $this->RoleModel->roleListingCount($searchText);
        //echo $count;
        $abc=$this->paginatess("role/", $count, 5);
        //print_r($abc);
        $data['roleListing'] = $this->RoleModel->getRoles($searchText, $abc["page"], $abc["segment"]);        
        $this->templates->set_title('Role');

        $this->templates->view('admin/role/index', $data);
    }
    public function paginatess($link, $count, $perPage, $segment = 2){
        $this->load->library ( 'pagination' );

        $config ['base_url'] = base_url () . $link;
        $config ['total_rows'] = $count;
        $config ['uri_segment'] = $segment;
        $config ['per_page'] = $perPage;
        $choice = $config['total_rows']/$config['per_page'];
        $config ['num_links'] = round($choice);
        $config ['full_tag_open'] = '<ul class="pagination hidden-xs pull-right">';
        $config ['full_tag_close'] = '</ul>';
        $config ['first_tag_open'] = '<li class="arrow">';
        $config ['first_link'] = 'First';
        $config ['first_tag_close'] = '</li>';
        $config ['prev_link'] = 'Previous';
        $config ['prev_tag_open'] = '<li class="arrow">';
        $config ['prev_tag_close'] = '</li>';
        $config ['next_link'] = 'Next';
        $config ['next_tag_open'] = '<li class="arrow">';
        $config ['next_tag_close'] = '</li>';
        $config ['cur_tag_open'] = '<li class="active"><a href="#">';
        $config ['cur_tag_close'] = '</a></li>';
        $config ['num_tag_open'] = '<li>';
        $config ['num_tag_close'] = '</li>';
        $config ['last_tag_open'] = '<li class="arrow">';
        $config ['last_link'] = 'Last';
        $config ['last_tag_close'] = '</li>';
        $config['cur_page'] = $this->uri->segment($segment) ? $this->uri->segment($segment): '1';
        
    
        $this->pagination->initialize ( $config );
        $page = $config ['per_page'];
        $segment = $this->uri->segment($segment);
          
        return array (
                "page" => $page,
                "segment" => $segment
        );

    }
    public function addRole(){
        $this->templates->set_title('Add Role');
        $this->templates->view('admin/role/create');
    }
    public function addRoleSuc(){
        $this->form_validation->set_rules('role', 'Role', 'required|is_unique[tbl_roles.role]');
        if ($this->form_validation->run() == FALSE) {
            $messge = array(
                          'message' => validation_errors(),
                          'class'   => 'alert alert-danger alert-dismissable fade in'
                      );
            $this->session->set_flashdata('item', $messge);
            $this->addRole();
        } else {
            $role = $this->input->post('role');
            $data = array(
                    'role' => $role
                    );
            $result = $this->RoleModel->insertRole($data);
            if ($result) {
                $messge = array(
                           'message' => 'Role Inserted Successfully',
                           'class'   => 'alert alert-success alert-dismissable fade in'
                          );
                $this->session->set_flashdata('item', $messge);
                redirect('/role','refresh');
            } else {
                $messge = array(
                           'message' => 'Role Failed To Inserted',
                           'class'   => 'alert alert-danger alert-dismissable fade in'
                          );
                $this->session->set_flashdata('item', $messge);
                $this->addRole();
            }
        }       
    }
    public function editRole($roleId){
        $data['roleInfo'] = $this->RoleModel->getRoleInfo($roleId);

        $this->templates->set_title('Edit Role');
        $this->templates->view('admin/role/edit', $data);
    }
    public function updateRole(){
        $roleId = $this->input->post('roleId');
        $this->form_validation->set_rules('role', 'Role', 'required|is_unique[tbl_roles.role]');
        if ($this->form_validation->run() == FALSE) {
            $messge = array(
                          'message' => validation_errors(),
                          'class'   => 'alert alert-danger alert-dismissable fade in'
                      );
            $this->session->set_flashdata('item', $messge);
            $this->editRole($roleId);
        } else {
            $role = $this->input->post('role');

            $data = array(                    
                    'role'    => $role
                    );
            $result = $this->RoleModel->updateRole($data, $roleId);
            if ($result) {
                $messge = array(
                           'message' => 'Role Updated Successfully',
                           'class'   => 'alert alert-success alert-dismissable fade in'
                          );
                $this->session->set_flashdata('item', $messge);
                redirect('/role','refresh');
            } else {
                $messge = array(
                           'message' => 'Role Failed To Updated',
                           'class'   => 'alert alert-danger alert-dismissable fade in'
                          );
                $this->session->set_flashdata('item', $messge);
                $this->editRole($roleId);
            }
        }        
    }
    public function delRole(){
        $roleId = $this->input->post('id');
        $delete = $this->RoleModel->delRoleInfo($roleId);
        echo '<div class="alert alert-success alert-dismissable fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Data Deleted Successfully
                </div>';
    }
}    


