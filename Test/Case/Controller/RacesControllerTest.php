<?php
App::uses('RacesController', 'Controller');

/**
 * RacesController Test Case
 *
 */
class RacesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.race',
		'app.race_type'
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
 * testRaces method
 *
 * @return void
 */
	public function testRaces() {
        @Cache::delete('all', 'races');
		$this->testAction(
			'/races',
			array('method' => 'get')
		);
		$expected = array(
			'status' => 'OK',
			'code' => (int) 200,
			'message' => 'races',
			'data' => array(
				(int) 0 => array(
					'Race' => array(
						'id' => '1',
						'race_types_id' => '1',
						'name' => 'Lorem ipsum dolor sit amet',
						'created' => '2013-10-22 09:20:23',
						'modified' => '2013-10-22 09:20:23'
					),
					'RaceTypes' => array(
						'id' => '1',
						'name' => 'Lorem ipsum dolor sit amet',
						'modified' => '2013-10-22 14:35:47',
						'created' => '2013-10-22 14:35:47'
					)
				)
			),
			'errors' => null
		);

		$this->assertEquals($expected, $this->vars['response']);
        @Cache::delete('all', 'races');
	}

}
