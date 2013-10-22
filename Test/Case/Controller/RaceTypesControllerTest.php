<?php
App::uses('RaceTypesController', 'Controller');

/**
 * RaceTypesController Test Case
 *
 */
class RaceTypesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.race_type',
		'app.race'
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
 * testRacetypes method
 *
 * @return void
 */
	public function testRacetypes() {
        @Cache::delete('types_all', 'races');
		$this->testAction(
			'/armytypes',
			array('method' => 'get')
		);

		$expected = array(
			'status' => 'OK',
			'code' => (int) 200,
			'message' => 'raceTypes',
			'data' => array(
				(int) 0 => array(
					'RaceType' => array(
						'id' => '1',
						'name' => 'Lorem ipsum dolor sit amet',
						'modified' => '2013-10-22 14:35:47',
						'created' => '2013-10-22 14:35:47'
					),
					'Races' => array(
						(int) 0 => array(
							'id' => '1',
							'race_types_id' => '1',
							'name' => 'Lorem ipsum dolor sit amet',
							'created' => '2013-10-22 09:20:23',
							'modified' => '2013-10-22 09:20:23'
						)
					)
				)
			),
			'errors' => null
		);

		$this->assertEquals($expected, $this->vars['response']);
        @Cache::delete('types_all', 'races');
	}

}
