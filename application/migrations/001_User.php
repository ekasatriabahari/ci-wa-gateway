<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_User extends CI_Migration {

	/**
	 * Name of the table to be used in this migration!
	 *
	 * @var string
	 */
	protected $_table_name = "user";

	public function up()
	{
		$fields = array(
			'id' => array(
		                    'type' => 'INT',
		                    'constraint' => 11,
		                    'unsigned' => TRUE,
		                    'auto_increment' => TRUE
		    ),
			'username' => array(
								'type' => 'VARCHAR',
								'constraint' => 100
			),
			'password' => array(
								'type' => 'VARCHAR',
								'constraint' => 100
			),
		);
		$this->dbforge->add_field($fields);
		$this->dbforge->add_field("`role` ENUM('admin','operator')");
		$this->dbforge->add_field("`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$this->dbforge->add_field("`updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table($this->_table_name, TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table($this->_table_name, TRUE);
	}

}

?>