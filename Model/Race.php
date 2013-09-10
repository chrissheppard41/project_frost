<?php
App::uses('AppModel', 'Model');
/**
 * Race Model
 *
 * @property RaceTypes $RaceTypes
 */
class Race extends AppModel {

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
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please supply a name'
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
		'RaceTypes' => array(
			'className' => 'RaceTypes',
			'foreignKey' => 'race_types_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
