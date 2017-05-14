<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Date_personale_membri extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Date_personale_membri_model');
  }

  public function index()
  {
    $data['date_personale_membri'] = $this->Date_personale_membri_model->db->order_by("id", "desc")->get('date_personale_membri')->result_array();
    $this->load->view("layout/header");
    $this->load->view("date_personale_membri_view/index", $data);
    $this->load->view("layout/footer");
  }

  public function create()
  {
    $this->load->helper('email');
    $this->load->helper('security');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('nume', 'First name', 'required|trim|alpha|xss_clean');
    $this->form_validation->set_rules('prenume', 'Last name', 'required|trim|alpha|xss_clean');
    $this->form_validation->set_rules('email', 'e-mail', 'required|xss_clean|trim|valid_email');

    if ($this->form_validation->run() == FALSE)
    {
      $this->load->view("layout/header");
      $this->load->view('date_personale_membri_view/index');
      $this->load->view("layout/footer");
    }
    else
    {
// a trecut validarea

      $data = array(
        'nume' => $this->input->post('nume'),
        'prenume' => $this->input->post('prenume'),
        'email' => $this->input->post('email'),
      );

      $this->Date_personale_membri_model->db->insert('date_personale_membri', $data);
      redirect('http://localhost/blog/date_personale_membri?success=true');
    }
  }
}