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
		'app.special_squad_rule'
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
		/*$Squads = $this->generate('Squads', array(
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
*/
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
}
