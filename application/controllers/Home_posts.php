<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_posts extends CI_Controller {

  private $_uploaded_first_image_path;
  private $_uploaded_second_image_path;
  private $_uploaded_third_image_path;
  private $_youtube_url;

  public function __construct() {
    parent::__construct();
    $this->load->model('Home_posts_model');
  }

	public function index()
	{
		$data['home_posts'] = $this->Home_posts_model->db->order_by("id", "desc")->get('home_posts')->result_array();

		$this->load->view("layout/header");
		$this->load->view("home_posts_view/index", $data);
		$this->load->view("layout/footer");
	}

  public function create()
  {
    $this->load->helper('security');
    $this->load->library('form_validation');

    $this->form_validation->set_rules($this->Home_posts_model->rules);

    if ($this->form_validation->run() == FALSE) {
      echo validation_errors();
    } else {
      // a trecut validarea

      $this->_youtube_url = explode("?v=", $this->input->post('youtube')); // if youtube url contains ?v= => ["youtube..", video_id] else ["...yotube.com/embed/video_id"]
      if(count($this->_youtube_url) == 1)
        $this->_youtube_url = $this->_youtube_url[0];
      else
        $this->_youtube_url = "https://youtube.com/embed/".$this->_youtube_url[1];
      $data = array(
        'title' => $this->input->post('title'),
        'description' => $this->input->post('description'),
        'description2' => $this->input->post('description2'),
        'author' => $this->input->post('author'),
        'youtube' => $this->_youtube_url,
        'first_image' => $this->_uploaded_first_image_path,
        'second_image' => $this->_uploaded_second_image_path,
        'third_image' => $this->_uploaded_third_image_path
      );
      $this->Home_posts_model->db->insert('home_posts', $data);

      $id = $this->db->insert_id();
      $data["obj"] = $this->db->get_where('home_posts', array('id' => $id))->row_array();
      $this->load->view("home_posts_view/item", $data);
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