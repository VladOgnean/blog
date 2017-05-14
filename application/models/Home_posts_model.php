<?php

class Home_posts_model extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public $rules = array(
    'title' => array('field'=>'title','label'=>'title','rules'=>'required|trim|xss_clean'),
    'description' => array('field'=>'description','label'=>'description','rules'=>'required|trim|xss_clean'),
    'description2' => array('field'=>'description2','label'=>'description2','rules'=>'required|trim|xss_clean'),
    'youtube' => array('field'=>'youtube','label'=>'youtube','rules'=>'required|trim|xss_clean'),
    'first_image' => array('field'=>'first_image','label'=>'first image','rules'=>'required'),
    'first_image' => array('field'=>'first_image','label'=>'first image','rules'=>'callback_fileupload_check[first_image]'),
    'second_image' => array('field'=>'second_image','label'=>'second image','rules'=>'required'),
    'second_image' => array('field'=>'second_image','label'=>'second image','rules'=>'callback_fileupload_check[second_image]'),
    'third_image' => array('field'=>'third_image','label'=>'third image','rules'=>'required'),
    'third_image' => array('field'=>'third_image','label'=>'third image','rules'=>'callback_fileupload_check[third_image]')
  );
}

?>