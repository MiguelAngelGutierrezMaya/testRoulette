<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_Persons extends CI_Migration
{

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 10,
				'unsigned' => TRUE, //No se puede almacenar valores negativos si es TRUE
				'auto_increment' => TRUE
			),
			'names' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			),
			'surnames' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '80',
				'null' => TRUE,
			),
			'state' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				'null' => TRUE,
				'default' => 1,
			),
			'total_amount' => array(
				'type' => 'INT',
				'constraint' => 10,
				'unsigned' => TRUE,
				'null' => TRUE,
				'default' => 0,
			),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('persons');
	}

	public function down()
	{
		$this->dbforge->drop_table('persons');
	}
}
