<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_home_posts_table extends CI_Migration {

  public function __construct()
  {
    parent::__construct();
    $this->load->dbforge();
  }

  public function up()
  {
    $fields = array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'title' => array(
        'type' => 'VARCHAR',
        'constraint' => 255
      ),
      'description' => array(
        'type' => 'VARCHAR',
        'constraint' => 255
      ),
      'youtube' => array(
        'type' => 'VARCHAR',
        'constraint' => 255
      ),
      'first_image' => array(
        'type' => 'VARCHAR',
        'constraint' => 255
      ),
      'second_image' => array(
        'type' => 'VARCHAR',
        'constraint' => 255
      ),
      'third_image' => array(
        'type' => 'VARCHAR',
        'constraint' => 255
      ),
      'description2' => array(
        'type' => 'VARCHAR',
        'constraint' => 255
      ),
      'author' => array(
        'type' => 'VARCHAR',
        'constraint' => 255
      )
    );

    $this->dbforge->add_field($fields);
    $this->dbforge->add_key('id',TRUE);
    $this->dbforge->create_table('home_posts', TRUE);
  }

  public function down()
  {
    $this->dbforge->drop_table('home_posts', TRUE);
  }
}
?>