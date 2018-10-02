<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->isLoggedIn();
        $this->load->library('Templates');
        
    }
    public function isLoggedIn(){
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE){
            redirect ('login');        
        }        
    }
    public function index(){
        $this->global['pageTitle'] = 'Admin | Dashboard';
        loadViews('admin/dashboard', $this->global, NULL);
    }
    public function user(){
        $this->global['pageTitle'] = 'Admin | User Listing';
        loadViews('admin/user/index', $this->global, NULL);
    }
    public function addUser(){
        $data['roleListing'] = $this->RoleModel->getRoles(NULL,NULL,NULL);
        $this->templates->set_title('Add User');
        $this->templates->view('admin/user/create', $data);
    }
}    


