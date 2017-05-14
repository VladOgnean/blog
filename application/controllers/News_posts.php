<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_posts extends CI_Controller {

  private $_uploaded_image_path;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('News_posts_model');
  }

  public function index()
  {
    $data['news_posts'] = $this->News_posts_model->db->order_by("id", "desc")->get('news_posts')->result_array();
    $this->load->view("layout/header");
    $this->load->view("news_posts_view/index", $data);
    $this->load->view("layout/footer");
  }

  public function create()
  {
    $this->load->helper('security');
    $this->load->library('form_validation');

    $this->form_validation->set_rules($this->News_posts_model->rules);

    if ($this->form_validation->run() == FALSE) {
      echo validation_errors();
    } else {
      $data = array(
        'title' => $this->input->post('title'),
        'description' => $this->input->post('description'),
        'author' => $this->input->post('author'),
        'link' => $this->input->post('link'),
        'image' => $this->_uploaded_image_path,
      );
      $this->News_posts_model->db->insert('news_posts', $data);

      $id = $this->db->insert_id();
      $data["obj"] = $this->db->get_where('news_posts', array('id' => $id))->row_array();
      $this->load->view("news_posts_view/item", $data);
    }
  }

  public function fileupload_check($file, $image_name)
  {
    if($_FILES[$image_name]['error'] != 0)
    {
      $this->form_validation->set_message($image_name, 'Couldn\'t upload the file');
      return FALSE;
    }
    $config['upload_path'] = FCPATH . 'upload/';
    $config['allowed_types'] = 'gif|jpg|png';
    $this->upload->initialize($config);
    if($this->upload->do_upload($image_name))
    {
      $this->{'_uploaded_'.$image_name.'_path'} = "upload/".$this->upload->data()["file_name"];
      return TRUE;
    }
    else
    {
      $this->form_validation->set_message($image_name, $this->upload->display_errors());
      return TRUE;
    }
  }
}