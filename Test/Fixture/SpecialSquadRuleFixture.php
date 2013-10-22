<?php
/**
 * SpecialSquadRuleFixture
 *
 */
class SpecialSquadRuleFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'special_rules_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'squads_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_special_squad_rules_special_rules1_idx' => array('column' => 'special_rules_id', 'unique' => 0),
			'fk_special_squad_rules_squads1_idx' => array('column' => 'squads_id', 'unique' => 0)
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
			'special_rules_id' => 1,
			'squads_id' => 1
		),
	);

}
