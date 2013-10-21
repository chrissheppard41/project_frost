<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {

	public $helpers = array('Html', 'Form', 'Js', 'Paginator', 'Session');

	public $components = array(
		'Auth' => array(
			//'authorize' => array('Controller'),
			'authenticate' => array(
				'Social',
				'BcryptForm'
			)
		),
		'Paginator',
		'RequestHandler',
		'Session',
		'DebugKit.Toolbar'
	);

	public function beforeFilter() {
		parent::beforeFilter();

		/* Setting Auth component options. */
		$this->Auth->authError = 'Please login to gain access to this area.';
		$this->Auth->loginRedirect = array('plugin' => 'users', 'controller' => 'users', 'action' => 'dashboard');
		$this->Auth->loginAction = array('plugin' => 'users', 'controller' => 'users', 'action' => 'login');
		$this->Auth->logoutRedirect = '/';
		$this->Auth->flash = array('element' => 'notifications/default', 'key' => 'auth', 'params' => array('class' => 'alert-error'));

		/* Setting up a custom detector for the admin section. */
		$this->request->addDetector('admin', array('callback' => function($request) {
			return isset($request->params['prefix']) && $request->params['prefix'] === 'admin';
		}));

		/* The admin section uses a custom layout and custom helpers. */
		if ($this->request->is('admin')) {
			$this->layout = 'admin';
			$this->helpers['Form'] = array('className' => 'BootstrapForm');
			$this->helpers['Html'] = array('className' => 'BootstrapHtml');
			$this->helpers['Paginator'] = array('className' => 'BootstrapPaginator');
		}

		/* Allows non-admin requests. This can be overriden in your controller. */
		if (!$this->request->is('admin')) {
			$this->Auth->allow();
		}


		$this->set('loggedIn', $this->Auth->loggedIn());
		if($this->Auth->loggedIn()) {
			$this->set('user', $this->Auth->user());
		} else {
			$this->set('user', null);
		}
		/* Allows auto-login from cookies. */
		//$this->restoreLoginFromCookie();

		if($this->request->is('admin') && $this->Auth->user('is_admin') === "0") {
            $this->flashMessage(__('You do not have acces to this area'), 'alert-danger', '/');
		}
	}

	/**
	 *	Attempts to read a specific cookie name/key combination.
	 *	If it is found, and a user is not currently logged in,
	 *	pass the information in the cookie to the Auth component.
	 */
	public function restoreLoginFromCookie() {
		$this->Cookie->name = 'Users';
		$cookie = $this->Cookie->read('rememberMe');
		if (!empty($cookie) && !$this->Auth->user()) {
			$data['User'][$this->Auth->fields['username']] = $cookie[$this->Auth->fields['username']];
			$data['User'][$this->Auth->fields['password']] = $cookie[$this->Auth->fields['password']];
			$this->Auth->login($data);
		}
	}

	/**
	 *	Sets up session flash message for view.
	 *
	 *	@param string $msg - The message to be displayed.
	 *	@param string $type - alert-success, alert-warning, alert-error or alert-info.
	 *	@param string $url - The url to redirect to.
	 *	@return bool exits
	 */
	public function flashMessage($msg, $type = 'alert-success', $url = null) {
		$this->Session->setFlash($msg, 'notifications/default', array('class' => $type));
		if (!empty($url)) {
			$this->redirect($url);
		}
	}

	/**
	 *	Updates this model records order based on the supplied values.
	 *	This action uses v2.1 JSON Views and must be called like below:
	 *	/admin/controller/save_order/id.json
	 *
	 *	@param int $id - The id of the record being re-ordered.
	 *	@return json.
	 */
	public function admin_save_order($id) {
		if (!$this->request->is('post') ||
		    !$this->request->is('ajax') ||
		    !is_numeric($id) ||
		    !isset($this->request->data['order'])
		) {
			$responseData = array(
				'success' => 0,
				'message' => 'Invalid request.'
			);
		} else {
			$this->{$this->modelClass}->id = $id;
			if ($this->{$this->modelClass}->saveField('order', $this->request->data['order'])) {
				$responseData = array(
					'success' => 1,
					'message' => 'Order updated successfully.'
				);
			} else {
				$responseData = array(
					'success' => 0,
					'message' => 'Record could not be saved.'
				);
			}
		}

		$_serialize = 'responseData';
		$this->set(compact('_serialize', 'responseData'));
	}

	/**
	 *	NOTE: As of v2.2, PUT and DELETE requests encoded with application/x-www-form-urlencoded
	 *	will have their data placed into CakeRequest::$data.
	 *
	 *	Reads the input stream resource then based on a requests content type,
	 *	either parses as a URL-encoded string (key/value), or decodes a JSON string.
	 *
	 *	@return array - An associative array of variables.
	 */
	protected function _readInputStream() {
		$fh = fopen('php://input', 'r');
		$content = stream_get_contents($fh);
		fclose($fh);

		if (isset($_SERVER['CONTENT_TYPE'])) {
			if (strstr($_SERVER['CONTENT_TYPE'], 'application/json')) {
				if (!empty($content)) {
					$data = json_decode($content, true);

					if (empty($data) || !is_array($data)) {
						parse_str($content, $data);
					}
				} else {
					$content = $this->request->input();
					parse_str($content, $data);
				}

				return $data;
			} else {
				parse_str($content, $putVars);
				return $putVars;
			}
		} else {
			return array();
		}
	}

	/**
	 *	Generates and sends a templated email.
	 *
	 *	@param array $recipient - Recipient(s) email address.
	 *	@param string $subject - Subject line of the email.
	 *	@param string $template - Name of email template to use.
	 *	@param string $layout - Name of email layout to use.
	 *	@param array $emailVars - Variables for use in the template.
	 *
	 *	@return bool.
	 */
	protected function _sendEmail($recipient = array(), $subject, $template = 'default', $layout = 'default', $emailVars = array()) {
		if (!is_array($recipient) || empty($recipient)) {
			return false;
		}

		/* Initialise the CakeEmail class. */
		$email = new CakeEmail(Configure::read('emailConfig'));

		/* If present, setting view variables. */
		if (!empty($emailVars) && is_array($emailVars)) {
			$email->viewVars($emailVars);
		}

		/* Generating the email headers. */
		$email->template($template, $layout)
		      ->emailFormat('both')
		      ->to($recipient)
		      ->subject($subject);

		/* Selecting which helpers should be available in the template. */
		$email->helpers(array('Html', 'Text'));

		/* Sending the email and returning. */
		return ($email->send()) ? true : false;
	}

	/**
	 * check that required params have been supplied and generate response for an invalid request
	 *
	 * @return bool
	 */
	protected function _hasRequiredParams($suppliedParams, $requiredParams) {
		$diff = array_diff_key($suppliedParams, $requiredParams);
		return !empty($diff);
	}
}