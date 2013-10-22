<?php
/**
 * SpecialRuleFixture
 *
 */
class SpecialRuleFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'races_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'race_types_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_special_rules_races1_idx' => array('column' => 'races_id', 'unique' => 0),
			'fk_special_rules_1_idx' => array('column' => 'race_types_id', 'unique' => 0)
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
			'race_types_id' => 1,
			'created' => '2013-10-22 14:50:52',
			'modified' => '2013-10-22 14:50:52'
		),
	);

}
