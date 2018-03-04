<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {	
	public function __construct(){
        parent::__construct();
        $this->load->model('LoginModel');
    }    
    public function login(){
        //$this->load->view('admin/login');
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE){
            $this->load->view('admin/login');        
        } else {
            redirect('/dashboard');
        } 
    }
    public function loginme(){
        
        $this->form_validation->set_rules('email', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE){
            $messge = array(
                          'message' => validation_errors(),
                          'class'   => 'alert alert-danger alert-dismissable fade in'
                      );
            $this->session->set_flashdata('item', $messge);
            $this->load->view('admin/login');
        }else{
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $result = $this->LoginModel->logincheck($email, $password);

            if ($result) {
                foreach ($result as $results) {
                    
                    $sessionArray = array(
                                  'userId'      => $results->userId,
                                  'email'       => $results->email,
                                  'mobile'      => $results->mobile,
                                  'name'        => $results->name,
                                  'isLoggedIn' => TRUE
                                );
                    $this->session->set_userdata($sessionArray);       
                    redirect('/dashboard');
                }               
                
            } else {
                $messge = array(
                          'message' => 'Login failed!',
                          'class'   => 'alert alert-danger alert-dismissable fade in'
                          );
                $this->session->set_flashdata('item', $messge);
                $this->load->view('admin/login');
            }
            
        }
    }
    public function isLoggedIn(){
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE){
            $this->load->view('admin/login');        
        } else {
            redirect('/dashboard');
        }        
    }
    public function logout(){
        $this->session->unset_userdata('isLoggedIn');
        $this->session->unset_userdata('userId');
        //$this->session->sess_destroy();
        $messge = array(
                    'message' => 'Logout successfully!',
                    'class'   => 'alert alert-success alert-dismissable'
                  );
        $this->session->set_userdata('item', $messge);   

        redirect('/login');
    }
    
}
