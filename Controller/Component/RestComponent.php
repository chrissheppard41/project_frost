<?php
App::uses('Component', 'Controller');

/**
 *
 */
Class RestComponent extends Component {
    public $codes = array(
        200 => 'OK',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Time-out',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Time-out',
    );

    public $Controller;
    public $postData;

    public function initialize (Controller $controller) {
        $this->Controller = $controller;
    }

    public function response($code, $message, $options = array(), $serialize = true) {
        $this->Controller->response->statusCode($code);

        $defaults = array(
            'status' => $this->codes[$code],
            'code' => $code,
            'message' => $message,
            'data' => null,
            'errors' => null
        );

        $response = array_merge($defaults, $options);

        $this->Controller->set('response', $response);

        if ($serialize) {
            $this->Controller->set('_serialize', array('response'));
        }
    }
}