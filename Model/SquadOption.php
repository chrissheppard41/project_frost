<?php
App::uses('AppModel', 'Model');
/**
 * SquadOption Model
 *
 * @property Groups $Groups
 * @property SquadUnits $SquadUnits
 */
class SquadOption extends AppModel {

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
		'groups_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'squad_units_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Groups' => array(
			'className' => 'Groups',
			'foreignKey' => 'groups_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'SquadUnits' => array(
			'className' => 'SquadUnits',
			'foreignKey' => 'squad_units_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
