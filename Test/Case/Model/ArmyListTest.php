<?php
App::uses('ArmyList', 'Model');

/**
 * ArmyList Test Case
 *
 */
class ArmyListTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.army_list',
		'app.race',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ArmyList = ClassRegistry::init('ArmyList');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ArmyList);

		parent::tearDown();
	}

/**
 * testGenerate method
 *
 * @return void
 */
	public function testGenerate() {
		$data = $this->ArmyList->_generateCode(1);

        $this->assertTrue(strlen($data) == 49);
	}
}
