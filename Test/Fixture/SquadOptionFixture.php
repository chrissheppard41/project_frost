<?php
/**
 * SquadOptionFixture
 *
 */
class SquadOptionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'min_count' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3),
		'max_count' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3),
		'groups_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'squad_units_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_squad_options_groups1_idx' => array('column' => 'groups_id', 'unique' => 0),
			'fk_squad_options_squad_units1_idx' => array('column' => 'squad_units_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'min_count' => 1,
			'max_count' => 1,
			'groups_id' => 1,
			'squad_units_id' => 1,
			'modified' => '2013-10-29 17:51:07'
		),
	);

}
