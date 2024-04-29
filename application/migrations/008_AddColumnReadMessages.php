<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_AddColumnReadMessages extends CI_Migration {

	/**
	 * Name of the table to be used in this migration!
	 *
	 * @var string
	 */
	protected $_table_name = "messages";

	public function up()
	{
		
		$this->dbforge->add_column($this->_table_name, "`read` ENUM('y','n') AFTER `type`");
	}

	public function down()
	{
		$this->dbforge->drop_column($this->_table_name, 'read');
	}

}

?>