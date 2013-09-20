<?php
App::uses('AppModel', 'Model');
/**
 * OptionUpgrade Model
 *
 * @property Options $Options
 */
class OptionUpgrade extends AppModel {

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
		'options_id' => array(
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
		'Options' => array(
			'className' => 'Options',
			'foreignKey' => 'options_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Enhancements' => array(
			'className' => 'Enhancements',
			'foreignKey' => 'enhancements_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
