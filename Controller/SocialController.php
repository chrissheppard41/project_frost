<?php
App::uses('AppController', 'Controller');
//App::import('Vendor', 'facebook' . DS . 'facebook');
App::import('Vendor', array('file' => 'Facebook'));

/**
* Activities Controller
*
* @property Activity $Activity
*/
class SocialController extends AppController {

/**
 * Components
 * @var array
 */
    public $components = array('Rest');

	public function init_basic() {
		$this->autoRender = false;
		$this->facebook = new Facebook(array(
			'appId' => Configure::read('Social.Facebook.AppID'),
			'secret' => Configure::read('Social.Facebook.AppSecret')
		));
	}

	public function logout() {
        $this->Session->delete('Social');
        $this->Auth->logout();

        $this->redirect("/");
	}

	/**
	 * Handler for incoming data from the 'Connect' button
	 * Stores posted form data in session before handling FB login
	 * (form data will be written to db if FB login is successful; see login_cb()
	**/
	public function login($social = null) {
        if($social == "facebook") {
            $this->init_basic();

            $loginUrl = $this->facebook->getLoginUrl(array(
                'redirect_uri' => Configure::read('Host').'social/connect_login_cb/facebook'
                /*'scope' => Configure::read('RB.Engagement.Service.Facebook.AppPermissions')
                'display' => 'popup'*/
            ));
            $this->redirect($loginUrl);
        } else if($social == "twitter") {

        } else if($social == "google") {

        } else {
            throw new NotFoundException("Social media connection failed");
        }

	}

	/**
	 * Handler for incoming Facebook response after login & auth (see login())
	 * Stores logged in user data in session for later reference and persists previously saved
	 *  fulfilment data from the session to the db
	**/
    public function login_cb($social = null) {
        if(!empty($this->request->query['error'])) {
            // login refused or error
            die("Error");
        }

        $this->Auth->login();

        $this->redirect("/");
    }

    /**
     * generate creates an access token for the user when making API requests
    **/
    public function generate() {
        $this->request->onlyAllow('get');

        if(!$this->Auth->loggedIn()) {
            throw new ForbiddenException(__('Forbidden: Not logged in'));
        }

        $time = time();
        $nonce = time() . rand(1000, 9999);

        $salt = substr(md5(uniqid(rand(), true)), 0, 9);
        $access = $salt . sha1($salt . time() . $nonce);


        $this->Session->write('Token.time', $time);
        $this->Session->write('Token.access', $access);

        return $this->Rest->response(200, __('Token'), array('data' => $access));
    }
}
