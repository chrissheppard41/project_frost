<?php
App::uses('UnitsController', 'Controller');

/**
 * UnitsController Test Case
 *
 */
class UnitsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.unit',
		'app.race',
		'app.unit_type',
		'app.option',
		'app.group',
		'app.option_upgrade',
		'app.unit_option',
		'app.squad',
		'app.type',
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
 * testGetUnitNotFoundException method
 * @expectedException NotFoundException
 */
	public function testGetUnitNotFoundException() {
		$this->testAction(
			'/unit/0',
			array('method' => 'get')
		);
	}

/**
 * testGetUnitException method exception
 * @expectedException ForbiddenException
 *
 * @return void
 */
	public function testGetUnitException() {
		$Units = $this->generate('Units', array(
			'components' => array(
				'Auth' => array('user'),
				'Session'
			)
		));
		$Units->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(false));
		$Units->Session->expects($this->any())
			->method('read')
			->with()
			->will($this->returnValue(array('access' => 'testing_purposes_only', 'time' => time())));

		$this->testAction(
			'/unit/1',
			array('data' => array('access' => 'testing_purposes_only'), 'method' => 'get')
		);
	}

/**
 * testGetUnitBadRequestException method exception
 * @expectedException BadRequestException
 *
 * @return void
 */
	public function testGetUnitBadRequestException() {
		$this->testAction(
			'/unit/1',
			array('method' => 'get')
		);
	}

/**
 * testGetUnitBadAccessBadRequestException method exception
 * @expectedException BadRequestException
 *
 * @return void
 */
	public function testGetUnitBadAccessBadRequestException() {
		$Units = $this->generate('Units', array(
			'components' => array(
				'Auth' => array('user'),
				'Session'
			)
		));
		$Units->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(true));

		$this->testAction(
			'/unit/1',
			array('data' => array('access' => 'testing_purposes_only'), 'method' => 'get')
		);
	}

/**
 * testGetUnit method, retrieves a specific unit
 *
 * @return void
 */
	public function testGetUnit() {
		$Units = $this->generate('Units', array(
			'components' => array(
				'Auth' => array('user'),
				'Session'
			)
		));
		$Units->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(1));
		$Units->Session->expects($this->any())
			->method('read')
			->with()
			->will($this->returnValue(array('access' => 'testing_purposes_only', 'time' => time())));

		@Cache::delete('_unit_1', 'units');

		$this->testAction(
			'/unit/1',
			array('data' => array('access' => 'testing_purposes_only'), 'method' => 'get')
		);

		$expected = array(
			'status' => 'OK',
			'code' => (int) 200,
			'message' => 'Unit',
			'data' => array(
				'Unit' => array(
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
					'modified' => '2013-10-22 14:48:59'
				),
				'Races' => array(
					'id' => '1',
					'race_types_id' => '1',
					'name' => 'Lorem ipsum dolor sit amet',
					'created' => '2013-10-22 09:20:23',
					'modified' => '2013-10-22 09:20:23'
				),
				'UnitTypes' => array(
					'id' => '1',
					'name' => 'Lorem ipsum dolor sit amet',
					'created' => '2013-10-22 14:49:04',
					'modified' => '2013-10-22 14:49:04'
				),
				'Option' => array(
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
				'Squad' => array(
					(int) 0 => array(
						'id' => '1',
						'name' => 'Lorem ipsum dolor sit amet',
						'races_id' => '1',
						'types_id' => '1',
						'created' => '2013-10-22 14:47:08',
						'modified' => '2013-10-22 14:47:08',
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
				)
			),
			'errors' => null
		);

		$this->assertEquals($expected, $this->vars['response']);



		@Cache::delete('_unit_1', 'units');
	}
}
