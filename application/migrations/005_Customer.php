<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Customer extends CI_Migration {

	/**
	 * Name of the table to be used in this migration!
	 *
	 * @var string
	 */
	protected $_table_name = "customer";

	public function up()
	{
		$fields = array(
			'customer_phone' => array(
		                    	'type' => 'CHAR',
								'constraint' => 13
		    ),
		);
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('customer_phone', TRUE);
		$this->dbforge->add_field("`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$this->dbforge->add_field("`updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$this->dbforge->create_table($this->_table_name, TRUE);
		$this->dbforge->add_column($this->_table_name, "`contact_admin` ENUM('y','n')", 'customer_phone');
	}

	public function down()
	{
		$this->dbforge->drop_table($this->_table_name, TRUE);
	}

}

?>