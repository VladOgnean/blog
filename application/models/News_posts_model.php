<?php

class News_posts_model extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public $rules = array(
    'title' => array('field'=>'title','label'=>'title','rules'=>'required|trim|xss_clean'),
    'description' => array('field'=>'description','label'=>'description','rules'=>'required|trim|xss_clean'),
    'link' => array('field'=>'link','label'=>'link','rules'=>'required|trim|xss_clean'),
    'image' => array('field'=>'image','label'=>'image','rules'=>'required'),
    'image' => array('field'=>'image','label'=>'image','rules'=>'callback_fileupload_check[image]')
  );
}

?>