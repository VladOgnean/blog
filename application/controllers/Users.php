<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Users_model','',TRUE);
  }

  public function login()
{

//This method will have the credentials validation
  $this->load->helper('security');
  $this->load->library('form_validation');
  $this->load->helper('email');
  $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|required|valid_email');
  $this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|alpha|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
//Field validation failed.  User redirected to login page
    $this->load->view("layout/header");
    $this->load->view('users_view/login');
    $this->load->view("layout/footer");
   }
  else
  {
//Go to private area
    $this->load->view("layout/header");
    $this->load->view('admin_view/index');
    $this->load->view("layout/footer");
  }
}

public function logout()
{
  $this->session->sess_destroy();
  redirect(base_url());
}

  public function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $email = $this->input->post('email');
//query the database
   $row = $this->Users_model->login($email, $password);

   if($row != false) {
    $sess_array = array(
        'id' => $row->id,
        'email' => $row->email,
        'user_name' => $row->user_name
        );
       $this->session->set_userdata('logged_in', $sess_array);
       //$this->load->view('users_view/login', $sess_array);
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid email or password');
     return FALSE;
   }
 }
}

