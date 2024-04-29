<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_AddColumnCustomer extends CI_Migration {

	/**
	 * Name of the table to be used in this migration!
	 *
	 * @var string
	 */
	protected $_table_name = "customer";

	public function up()
	{
		$fields = array(
				'customer_name' => array(
					'type' => 'VARCHAR',
					'constraint' => 100,
					'after' => 'customer_phone'
				)
		);
		$this->dbforge->add_column($this->_table_name, $fields);
	}

	public function down()
	{
		$this->dbforge->drop_column($this->_table_name, 'customer_name');
	}

}

?>