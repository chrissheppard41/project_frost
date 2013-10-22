<?php
/**
 * OptionUpgradeFixture
 *
 */
class OptionUpgradeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'enhancements_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'by' => array('type' => 'integer', 'null' => true, 'default' => null),
		'addition' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'options_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_option_upgrades_options1_idx' => array('column' => 'options_id', 'unique' => 0),
			'fk_option_upgrades_enhancements1_idx' => array('column' => 'enhancements_id', 'unique' => 0)
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
			'enhancements_id' => 1,
			'by' => 1,
			'addition' => 'Lorem ipsum dolor sit ame',
			'options_id' => 1,
			'created' => '2013-10-22 14:50:39',
			'modified' => '2013-10-22 14:50:39'
		),
	);

}
