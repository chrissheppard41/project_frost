<?php
App::uses('BaseAuthenticate', 'Controller/Component/Auth');
App::uses('CakeEvent', 'Event');

/**
 * Use Social Authenticate to connect with Facebook/twitter/google to authenticate user.
 *
 */
class SocialAuthenticate extends BaseAuthenticate{

/**
 * Facebook Settings
 */
    public $settings = array(
        'facebook' => array(
            'scope' => 'email,publish_actions,user_friends',
            'redirect_uri' => null,
            'display' => 'page'
        )
    );

/**
 * handler for the request.
 *
 * @var Controller
 */
    protected $_Handler = null;
/**
 * Controller for the request.
 *
 * @var Controller
 */
    protected $_Controller = null;

/**
 * Facebook SDK
 *
 * @link https://developers.facebook.com/docs/reference/php
 */
    public $Social;

/**
 * Constructor
 *
 * @param ComponentCollection $collection The Component collection used on this request.
 * @param array $settings Array of settings to use.
 */
    public function __construct(ComponentCollection $collection, $settings) {
        parent::__construct($collection, $settings);

        $this->_Controller = $collection->getController();


        if(isset($this->_Controller->request->params['id'])) {
            $this->_Handler = $this->_Controller->request->params['id'];
            extract(Configure::read('Social.'.ucfirst($this->_Handler)));

            if (!isset($AppID) || !isset($AppSecret)) {
                throw new InternalErrorException(__('You need configure file config/SocialMedia.php properly.'));
            }

            switch($this->_Handler) {
                case "facebook":
                    $this->Social = new Facebook(array('appId' => $AppID, 'secret' => $AppSecret));
                break;
                default:
                    throw new InternalErrorException(__('Social media connection can not be made'));
                break;
            }
        }
    }


/**
 * getFacebookUser does a check for the user in the database, if the user doesn't exist add them and return that user, else return that user.
 *
 * @return User data.
 */
    private function getFacebookUser() {
        $uid = $this->Social->getUser();
        if ($uid) {
            $ac = $this->Social->getAccessToken();
            $fbUser = $this->Social->api('/me');

            $model = 'users';
            $appUserModel = ClassRegistry::init($model);
            $data = $appUserModel->find(
                'first',
                array(
                    'conditions' => array(
                        'social' => 'Facebook',
                        'social_id' => $fbUser['id']
                    ),
                    'fields' => array(
                        'id',
                        'social',
                        'social_id',
                        'access_token',
                        'username',
                        'name',
                        'slug',
                        'password_token',
                        'email',
                        'email_verified',
                        'email_token',
                        'email_token_expires',
                        'active',
                        'last_login',
                        'last_action',
                        'is_admin',
                        'role',
                        'lang',
                        'created',
                        'modified'
                    )
                )
            );

            $appUserModel->id = $data[$model]['id'];
            if($data[$model]['access_token'] != $ac) {
                $appUserModel->saveField('social_access_token', $ac);
            }


            $appUserModel->saveField('access_token', '');


            if(empty($data)) {
                $data = array(
                    'users' => array(
                        'social' => 'Facebook',
                        'social_id' => $fbUser['id'],
                        'access_token' => $ac,
                        'name' => $fbUser['name'],
                        'email' => $fbUser['email'],
                        'email_verified' => true,
                        'active' => true,
                        'last_login' => time(),
                        'is_admin' => false,
                        'role' => 'Member',
                        'lang' => $fbUser['locale'],
                    )
                );
                $appUserModel->create();
                $appUserModel->save($data);
                $data['User']['id'] = $appUserModel->getInsertID();
            }

            return $data[$model];
        }
        return false;
    }

/**
 * Authenticate user.
 *
 * @return User data.
 */
    public function authenticate(CakeRequest $request, CakeResponse $response) {
        $user = false;

        switch($this->_Handler) {
            case "facebook":
                try {
                    $user = $this->getFacebookUser();
                } catch (FacebookApiException $e) {
                    CakeLog::write(LOG_ERROR, "Error: ".$e);
                }
            break;
        }

        return $user;
    }

}