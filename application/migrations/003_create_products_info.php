<?php
class Migration_Create_products_info extends CI_Migration {

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
			'price' => array(
				'type' => 'INT',
				'constraint' => '11',
			),
			'description' => array(
				'type' => 'TEXT',
				'constraint' => '4000',
			),
			'highlight_message1' => array(
				'type' => 'VARCHAR',
				'constraint' => '200',
			),
			'highlight_message2' => array(
				'type' => 'VARCHAR',
				'constraint' => '200',
			),
			'bullet_list_title1' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'bullet_point1_1' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'bullet_point1_2' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'bullet_point1_3' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'bullet_point1_4' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'bullet_point1_5' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'bullet_list_title2' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'bullet_point2_1' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'bullet_point2_2' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'bullet_point2_3' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'bullet_point2_4' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'bullet_point2_5' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'warranty_message' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			)
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('products_info');
	}

	public function down() 
	{
		$this->dbforge->drop_table('products_info');
	}
}