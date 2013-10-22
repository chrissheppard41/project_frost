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
            'between' => array(
                'rule'    => array('between', 5, 50),
                'message' => 'Between 5 to 50 characters'
            )
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
        	),
            'between' => array(
                'rule'    => array('between', 3, 11),
                'message' => 'Between 3 to 11 characters'
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


/**
 * _generateCode to saves a submitted army
 *
 * @return hash (string)
 */

    public function _generateCode($id) {
        $salt = substr(md5(uniqid(rand(), true)), 0, 9);
        return $salt . sha1($salt . time() . $id);
    }
}
