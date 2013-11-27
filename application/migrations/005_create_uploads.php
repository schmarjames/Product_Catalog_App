<?php
class Migration_Create_uploads extends CI_Migration {

	public function up() 
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'description' => array(
				'type' => 'TEXT',
				'constraint' => '4000',
			),
			'file_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '60',
			),
			'file_path' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'file_size' => array(
				'type' => 'FLOAT',
				'constraint' => 11,
			),
			'file_type' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
			),
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('uploads');
	}

	public function down() 
	{
		$this->dbforge->drop_table('uploads');
	}
}