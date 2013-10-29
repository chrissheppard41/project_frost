<?php
App::uses('SquadsController', 'Controller');

/**
 * SquadsController Test Case
 *
 */
class SquadsControllerTest extends ControllerTestCase {

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
 * testAdminIndex method
 *
 * @return void
 */
	public function testAdminIndex() {
	}

/**
 * testAdminView method
 *
 * @return void
 */
	public function testAdminView() {
	}

/**
 * testAdminAdd method
 *
 * @return void
 */
	public function testAdminAdd() {
	}

/**
 * testAdminEdit method
 *
 * @return void
 */
	public function testAdminEdit() {
	}

/**
 * testAdminDelete method
 *
 * @return void
 */
	public function testAdminDelete() {
	}

/**
 * testSquads method
 *
 * @return void
 */
	public function testSquads() {
		$Squads = $this->generate('Squads', array(
			'components' => array(
				'Auth' => array('user'),
				'Session'
			)
		));
		$Squads->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(true));
		$Squads->Session->expects($this->any())
			->method('read')
			->with()
			->will($this->returnValue(array('access' => 'testing_purposes_only', 'time' => time())));


        @Cache::delete('_race_1', 'squads');
		$this->testAction(
			'/squads/1',
			array('data' => array('access' => 'testing_purposes_only'), 'method' => 'get')
		);

		$expected = array(
			'status' => 'OK',
			'code' => (int) 200,
			'message' => 'Squads',
			'data' => array(
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
							'sargeant' => '1',
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
					)
				)
			),
			'errors' => null
		);

		$this->assertEquals($expected, $this->vars['response']);
        @Cache::delete('_race_1', 'squads');
	}

/**
 * testSquadsForbiddenException method exception
 * @expectedException ForbiddenException
 *
 * @return void
 */
	public function testSquadsForbiddenException() {
		$Squads = $this->generate('Squads', array(
			'components' => array(
				'Auth' => array('user'),
				'Session'
			)
		));
		$Squads->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(false));
		$Squads->Session->expects($this->any())
			->method('read')
			->with()
			->will($this->returnValue(array('access' => 'testing_purposes_only', 'time' => time())));

		$this->testAction(
			'/squads/1',
			array('data' => array('access' => 'testing_purposes_only'), 'method' => 'get')
		);
	}

/**
 * testSquadsBadRequestException method exception
 * @expectedException BadRequestException
 *
 * @return void
 */
	public function testSquadsBadRequestException() {
		$this->testAction(
			'/squads/1',
			array('method' => 'get')
		);
	}

/**
 * testSquadsBadAccessBadRequestException method exception
 * @expectedException BadRequestException
 *
 * @return void
 */
	public function testSquadsBadAccessBadRequestException() {
		$Squads = $this->generate('Squads', array(
			'components' => array(
				'Auth' => array('user'),
				'Session'
			)
		));
		$Squads->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(true));

		$this->testAction(
			'/squads/1',
			array('data' => array('access' => 'testing_purposes_only'), 'method' => 'get')
		);
	}






/**
 * testSquad_unit method
 *
 * @return void
 */
	public function testSquad_unit() {
		$Squads = $this->generate('Squads', array(
			'components' => array(
				'Auth' => array('user'),
				'Session'
			)
		));
		$Squads->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(true));
		$Squads->Session->expects($this->any())
			->method('read')
			->with()
			->will($this->returnValue(array('access' => 'testing_purposes_only', 'time' => time())));


        @Cache::delete('_squad_unit_1', 'squads');
        @Cache::delete('_unit_1', 'units');
        @Cache::delete('_group_1', 'options');

		$this->testAction(
			'/squads_unit/1',
			array('data' => array('access' => 'testing_purposes_only'), 'method' => 'get')
		);

		$expected = array(
			'status' => 'OK',
			'code' => (int) 200,
			'message' => 'Squads',
			'data' => array(
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
			),
			'errors' => null
		);

		$this->assertEquals($expected, $this->vars['response']);
        @Cache::delete('_squad_unit_1', 'squads');
        @Cache::delete('_unit_1', 'units');
        @Cache::delete('_group_1', 'options');

	}

/**
 * testSquad_unitForbiddenException method exception
 * @expectedException ForbiddenException
 *
 * @return void
 */
	public function testSquad_unitForbiddenException() {
		$Squads = $this->generate('Squads', array(
			'components' => array(
				'Auth' => array('user'),
				'Session'
			)
		));
		$Squads->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(false));
		$Squads->Session->expects($this->any())
			->method('read')
			->with()
			->will($this->returnValue(array('access' => 'testing_purposes_only', 'time' => time())));

		$this->testAction(
			'/squads_unit/1',
			array('data' => array('access' => 'testing_purposes_only'), 'method' => 'get')
		);
	}

/**
 * testSquad_unitBadRequestException method exception
 * @expectedException BadRequestException
 *
 * @return void
 */
	public function testSquad_unitBadRequestException() {
		$this->testAction(
			'/squads_unit/1',
			array('method' => 'get')
		);
	}

/**
 * testSquad_unitBadAccessBadRequestException method exception
 * @expectedException BadRequestException
 *
 * @return void
 */
	public function testSquad_unitBadAccessBadRequestException() {
		$Squads = $this->generate('Squads', array(
			'components' => array(
				'Auth' => array('user'),
				'Session'
			)
		));
		$Squads->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(true));

		$this->testAction(
			'/squads_unit/1',
			array('data' => array('access' => 'testing_purposes_only'), 'method' => 'get')
		);
	}

}
