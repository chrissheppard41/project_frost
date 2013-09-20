<?php
App::uses('AppModel', 'Model');
/**
 * SquadUnit Model
 *
 * @property Squads $Squads
 * @property Units $Units
 */
class SquadUnit extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Squads' => array(
			'className' => 'Squads',
			'foreignKey' => 'squads_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Units' => array(
			'className' => 'Units',
			'foreignKey' => 'units_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Group' => array(
			'className' => 'Group',
			'joinTable' => 'squad_options',
			'foreignKey' => 'squad_units_id',
			'associationForeignKey' => 'groups_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
}
