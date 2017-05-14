<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_news_posts_table extends CI_Migration {

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
      'description' => array(
        'type' => 'TEXT'
      ),
      'title' => array(
        'type' => 'VARCHAR',
        'constraint' => 255
      ),
      'link' => array(
        'type' => 'VARCHAR',
        'constraint' => 255
      ),
      'image' => array(
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
    $this->dbforge->create_table('news_posts',TRUE);
  }

  public function down()
  {
    $this->dbforge->drop_table('news_posts', TRUE);
  }
}
?>