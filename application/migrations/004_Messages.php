<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Messages extends CI_Migration {

	/**
	 * Name of the table to be used in this migration!
	 *
	 * @var string
	 */
	protected $_table_name = "messages";

	public function up()
	{
		$fields = array(
			'id' => array(
		                    'type' => 'BIGINT',
		                    'constraint' => 24,
		                    'unsigned' => TRUE,
		                    'auto_increment' => TRUE
		    ),
			'user_id' => array(
								'type' => 'INT',
								'constraint' => 11,
			                    'unsigned' => TRUE
			),
			'session_id' => array(
								'type' => 'CHAR',
								'constraint' => 24
			),
			'chat' => array(
								'type' => 'TEXT'
			),
			'customer_phone' => array(
								'type' => 'CHAR',
								'constraint' => 13
			),
		);
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_field("`status` ENUM('in','out')");
		$this->dbforge->add_field("`type` ENUM('text','file', 'image')");
		$this->dbforge->add_field("`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$this->dbforge->add_field("`updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$this->dbforge->create_table($this->_table_name, TRUE);


		// adding foreign key using fk_helper
		/*
			Always check referenced primary key field properties, should be same with FK properties
		*/
		$this->db->query(add_foreign_key($this->_table_name, 'user_id', 'user(id)', 'CASCADE', 'CASCADE'));
		$this->db->query(add_foreign_key($this->_table_name, 'session_id', 'sessions(session_id)', 'CASCADE', 'CASCADE'));
	}

	public function down()
	{
		// delete foreign key by fk_helper
		$this->db->query(drop_foreign_key($this->_table_name, 'user_id'));
		$this->db->query(drop_foreign_key($this->_table_name, 'session_id'));

		$this->dbforge->drop_table($this->_table_name, TRUE);
	}

}

?>