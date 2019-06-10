<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_Users extends CI_Migration
{

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 10,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'username' => array(
				'type' => 'VARCHAR',
				'constraint' => '30',
				'null' => FALSE,
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => '130',
				'null' => FALSE,
			),
			'last_session' => array(
				'type' => 'DATETIME',
				'null' => TRUE,
			),
			'state' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				'null' => TRUE,
				'default' => 1,
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('users');
		$this->db->query('ALTER TABLE `users` ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id`) REFERENCES `persons` (`id`) ON DELETE CASCADE');
	}

	public function down()
	{
		$this->dbforge->drop_table('users');
	}
}
