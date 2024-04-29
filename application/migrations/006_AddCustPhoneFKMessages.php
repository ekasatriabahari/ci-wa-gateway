<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_AddCustPhoneFKMessages extends CI_Migration {

	/**
	 * Name of the table to be used in this migration!
	 *
	 * @var string
	 */
	protected $_table_name = "messages";

	public function up()
	{
		// adding foreign key using fk_helper
		/*
			Always check referenced primary key field properties, should be same with FK properties
		*/
		$this->db->query(add_foreign_key($this->_table_name, 'customer_phone', 'customer(customer_phone)', 'CASCADE', 'CASCADE'));
	}

	public function down()
	{
		// delete foreign key by fk_helper
		$this->db->query(drop_foreign_key($this->_table_name, 'customer_phone'));	
	}

}

?>