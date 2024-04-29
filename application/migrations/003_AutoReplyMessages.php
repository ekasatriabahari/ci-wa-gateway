<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_AutoReplyMessages extends CI_Migration {

	/**
	 * Name of the table to be used in this migration!
	 *
	 * @var string
	 */
	protected $_table_name = "auto_reply_messages";

	public function up()
	{
		$fields = array(
			'id' => array(
		                    'type' => 'INT',
		                    'constraint' => 11,
		                    'unsigned' => TRUE,
		                    'auto_increment' => TRUE
		    ),
			'user_id' => array(
								'type' => 'INT',
								'constraint' => 11,
			                    'unsigned' => TRUE
			),
			'ref_code' => array(
								'type' => 'CHAR',
								'constraint' => 8
			),
			'content' => array(
								'type' => 'TEXT'
			),
		);
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_field("`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$this->dbforge->add_field("`updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$this->dbforge->create_table($this->_table_name, TRUE);

		// adding foreign key using fk_helper
		/*
			Always check referenced primary key field properties, should be same with FK properties
		*/
		$this->db->query(add_foreign_key($this->_table_name, 'user_id', 'user(id)', 'CASCADE', 'CASCADE'));
	}

	public function down()
	{
		// delete foreign key by fk_helper
		$this->db->query(drop_foreign_key($this->_table_name, 'user_id'));


		$this->dbforge->drop_table($this->_table_name, TRUE);
	}

}

?>