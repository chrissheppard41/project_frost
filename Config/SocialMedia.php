<?php
/**
 * s3 App configurations
 *
 * Environment is set in the server vhost configuration
 */
$environment = env('APPLICATION_ENV');

switch ($environment) {
    case 'development':
        Configure::write('Host', 'http://frost.localhost/');
        $app_settings = array(
            'Facebook' => array(
                'AppAccountID'      => '670118976332506',
                'AppAccountName'    => 'Army_tool',
                'AppID'             => '670118976332506',
                'AppSecret'         => '6e4757ef9ecd839ab57af1c6f13c6134',
                'AuthToken'         => '670118976332506|gG4jCN8M-HkzUOJitKJvkpIucoM',
                'redirect_url'      => 'social/connect_login_cb/facebook',
            ),
            'Twitter' => array(
                'AppAccountID'      => '',
                'ConsumerKey'       => '',
                'ConsumerSecret'    => '',
                'AuthToken'         => '',
                'AuthSecret'        => '',
                'redirect_url'      => '',
            ),
            'Google' => array(
                'client_id'         => '',
                'client_secret'     => '',
                'developer_key'     => '',
                'redirect_url'      => ''
            )
        );
        break;
    case 'dev':
        Configure::write('Host', 'http://frost.localhost/');
        $app_settings = array(
            'Facebook' => array(
                'AppAccountID'      => '',
                'AppAccountName'    => '',
                'AppID'             => '',
                'AppSecret'         => '',
                'AuthToken'         => '',
                'redirect_url'      => '',
            ),
            'Twitter' => array(
                'AppAccountID'      => '',
                'ConsumerKey'       => '',
                'ConsumerSecret'    => '',
                'AuthToken'         => '',
                'AuthSecret'        => '',
                'redirect_url'      => '',
            ),
            'Google' => array(
                'client_id'         => '',
                'client_secret'     => '',
                'developer_key'     => '',
                'redirect_url'      => ''
            )
        );
        break;
    case 'staging':
        Configure::write('Host', 'http://frost.localhost/');
        $app_settings = array(
            'Facebook' => array(
                'AppAccountID'      => '',
                'AppAccountName'    => '',
                'AppID'             => '',
                'AppSecret'         => '',
                'AuthToken'         => '',
                'redirect_url'      => '',
            ),
            'Twitter' => array(
                'AppAccountID'      => '',
                'ConsumerKey'       => '',
                'ConsumerSecret'    => '',
                'AuthToken'         => '',
                'AuthSecret'        => '',
                'redirect_url'      => '',
            ),
            'Google' => array(
                'client_id'         => '',
                'client_secret'     => '',
                'developer_key'     => '',
                'redirect_url'      => ''
            )
        );
        break;
    case 'production':
    default:
        Configure::write('Host', 'http://frost.localhost/');
        $app_settings = array(
            'Facebook' => array(
                'AppAccountID'      => '',
                'AppAccountName'    => '',
                'AppID'             => '',
                'AppSecret'         => '',
                'AuthToken'         => '',
                'redirect_url'      => '',
            ),
            'Twitter' => array(
                'AppAccountID'      => '',
                'ConsumerKey'       => '',
                'ConsumerSecret'    => '',
                'AuthToken'         => '',
                'AuthSecret'        => '',
                'redirect_url'      => '',
            ),
            'Google' => array(
                'client_id'         => '',
                'client_secret'     => '',
                'developer_key'     => '',
                'redirect_url'      => ''
            )
        );
        break;
}

Configure::write('Social', $app_settings);