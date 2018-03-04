<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ErrorController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('Templates');
		$this->isLoggedIn();


	}
	public function isLoggedIn(){
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE){
            redirect ('login');        
        }        
    }
	public function index(){
        $this->templates->view('admin/err404');

	}
}	
