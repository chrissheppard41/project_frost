<?php
App::uses('AppModel', 'Model');
/**
 * ArmyList Model
 *
 * @property Races $Races
 * @property Users $Users
 */
class ArmyList extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'army_list';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'races_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'users_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please supply a name'
			),
		),
		'descr' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please supply a description'
			),
		),
		'point_limit' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please supply a point limit'
			),
			'numeric' => array(
				'rule'    => 'numeric',
	        	'message' => 'Please supply the number of points.'
        	)
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Races' => array(
			'className' => 'Races',
			'foreignKey' => 'races_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Users' => array(
			'className' => 'Users',
			'foreignKey' => 'users_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
