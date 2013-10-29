<?php
App::uses('UnitTypesController', 'Controller');

/**
 * UnitTypesController Test Case
 *
 */
class UnitTypesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.unit_type'/*,
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
		'app.special_squad_rule'*/
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
 * testUnitTypesException method exception
 * @expectedException ForbiddenException
 *
 * @return void
 */
	public function testUnitTypesException() {
		$UnitTypes = $this->generate('UnitTypes', array(
			'components' => array(
				'Auth' => array('user')
			)
		));
		$UnitTypes->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(false));

		$this->testAction(
			'/unit_types',
			array('method' => 'get')
		);
	}

/**
 * testUnitTypes method
 *
 * @return void
 */
	public function testUnitTypes() {
		$UnitTypes = $this->generate('UnitTypes', array(
			'components' => array(
				'Auth' => array('user')
			)
		));
		$UnitTypes->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(1));

		@Cache::delete('all_types', 'units');

		$this->testAction(
			'/unit_types',
			array('method' => 'get')
		);

		$expected = array(
			'status' => 'OK',
			'code' => (int) 200,
			'message' => 'Unit Types',
			'data' => array(
				(int) 0 => array(
					'UnitType' => array(
						'id' => '1',
						'name' => 'Lorem ipsum dolor sit amet',
						'created' => '2013-10-22 14:49:04',
						'modified' => '2013-10-22 14:49:04'
					)
				)
			),
			'errors' => null
		);

		$this->assertEquals($expected, $this->vars['response']);



		@Cache::delete('all_types', 'units');
	}

}
