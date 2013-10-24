<?php
App::uses('ArmyListsController', 'Controller');

/**
 * ArmyListsController Test Case
 *
 */
class ArmyListsControllerTest extends ControllerTestCase {

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
 * testMyArmiesException method exception
 * @expectedException ForbiddenException
 *
 * @return void
 */
	public function testMyArmiesException() {
		$ArmyLists = $this->generate('ArmyLists', array(
			'components' => array(
				'Auth' => array('user')
			)
		));
		$ArmyLists->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(false));

		$this->testAction(
			'/armies?u_id=1',
			array('method' => 'get')
		);
	}

/**
 * testMyArmies method
 *
 * @return void
 */
	public function testMyArmies() {
		$ArmyLists = $this->generate('ArmyLists', array(
			'components' => array(
				'Auth' => array('user')
			)
		));
		$ArmyLists->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(1));

		@Cache::delete('_user_1', 'army_lists');

		$this->testAction(
			'/armies?u_id=1',
			array('method' => 'get')
		);

		$expected = array(
			'status' => 'OK',
			'code' => (int) 200,
			'message' => 'Army Lists',
			'data' => array(
				(int) 0 => array(
					'ArmyList' => array(
						'id' => '1',
						'name' => 'Lorem ipsum dolor sit amet',
						'descr' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
						'point_limit' => '1',
						'hide' => '1',
						'code' => 'Lorem ipsum dolor sit amet',
						'rate' => '1',
						'races_id' => '1',
						'users_id' => '1',
						'created' => '2013-10-22 09:19:23',
						'modified' => '2013-10-22 09:19:23'
					),
					'Races' => array(
						'id' => '1',
						'race_types_id' => '1',
						'name' => 'Lorem ipsum dolor sit amet',
						'created' => '2013-10-22 09:20:23',
						'modified' => '2013-10-22 09:20:23'
					),
					'Users' => array(
						'password' => 'Lorem ipsum dolor sit amet',
						'id' => '1',
						'social' => 'Lorem ipsum dolor ',
						'social_id' => 'Lorem ipsum dolor sit amet',
						'social_access_token' => 'Lorem ipsum dolor sit amet',
						'username' => 'Lorem ipsum dolor sit amet',
						'name' => 'Lorem ipsum dolor sit amet',
						'slug' => 'Lorem ipsum dolor sit amet',
						'password_token' => 'Lorem ipsum dolor sit amet',
						'email' => 'Lorem ipsum dolor sit amet',
						'email_verified' => '1',
						'email_token' => 'Lorem ipsum dolor sit amet',
						'email_token_expires' => '2013-10-22 09:20:02',
						'active' => '1',
						'last_login' => '2013-10-22 09:20:02',
						'last_action' => '2013-10-22 09:20:02',
						'is_admin' => '1',
						'role' => 'Lorem ipsum dolor sit amet',
						'lang' => 'Lorem ip',
						'created' => '2013-10-22 09:20:02',
						'modified' => '2013-10-22 09:20:02'
					)
				),
				(int) 1 => array(
					'ArmyList' => array(
						'id' => '2',
						'name' => 'Lorem ipsum dolor sit amet',
						'descr' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
						'point_limit' => '2',
						'hide' => '0',
						'code' => 'Lorem ipsum dolor sit amet',
						'rate' => '1',
						'races_id' => '1',
						'users_id' => '1',
						'created' => '2013-10-22 09:19:23',
						'modified' => '2013-10-22 09:19:23'
					),
					'Races' => array(
						'id' => '1',
						'race_types_id' => '1',
						'name' => 'Lorem ipsum dolor sit amet',
						'created' => '2013-10-22 09:20:23',
						'modified' => '2013-10-22 09:20:23'
					),
					'Users' => array(
						'password' => 'Lorem ipsum dolor sit amet',
						'id' => '1',
						'social' => 'Lorem ipsum dolor ',
						'social_id' => 'Lorem ipsum dolor sit amet',
						'social_access_token' => 'Lorem ipsum dolor sit amet',
						'username' => 'Lorem ipsum dolor sit amet',
						'name' => 'Lorem ipsum dolor sit amet',
						'slug' => 'Lorem ipsum dolor sit amet',
						'password_token' => 'Lorem ipsum dolor sit amet',
						'email' => 'Lorem ipsum dolor sit amet',
						'email_verified' => '1',
						'email_token' => 'Lorem ipsum dolor sit amet',
						'email_token_expires' => '2013-10-22 09:20:02',
						'active' => '1',
						'last_login' => '2013-10-22 09:20:02',
						'last_action' => '2013-10-22 09:20:02',
						'is_admin' => '1',
						'role' => 'Lorem ipsum dolor sit amet',
						'lang' => 'Lorem ip',
						'created' => '2013-10-22 09:20:02',
						'modified' => '2013-10-22 09:20:02'
					)
				)
			),
			'errors' => null
		);

		$this->assertEquals($expected, $this->vars['response']);


		@Cache::delete('_user_1', 'army_lists');
	}


/**
 * testMyArmiesException method exception
 * @expectedException ForbiddenException
 *
 * @return void
 */
	public function testAllArmiesNoUserForbiddenException() {
		$ArmyLists = $this->generate('ArmyLists', array(
			'components' => array(
				'Auth' => array('user')
			)
		));
		$ArmyLists->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(false));

		$this->testAction(
			'/allarmies/1234',
			array('method' => 'get')
		);
	}

/**
 * testAllArmies method exception
 * @expectedException ForbiddenException
 *
 * @return void
 */
	public function testAllArmiesForbiddenException() {
		$ArmyLists = $this->generate('ArmyLists', array(
			'components' => array(
				'Auth' => array('user')
			)
		));
		$ArmyLists->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(true));

		$this->testAction(
			'/allarmies/1234',
			array('method' => 'get')
		);
	}

/**
 * testAllArmies method
 *
 * @return void
 */
	public function testAllArmies() {
		$ArmyLists = $this->generate('ArmyLists', array(
			'components' => array(
				'Auth' => array('user')
			)
		));
		$ArmyLists->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(1));

		@Cache::delete('all', 'army_lists');

		$this->testAction(
			'/allarmies/f105ba99dd7a53287d7fd30fd9ebc691765dbc39557bd9d22',
			array('method' => 'get')
		);

		$expected = array(
			'status' => 'OK',
			'code' => (int) 200,
			'message' => 'Army Lists',
			'data' => array(
				(int) 0 => array(
					'ArmyList' => array(
						'id' => '1',
						'name' => 'Lorem ipsum dolor sit amet',
						'descr' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
						'point_limit' => '1',
						'hide' => '1',
						'code' => 'Lorem ipsum dolor sit amet',
						'rate' => '1',
						'races_id' => '1',
						'users_id' => '1',
						'created' => '2013-10-22 09:19:23',
						'modified' => '2013-10-22 09:19:23'
					),
					'Races' => array(
						'id' => '1',
						'race_types_id' => '1',
						'name' => 'Lorem ipsum dolor sit amet',
						'created' => '2013-10-22 09:20:23',
						'modified' => '2013-10-22 09:20:23'
					),
					'Users' => array(
						'password' => 'Lorem ipsum dolor sit amet',
						'id' => '1',
						'social' => 'Lorem ipsum dolor ',
						'social_id' => 'Lorem ipsum dolor sit amet',
						'social_access_token' => 'Lorem ipsum dolor sit amet',
						'username' => 'Lorem ipsum dolor sit amet',
						'name' => 'Lorem ipsum dolor sit amet',
						'slug' => 'Lorem ipsum dolor sit amet',
						'password_token' => 'Lorem ipsum dolor sit amet',
						'email' => 'Lorem ipsum dolor sit amet',
						'email_verified' => '1',
						'email_token' => 'Lorem ipsum dolor sit amet',
						'email_token_expires' => '2013-10-22 09:20:02',
						'active' => '1',
						'last_login' => '2013-10-22 09:20:02',
						'last_action' => '2013-10-22 09:20:02',
						'is_admin' => '1',
						'role' => 'Lorem ipsum dolor sit amet',
						'lang' => 'Lorem ip',
						'created' => '2013-10-22 09:20:02',
						'modified' => '2013-10-22 09:20:02'
					)
				),
				(int) 1 => array(
					'ArmyList' => array(
						'id' => '2',
						'name' => 'Lorem ipsum dolor sit amet',
						'descr' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
						'point_limit' => '2',
						'hide' => '0',
						'code' => 'Lorem ipsum dolor sit amet',
						'rate' => '1',
						'races_id' => '1',
						'users_id' => '1',
						'created' => '2013-10-22 09:19:23',
						'modified' => '2013-10-22 09:19:23'
					),
					'Races' => array(
						'id' => '1',
						'race_types_id' => '1',
						'name' => 'Lorem ipsum dolor sit amet',
						'created' => '2013-10-22 09:20:23',
						'modified' => '2013-10-22 09:20:23'
					),
					'Users' => array(
						'password' => 'Lorem ipsum dolor sit amet',
						'id' => '1',
						'social' => 'Lorem ipsum dolor ',
						'social_id' => 'Lorem ipsum dolor sit amet',
						'social_access_token' => 'Lorem ipsum dolor sit amet',
						'username' => 'Lorem ipsum dolor sit amet',
						'name' => 'Lorem ipsum dolor sit amet',
						'slug' => 'Lorem ipsum dolor sit amet',
						'password_token' => 'Lorem ipsum dolor sit amet',
						'email' => 'Lorem ipsum dolor sit amet',
						'email_verified' => '1',
						'email_token' => 'Lorem ipsum dolor sit amet',
						'email_token_expires' => '2013-10-22 09:20:02',
						'active' => '1',
						'last_login' => '2013-10-22 09:20:02',
						'last_action' => '2013-10-22 09:20:02',
						'is_admin' => '1',
						'role' => 'Lorem ipsum dolor sit amet',
						'lang' => 'Lorem ip',
						'created' => '2013-10-22 09:20:02',
						'modified' => '2013-10-22 09:20:02'
					)
				)
			),
			'errors' => null
		);

		$this->assertEquals($expected, $this->vars['response']);


		@Cache::delete('all', 'army_lists');
	}

/**
 * testPublicArmies method
 *
 * @return void
 */
	public function testPublicArmies() {
		@Cache::delete('notHidden', 'army_lists');

		$this->testAction(
			'/publicarmies',
			array('method' => 'get')
		);

		$expected = array(
			'status' => 'OK',
			'code' => 200,
			'message' => 'Army Lists',
			'data' => array(
				0 => array(
					'ArmyList' => array(
						'id' => '2',
						'name' => 'Lorem ipsum dolor sit amet',
						'descr' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
						'point_limit' => '2',
						'hide' => '0',
						'code' => 'Lorem ipsum dolor sit amet',
						'rate' => '1',
						'races_id' => '1',
						'users_id' => '1',
						'created' => '2013-10-22 09:19:23',
						'modified' => '2013-10-22 09:19:23'
					),
					'Races' => array(
						'id' => '1',
						'race_types_id' => '1',
						'name' => 'Lorem ipsum dolor sit amet',
						'created' => '2013-10-22 09:20:23',
						'modified' => '2013-10-22 09:20:23'
					),
					'Users' => array(
						'password' => 'Lorem ipsum dolor sit amet',
						'id' => '1',
						'social' => 'Lorem ipsum dolor ',
						'social_id' => 'Lorem ipsum dolor sit amet',
						'social_access_token' => 'Lorem ipsum dolor sit amet',
						'username' => 'Lorem ipsum dolor sit amet',
						'name' => 'Lorem ipsum dolor sit amet',
						'slug' => 'Lorem ipsum dolor sit amet',
						'password_token' => 'Lorem ipsum dolor sit amet',
						'email' => 'Lorem ipsum dolor sit amet',
						'email_verified' => '1',
						'email_token' => 'Lorem ipsum dolor sit amet',
						'email_token_expires' => '2013-10-22 09:20:02',
						'active' => '1',
						'last_login' => '2013-10-22 09:20:02',
						'last_action' => '2013-10-22 09:20:02',
						'is_admin' => '1',
						'role' => 'Lorem ipsum dolor sit amet',
						'lang' => 'Lorem ip',
						'created' => '2013-10-22 09:20:02',
						'modified' => '2013-10-22 09:20:02'
					)
				)
			),
			'errors' => null
		);

		$this->assertEquals($expected, $this->vars['response']);


		@Cache::delete('notHidden', 'army_lists');
	}

/**
 * testSaveArmyException method exception
 * @expectedException BadRequestException
 *
 * @return void
 */
	public function testSaveArmyException($id = null) {
		$this->testAction(
			'/add/save',
			array('data' => array(), 'method' => 'post')
		);
	}

/**
 * testMyArmiesException method exception
 * @expectedException ForbiddenException
 *
 * @return void
 */
	public function testSaveArmyForbiddenException() {
		$ArmyLists = $this->generate('ArmyLists', array(
			'components' => array(
				'Auth' => array('user')
			)
		));
		$ArmyLists->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(false));

		$this->testAction(
			'/add/save',
			array('data' => array(
				'races_id' => 1,
				'name' => 'My army',
				'descr' => 'My army description',
				'point_limit' => 1234,
				'users_id' => 1
			), 'method' => 'post')
		);
	}
/**
 * testSaveArmyNotHidden method
 *
 * @return void
 */
	public function testSaveArmyNotHidden() {
		$this->ArmyLists = $this->generate('ArmyLists', array(
			'models' => array(
				'ArmyList' => array('_generateCode')
			),
			'components' => array(
				'Auth' => array('user')
			)
		));
		$this->ArmyLists->ArmyList->expects($this->any())
			->method('_generateCode')
			->will($this->returnValue('123456789'));
		$this->ArmyLists->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(1));


		$this->testAction(
			'/add/save',
			array('data' => array(
				'races_id' => 1,
				'name' => 'My army',
				'descr' => 'My army description',
				'point_limit' => 1234,
				'users_id' => 1
			), 'method' => 'post')
		);

		$expected = array(
			'status' => 'OK',
			'code' => (int) 200,
			'message' => 'Army Lists',
			'data' => array(
				'ArmyList' => array(
					'races_id' => (int) 1,
					'name' => 'My army',
					'descr' => 'My army description',
					'point_limit' => (int) 1234,
					'users_id' => (int) 1,
					'code' => '123456789'
				)
			),
			'errors' => null
		);

		$this->assertEquals($expected, $this->vars['response']);
		@Cache::delete('notHidden', 'army_lists');
		$this->testAction(
			'/publicarmies',
			array('method' => 'get')
		);
		@Cache::delete('notHidden', 'army_lists');

		$this->assertEquals(2, count($this->vars['response']['data']));
		$this->assertEquals('My army', $this->vars['response']['data'][1]['ArmyList']['name']);
	}

/**
 * testSaveArmyHidden method
 *
 * @return void
 */
	public function testSaveArmyHidden() {
		$this->ArmyLists = $this->generate('ArmyLists', array(
			'models' => array(
				'ArmyList' => array('_generateCode')
			),
			'components' => array(
				'Auth' => array('user')
			)
		));
		$this->ArmyLists->ArmyList->expects($this->any())
			->method('_generateCode')
			->will($this->returnValue('123456789'));
		$this->ArmyLists->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(1));


		$this->testAction(
			'/add/save',
			array('data' => array(
				'races_id' => 1,
				'name' => 'My army',
				'descr' => 'My army description',
				'point_limit' => 1234,
				'users_id' => 1,
				'hide' => true
			), 'method' => 'post')
		);

		$expected = array(
			'status' => 'OK',
			'code' => (int) 200,
			'message' => 'Army Lists',
			'data' => array(
				'ArmyList' => array(
					'races_id' => (int) 1,
					'name' => 'My army',
					'descr' => 'My army description',
					'point_limit' => (int) 1234,
					'users_id' => (int) 1,
					'code' => '123456789',
				'hide' => true
				)
			),
			'errors' => null
		);

		$this->assertEquals($expected, $this->vars['response']);
		@Cache::delete('notHidden', 'army_lists');
		$this->testAction(
			'/publicarmies',
			array('method' => 'get')
		);
		@Cache::delete('notHidden', 'army_lists');

		$this->assertEquals(1, count($this->vars['response']['data']));
	}

/**
 * testNotSaveArmy method
 *
 * @return void
 */
	public function testNotSaveArmy() {
		$this->ArmyLists = $this->generate('ArmyLists', array(
			'components' => array(
				'Auth' => array('user')
			)
		));
		$this->ArmyLists->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(1));

		$this->testAction(
			'/add/save',
			array('data' => array(
				'races_id' => 1,
				'name' => null,
				'descr' => null,
				'point_limit' => 1234567891011,
				'users_id' => 1,
			), 'method' => 'post')
		);

		$expected = array(
			'status' => 'Bad Request',
			'code' => (int) 400,
			'message' => 'Army Lists',
			'data' => null,
			'errors' => null,
			'error' => array(
				'name' => array(
					(int) 0 => 'Please supply a name'
				),
				'descr' => array(
					(int) 0 => 'Please supply a description'
				),
				'point_limit' => array(
					(int) 0 => 'Between 3 to 11 characters'
				)
			)
		);

		$this->assertEquals($expected, $this->vars['response']);

	}
/**
 * testEditArmiesException method
 * @expectedException NotFoundException
 */
	public function testEditArmiesExceptionNotFoundException() {
		$this->testAction(
			'/edit_army/0',
			array('method' => 'get')
		);
	}
/**
 * testEditArmies method
 * @expectedException ForbiddenException
 */
	public function testEditArmiesExceptionForbiddenException() {
		$ArmyLists = $this->generate('ArmyLists', array(
			'components' => array(
				'Auth' => array('user')
			)
		));
		$ArmyLists->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(false));

		$this->testAction(
			'/edit_army/1',
			array('method' => 'get')
		);
	}

/**
 * testEditArmies method
 *
 * @return void
 */
	public function testEditArmies() {
		$ArmyLists = $this->generate('ArmyLists', array(
			'components' => array(
				'Auth' => array('user')
			)
		));
		$ArmyLists->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(array('id' => '1')));

		@Cache::delete('_army_1', 'army_lists');

		$this->testAction(
			'/edit_army/1',
			array('method' => 'get')
		);
		$expected = array(
			'status' => 'OK',
			'code' => (int) 200,
			'message' => 'Army Lists',
			'data' => array(
				'ArmyList' => array(
					'id' => '1',
					'name' => 'Lorem ipsum dolor sit amet',
					'descr' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
					'point_limit' => '1',
					'hide' => '1',
					'code' => 'Lorem ipsum dolor sit amet',
					'rate' => '1',
					'races_id' => '1',
					'users_id' => '1',
					'created' => '2013-10-22 09:19:23',
					'modified' => '2013-10-22 09:19:23'
				),
				'Races' => array(
					'id' => '1',
					'race_types_id' => '1',
					'name' => 'Lorem ipsum dolor sit amet',
					'created' => '2013-10-22 09:20:23',
					'modified' => '2013-10-22 09:20:23'
				),
				'Users' => array(
					'password' => 'Lorem ipsum dolor sit amet',
					'id' => '1',
					'social' => 'Lorem ipsum dolor ',
					'social_id' => 'Lorem ipsum dolor sit amet',
					'social_access_token' => 'Lorem ipsum dolor sit amet',
					'username' => 'Lorem ipsum dolor sit amet',
					'name' => 'Lorem ipsum dolor sit amet',
					'slug' => 'Lorem ipsum dolor sit amet',
					'password_token' => 'Lorem ipsum dolor sit amet',
					'email' => 'Lorem ipsum dolor sit amet',
					'email_verified' => '1',
					'email_token' => 'Lorem ipsum dolor sit amet',
					'email_token_expires' => '2013-10-22 09:20:02',
					'active' => '1',
					'last_login' => '2013-10-22 09:20:02',
					'last_action' => '2013-10-22 09:20:02',
					'is_admin' => '1',
					'role' => 'Lorem ipsum dolor sit amet',
					'lang' => 'Lorem ip',
					'created' => '2013-10-22 09:20:02',
					'modified' => '2013-10-22 09:20:02'
				)
			),
			'errors' => null
		);

		@Cache::delete('_army_1', 'army_lists');

		$this->assertEquals($expected, $this->vars['response']);
	}

/**
 * testEditArmiesWrongUser method, blank response
 *
 * @return void
 */
	public function testEditArmiesWrongUser() {
		$ArmyLists = $this->generate('ArmyLists', array(
			'components' => array(
				'Auth' => array('user')
			)
		));
		$ArmyLists->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(array('id' => '2')));

		@Cache::delete('_army_1', 'army_lists');

		$this->testAction(
			'/edit_army/1',
			array('method' => 'get')
		);
		$expected = array(
			'status' => 'OK',
			'code' => (int) 200,
			'message' => 'Army Lists',
			'data' => array(),
			'errors' => null
		);

		@Cache::delete('_army_1', 'army_lists');

		$this->assertEquals($expected, $this->vars['response']);
	}
/**
 * testEditSaveArmiesExceptionNotFoundException method
 * @expectedException NotFoundException
 */
	public function testEditSaveArmiesExceptionNotFoundException() {
		$this->testAction(
			'/edit/save/0',
			array('method' => 'post')
		);
	}
/**
 * testEditSaveArmiesExceptionForbiddenException method
 * @expectedException ForbiddenException
 */
	public function testEditSaveArmiesExceptionForbiddenException() {
		$ArmyLists = $this->generate('ArmyLists', array(
			'components' => array(
				'Auth' => array('user')
			)
		));
		$ArmyLists->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(false));

		$this->testAction(
			'/edit/save/1',
			array('method' => 'post')
		);
	}
/**
 * testEditSaveArmiesExceptionBadRequestException method
 * @expectedException BadRequestException
 */
	public function testEditSaveArmiesExceptionBadRequestException() {
		$ArmyLists = $this->generate('ArmyLists', array(
			'components' => array(
				'Auth' => array('user')
			)
		));
		$ArmyLists->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(array('id' => '1')));

		$this->testAction(
			'/edit/save/1',
			array('data' => array(), 'method' => 'post')
		);
	}

/**
 * testEditSaveArmiesExceptionForbiddenException method
 * @expectedException ForbiddenException
 */
	public function testEditSaveArmiesExceptionBadUserForbiddenException() {
		$ArmyLists = $this->generate('ArmyLists', array(
			'components' => array(
				'Auth' => array('user')
			)
		));
		$ArmyLists->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(2));

		$this->testAction(
			'/edit/save/1',
			array('data' => array(
				'name' => 'My army',
				'descr' => 'my army discription',
				'point_limit' => 1234,
				'users_id' => 1
			), 'method' => 'post')
		);
	}

/**
 * testEditSaveArmy method
 *
 * @return void
 */
	public function testEditSaveArmy() {
		$ArmyLists = $this->generate('ArmyLists', array(
			'components' => array(
				'Auth' => array('user')
			)
		));
		$ArmyLists->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(1));

		$this->testAction(
			'/edit/save/1',
			array('data' => array(
				'name' => 'My army',
				'descr' => 'my army discription',
				'point_limit' => 1234,
				'users_id' => 1
			), 'method' => 'post')
		);

		$expected = array(
			'status' => 'OK',
			'code' => (int) 200,
			'message' => 'Army Lists',
			'data' => array(
				'ArmyList' => array(
					'name' => 'My army',
					'descr' => 'my army discription',
					'point_limit' => (int) 1234,
					'users_id' => (int) 1
				)
			),
			'errors' => null
		);
		$this->assertEquals($expected, $this->vars['response']);
	}

/**
 * testEditSaveArmy method
 *
 * @return void
 */
	public function testEditNotSaveArmy() {
		$ArmyLists = $this->generate('ArmyLists', array(
			'components' => array(
				'Auth' => array('user')
			)
		));
		$ArmyLists->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(1));

		$this->testAction(
			'/edit/save/1',
			array('data' => array(
				'name' => null,
				'descr' => null,
				'point_limit' => 1234567891011,
				'users_id' => 1
			), 'method' => 'post')
		);

		$expected = array(
			'status' => 'Bad Request',
			'code' => (int) 400,
			'message' => 'Army Lists',
			'data' => null,
			'errors' => array(
				'name' => array(
					(int) 0 => 'Please supply a name'
				),
				'descr' => array(
					(int) 0 => 'Please supply a description'
				),
				'point_limit' => array(
					(int) 0 => 'Between 3 to 11 characters'
				)
			)
		);
		$this->assertEquals($expected, $this->vars['response']);
	}


/**
 * testDeleteArmy method
 *
 * @return void
 */
	public function testDeleteArmy() {
		$ArmyLists = $this->generate('ArmyLists', array(
			'components' => array(
				'Auth' => array('user')
			)
		));
		$ArmyLists->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(1));

		$this->testAction(
			'/delete_army/1',
			array('method' => 'delete')
		);

		$expected = array(
			'status' => 'OK',
			'code' => (int) 200,
			'message' => 'Army Lists',
			'data' => null,
			'errors' => null,
		);

		$this->assertEquals($expected, $this->vars['response']);

	}

/**
 * testDeleteArmy method
 *
 * @return void
 */
	public function testDeleteArmyBadResponse() {
		$ArmyLists = $this->generate('ArmyLists', array(
			'components' => array(
				'Auth' => array('user')
			),
			'models' => array(
				'ArmyList' => array('delete')
			)
		));
		$ArmyLists->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(1));

		$ArmyLists->ArmyList->expects($this->once())
			->method('delete')
			->with()
			->will($this->returnValue(false));

		$this->testAction(
			'/delete_army/1',
			array('method' => 'delete')
		);

		$expected = array(
			'status' => 'Bad Request',
			'code' => (int) 400,
			'message' => 'Army Lists',
			'data' => null,
			'errors' => array('Unable to delete army 1'),
		);

		$this->assertEquals($expected, $this->vars['response']);

	}

/**
 * testDeleteArmyNoUserForbiddenException method
 * @expectedException ForbiddenException
 */
	public function testDeleteArmyNoUserForbiddenException() {
		$ArmyLists = $this->generate('ArmyLists', array(
			'components' => array(
				'Auth' => array('user')
			)
		));
		$ArmyLists->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(false));

		$this->testAction(
			'/delete_army/1',
			array('method' => 'delete')
		);
	}


/**
 * testDeleteArmyNotMyArmyForbiddenException method
 * @expectedException ForbiddenException
 */
	public function testDeleteArmyNotMyArmyForbiddenException() {
		$ArmyLists = $this->generate('ArmyLists', array(
			'components' => array(
				'Auth' => array('user')
			)
		));
		$ArmyLists->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(2));

		$this->testAction(
			'/delete_army/1',
			array('method' => 'delete')
		);
	}


/**
 * testDeleteArmyNotFoundNotFoundException method
 * @expectedException NotFoundException
 */
	public function testDeleteArmyNotFoundNotFoundException() {
		$ArmyLists = $this->generate('ArmyLists', array(
			'components' => array(
				'Auth' => array('user')
			)
		));
		$ArmyLists->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(1));

		$this->testAction(
			'/delete_army/0',
			array('method' => 'delete')
		);
	}


/**
 * testViewArmy method
 *
 * @return void
 */
	public function testViewArmy() {
		$ArmyLists = $this->generate('ArmyLists', array(
			'components' => array(
				'Auth' => array('user')
			)
		));
		$ArmyLists->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(1));

		@Cache::delete('_army_1', 'army_lists');
		$this->testAction(
			'/view_army/1',
			array('method' => 'get')
		);

		$expected = array(
			'status' => 'OK',
			'code' => (int) 200,
			'message' => 'Army Lists',
			'data' => array(
				'ArmyList' => array(
					'id' => '1',
					'name' => 'Lorem ipsum dolor sit amet',
					'descr' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
					'point_limit' => '1',
					'hide' => '1',
					'code' => 'Lorem ipsum dolor sit amet',
					'rate' => '1',
					'races_id' => '1',
					'users_id' => '1',
					'created' => '2013-10-22 09:19:23',
					'modified' => '2013-10-22 09:19:23'
				),
				'Races' => array(
					'id' => '1',
					'race_types_id' => '1',
					'name' => 'Lorem ipsum dolor sit amet',
					'created' => '2013-10-22 09:20:23',
					'modified' => '2013-10-22 09:20:23'
				),
				'Users' => array(
					'password' => 'Lorem ipsum dolor sit amet',
					'id' => '1',
					'social' => 'Lorem ipsum dolor ',
					'social_id' => 'Lorem ipsum dolor sit amet',
					'social_access_token' => 'Lorem ipsum dolor sit amet',
					'username' => 'Lorem ipsum dolor sit amet',
					'name' => 'Lorem ipsum dolor sit amet',
					'slug' => 'Lorem ipsum dolor sit amet',
					'password_token' => 'Lorem ipsum dolor sit amet',
					'email' => 'Lorem ipsum dolor sit amet',
					'email_verified' => '1',
					'email_token' => 'Lorem ipsum dolor sit amet',
					'email_token_expires' => '2013-10-22 09:20:02',
					'active' => '1',
					'last_login' => '2013-10-22 09:20:02',
					'last_action' => '2013-10-22 09:20:02',
					'is_admin' => '1',
					'role' => 'Lorem ipsum dolor sit amet',
					'lang' => 'Lorem ip',
					'created' => '2013-10-22 09:20:02',
					'modified' => '2013-10-22 09:20:02'
				)
			),
			'errors' => null
		);

		$this->assertEquals($expected, $this->vars['response']);
		@Cache::delete('_army_1', 'army_lists');
	}



/**
 * testViewArmyNoUserForbiddenException method
 * @expectedException ForbiddenException
 */
	public function testViewArmyNoUserForbiddenException() {
		$ArmyLists = $this->generate('ArmyLists', array(
			'components' => array(
				'Auth' => array('user')
			)
		));
		$ArmyLists->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(false));

		$this->testAction(
			'/view_army/1',
			array('method' => 'get')
		);
	}


/**
 * testViewArmyNotFoundNotFoundException method
 * @expectedException NotFoundException
 */
	public function testViewArmyNotFoundNotFoundException() {
		$ArmyLists = $this->generate('ArmyLists', array(
			'components' => array(
				'Auth' => array('user')
			)
		));
		$ArmyLists->Auth->staticExpects($this->any())
			->method('user')
			->with()
			->will($this->returnValue(1));

		$this->testAction(
			'/view_army/0',
			array('method' => 'get')
		);
	}



}
