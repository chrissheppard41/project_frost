<?php
/**
 * ArmyListFixture
 *
 */
class ArmyListFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'army_list';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'descr' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'point_limit' => array('type' => 'integer', 'null' => false, 'default' => null),
		'hide' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'rate' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1),
		'races_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'users_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_armyList_playerRaces1' => array('column' => 'races_id', 'unique' => 0),
			'fk_armyList_users1' => array('column' => 'users_id', 'unique' => 0)
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
			'descr' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'point_limit' => 1,
			'hide' => 1,
			'code' => 'Lorem ipsum dolor sit amet',
			'rate' => 1,
			'races_id' => 1,
			'users_id' => 1,
			'created' => '2013-10-22 09:19:23',
			'modified' => '2013-10-22 09:19:23'
		),
		array(
			'id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'descr' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'point_limit' => 2,
			'hide' => 0,
			'code' => 'Lorem ipsum dolor sit amet',
			'rate' => 1,
			'races_id' => 1,
			'users_id' => 1,
			'created' => '2013-10-22 09:19:23',
			'modified' => '2013-10-22 09:19:23'
		),
	);

}
