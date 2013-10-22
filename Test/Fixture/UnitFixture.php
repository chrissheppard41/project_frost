<?php
/**
 * UnitFixture
 *
 */
class UnitFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'sargeant' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'weapon_skill' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'ballistic_skill' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'strength' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'toughness' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'initiative' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'wounds' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'attacks' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'leadership' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'armour_save' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'invulnerable_save' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'pts' => array('type' => 'integer', 'null' => false, 'default' => null),
		'unit_types_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'races_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_units_unit_type1_idx' => array('column' => 'unit_types_id', 'unique' => 0),
			'fk_units_races1_idx' => array('column' => 'races_id', 'unique' => 0)
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
			'sargeant' => 1,
			'weapon_skill' => 1,
			'ballistic_skill' => 1,
			'strength' => 1,
			'toughness' => 1,
			'initiative' => 1,
			'wounds' => 1,
			'attacks' => 1,
			'leadership' => 1,
			'armour_save' => 1,
			'invulnerable_save' => 1,
			'pts' => 1,
			'unit_types_id' => 1,
			'races_id' => 1,
			'created' => '2013-10-22 14:48:59',
			'modified' => '2013-10-22 14:48:59'
		),
	);

}
