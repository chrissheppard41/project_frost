<?php
/**
 * SquadUnitFixture
 *
 */
class SquadUnitFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'min_count' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3),
		'max_count' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3),
		'squads_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'units_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_squad_bridge_1_idx' => array('column' => 'squads_id', 'unique' => 0),
			'fk_squad_bridge_2_idx' => array('column' => 'units_id', 'unique' => 0)
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
			'squads_id' => 1,
			'units_id' => 1,
			'created' => '2013-10-22 14:51:37',
			'modified' => '2013-10-22 14:51:37'
		),
	);

}
