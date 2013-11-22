<?php
class Migration_Create_product_images extends CI_Migration {

	public function up() 
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'product_id' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
			'file_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '60',
			),
			'file_path' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'orig_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '60',
			),
			'file_size' => array(
				'type' => 'FLOAT',
				'constraint' => 11,
			),
			'image_width' => array(
				'type' => 'INT',
				'constraint' => 4,
			),
			'image_height' => array(
				'type' => 'INT',
				'constraint' => 4,
			),
			'file_type' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
			),
			'image_type' => array(
				'type' => 'VARCHAR',
				'constraint' => 5,
			),
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('product_images');
	}

	public function down() 
	{
		$this->dbforge->drop_table('product_images');
	}
}