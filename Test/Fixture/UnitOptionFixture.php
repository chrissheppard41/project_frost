<?php
/**
 * UnitOptionFixture
 *
 */
class UnitOptionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'units_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'options_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_unit_weapons_units1_idx' => array('column' => 'units_id', 'unique' => 0),
			'fk_unit_weapons_options1_idx' => array('column' => 'options_id', 'unique' => 0)
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
			'units_id' => 1,
			'options_id' => 1
		),
	);

}
