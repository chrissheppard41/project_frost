<?php
App::uses('SocialController', 'Controller');

/**
 * SocialController Test Case
 *
 */
class SocialControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		//'app.social'
	);

/**
 * testInitBasic method
 *
 * @return void
 */
	public function testInitBasic() {
	}

/**
 * testLogout method
 *
 * @return void
 */
	public function testLogout() {
	}

/**
 * testLogin method
 *
 * @return void
 */
	public function testLogin() {
	}

/**
 * testLoginCb method
 *
 * @return void
 */
	public function testLoginCb() {
	}

/**
 * testGenerate method
 *
 * @return void
 */
	public function testGenerate() {
		$Social = $this->generate('Social', array(
			'components' => array(
				'Auth' => array('user')
			),
			'models' => array(

			)
		));
		$Social->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(1));

		$this->testAction(
			'/access',
			array('method' => 'get')
		);
		$expected = array(
			'status' => 'OK',
			'code' => (int) 200,
			'message' => 'Token',
			'data' => 'somehashcode',
			'errors' => null
		);

		$this->assertEquals(200, $this->vars['response']['code']);
	}

/**
 * testGenerateNoUserForbiddenException method
 * @expectedException ForbiddenException
 */
	public function testGenerateNoUserForbiddenException() {
		$Social = $this->generate('Social', array(
			'components' => array(
				'Auth' => array('user')
			)
		));
		$Social->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(false));

		$this->testAction(
			'/access',
			array('method' => 'get')
		);
	}
}
