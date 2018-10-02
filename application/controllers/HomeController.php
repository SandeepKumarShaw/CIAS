<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->library('Layouts');
        $this->load->library('form_validation');
        $this->load->model('HomeModel');

        $this->load->helper('url');
       $this->load->library('session');

        
    }
   
    public function index(){
        $this->layouts->set_title('Home');
        $this->layouts->view('FrontEnd/home/index');
    }
    public function contact(){      
        $this->layouts->set_title('contact');
        $this->layouts->view('FrontEnd/contact/contact');
    }
    public function delete(){
        $contact_id = $this->input->post('contact_id');
        $result = $this->HomeModel->delete_contact($contact_id);
        echo json_encode($result);
        

       /* if ($result) {
               echo "One Record Delete Successfully!";  
        }*/
    }
    public function sendemail(){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $need = $_POST['need'];
        $message = $_POST['message'];

         $data = array(                    
                    'fname'    => $fname,
                    'lname'    => $lname,
                    'email'    => $email,
                    'need'    => $need,
                    'message'    => $message
                    );
        //$recaptchaResponse = trim($this->input->post('g-recaptcha-response')); 
       // $userIp=$this->input->ip_address();     
        $secret = $this->config->item('google_secret');
     

        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');

 
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_contact.email]');
        $this->form_validation->set_rules('need', 'Need', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');
        $this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'required'); 

       
         $captcha = $this->input->post('g-recaptcha-response');
         $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
         $status= json_decode($response, true);

                
        if ( $this->form_validation->run() == FALSE) {
             echo $errors = validation_errors();
        }else{
            if (!empty($status['success'])) {
                $result = $this->HomeModel->sendContact($data);
                if ($result) {
                   echo "success";  
                }
            }           
        }
    }
    public function getData(){
     $data['contactListing'] = $this->HomeModel->getContacts();

    // var_dump($data['contactListing']);  

    echo json_encode($data['contactListing']);     

        //$this->layouts->view('FrontEnd/contact/contact',$data);
    }
    
}    


