<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_date_personale_membri_table extends CI_Migration {

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
      'nume' => array(
        'type' => 'VARCHAR',
        'constraint' => 50
      ),
      'prenume' => array(
        'type' => 'VARCHAR',
        'constraint' => 50
      ),
      'email' => array(
        'type' => 'VARCHAR',
        'constraint' => 50
      )
    );

    $this->dbforge->add_field($fields);
    $this->dbforge->add_key('id',TRUE);
    $this->dbforge->create_table('date_personale_membri', TRUE);
  }

  public function down()
  {
    $this->dbforge->drop_table('date_personale_membri', TRUE);
  }
}
?>