<?php
/**
 * SquadFixture
 *
 */
class SquadFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'races_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'types_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_squads_races1_idx' => array('column' => 'races_id', 'unique' => 0),
			'fk_squads_types1_idx' => array('column' => 'types_id', 'unique' => 0)
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
			'name' => 'Lorem ipsum dolor sit amet',
			'races_id' => 1,
			'types_id' => 1,
			'created' => '2013-10-22 14:47:08',
			'modified' => '2013-10-22 14:47:08'
		),
	);

}
