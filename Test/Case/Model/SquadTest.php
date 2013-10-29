<?php
App::uses('Squad', 'Model');

/**
 * Squad Test Case
 *
 */
class SquadTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.squad',
		'app.race',
		'app.type',
		'app.unit',
		'app.unit_type',
		'app.option',
		'app.group',
		'app.option_upgrade',
		'app.unit_option',
		'app.squad_unit',
		'app.special_rule',
		'app.race_type',
		'app.special_squad_rule',
		'app.squad_option'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Squad = ClassRegistry::init('Squad');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Squad);

		parent::tearDown();
	}

/**
 * testSquadData method
 *
 * @return void
 */
	public function testSquadData() {

        @Cache::delete('_squad_unit_1', 'squads');
        @Cache::delete('_unit_1', 'units');
        @Cache::delete('_group_1', 'options');

		$data = $this->Squad->squad_data(1, ClassRegistry::init('SquadOption'), ClassRegistry::init('Option'));

		$expected = array(
			(int) 0 => array(
				'Squad' => array(
					'id' => '1',
					'name' => 'Lorem ipsum dolor sit amet',
					'races_id' => '1',
					'types_id' => '1',
					'created' => '2013-10-22 14:47:08',
					'modified' => '2013-10-22 14:47:08'
				),
				'Races' => array(
					'id' => '1',
					'race_types_id' => '1',
					'name' => 'Lorem ipsum dolor sit amet',
					'created' => '2013-10-22 09:20:23',
					'modified' => '2013-10-22 09:20:23'
				),
				'Types' => array(
					'id' => '1',
					'name' => 'Lorem ipsum dolor sit amet',
					'count' => '1',
					'created' => '2013-10-22 14:48:41',
					'modified' => '2013-10-22 14:48:41'
				),
				'Unit' => array(
					(int) 0 => array(
						'id' => '1',
						'name' => 'Lorem ipsum dolor sit amet',
						'sargeant' => true,
						'weapon_skill' => '1',
						'ballistic_skill' => '1',
						'strength' => '1',
						'toughness' => '1',
						'initiative' => '1',
						'wounds' => '1',
						'attacks' => '1',
						'leadership' => '1',
						'armour_save' => '1',
						'invulnerable_save' => '1',
						'pts' => '1',
						'unit_types_id' => '1',
						'races_id' => '1',
						'created' => '2013-10-22 14:48:59',
						'modified' => '2013-10-22 14:48:59',
						'SquadUnit' => array(
							'id' => '1',
							'min_count' => '1',
							'max_count' => '1',
							'squads_id' => '1',
							'units_id' => '1',
							'created' => '2013-10-22 14:51:37',
							'modified' => '2013-10-22 14:51:37'
						),
						'unit_type' => 'Lorem ipsum dolor sit amet',
						'Wargear' => array(
							(int) 0 => array(
								'id' => '1',
								'name' => 'Lorem ipsum dolor sit amet',
								'pts' => 'Lorem ipsum dolor sit amet',
								'groups_id' => '1',
								'created' => '2013-10-22 14:49:20',
								'modified' => '2013-10-22 14:49:20',
								'UnitOption' => array(
									'id' => '1',
									'units_id' => '1',
									'options_id' => '1'
								)
							)
						),
						'Upgrade' => array(
							(int) 0 => array(
								'Groups' => array(
									'id' => '1',
									'name' => 'Lorem ipsum dolor sit amet',
									'races_id' => '1',
									'created' => '2013-10-22 14:49:29',
									'modified' => '2013-10-22 14:49:29',
									'Option' => array(
										(int) 0 => array(
											'id' => '1',
											'name' => 'Lorem ipsum dolor sit amet',
											'pts' => 'Lorem ipsum dolor sit amet',
											'groups_id' => '1',
											'created' => '2013-10-22 14:49:20',
											'modified' => '2013-10-22 14:49:20',
											'OptionUpgrades' => array(
												(int) 0 => array(
													'id' => '1',
													'enhancements_id' => '1',
													'by' => '1',
													'addition' => 'L',
													'options_id' => '1',
													'created' => '2013-10-22 14:50:39',
													'modified' => '2013-10-22 14:50:39'
												)
											)
										)
									)
								),
								'SquadOption' => array(
									'id' => '1',
									'min_count' => '1',
									'max_count' => '1',
									'groups_id' => '1',
									'squad_units_id' => '1',
									'modified' => '2013-10-29 17:51:07'
								)
							)
						)
					)
				),
				'SpecialRule' => array(
					(int) 0 => array(
						'id' => '1',
						'name' => 'Lorem ipsum dolor sit amet',
						'races_id' => '1',
						'race_types_id' => '1',
						'created' => '2013-10-22 14:50:52',
						'modified' => '2013-10-22 14:50:52',
						'SpecialSquadRule' => array(
							'id' => '1',
							'special_rules_id' => '1',
							'squads_id' => '1'
						)
					)
				),
				'Unit_wargear' => array(
					(int) 0 => 'Lorem ipsum dolor sit amet'
				)
			)
		);
		$this->assertEquals($expected, $data);
        @Cache::delete('_squad_unit_1', 'squads');
        @Cache::delete('_unit_1', 'units');
        @Cache::delete('_group_1', 'options');
	}

}
