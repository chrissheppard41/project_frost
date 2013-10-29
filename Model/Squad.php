<?php
App::uses('AppModel', 'Model');
/**
 * Squad Model
 *
 * @property RaceTypes $RaceTypes
 * @property Types $Types
 */
class Squad extends AppModel {

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
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sarg_count' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'unit_count' => array(
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
		'Races' => array(
			'className' => 'Races',
			'foreignKey' => 'races_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Types' => array(
			'className' => 'Types',
			'foreignKey' => 'types_id',
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
		'Unit' => array(
			'className' => 'Unit',
			'joinTable' => 'squad_units',
			'foreignKey' => 'squads_id',
			'associationForeignKey' => 'units_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'SpecialRule' => array(
			'className' => 'SpecialRule',
			'joinTable' => 'special_squad_rules',
			'foreignKey' => 'squads_id',
			'associationForeignKey' => 'special_rules_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
	);



	public function squad_data($id, $SquadOption, $Option) {

		$squads = $this->find(
			'all',
			array(
				'conditions' => array(
					'Races.id' => $id
				)
			)
		);

		foreach($squads as $k => $squad) {
			$wargear_list = null;
			foreach($squad['Unit'] as $k2 => $unit) {

				$un = Cache::read('_unit_'.$unit['id'], 'units');
				if(!$un) {
					$un = $this->Unit->find(
						'first',
						array(
							'conditions' => array(
								'Unit.id' => $unit['id']
							)
						)
					);
					Cache::write('_unit_'.$unit['id'], $un, 'units');
				}
				$squads[$k]['Unit'][$k2]['unit_type'] = $un['UnitTypes']['name'];
				$squads[$k]['Unit'][$k2]['Wargear'] = $un['Option'];

				foreach($un['Option'] as $we) {
					$wargear_list[] = $we['name'];
				}

				$upd = $SquadOption->find(
					'all',
					array(
						'conditions' => array(
							'SquadUnits.units_id' => $unit['id']
						)
					)
				);
				foreach($upd as $k3 => $upgrade) {
					$squads[$k]['Unit'][$k2]['Upgrade'][$k3]['Groups'] = $upgrade['Groups'];

					$options = Cache::read('_group_'.$upgrade['Groups']['id'], 'options');
					if(!$options) {
						$options = $Option->find(
							'all',
							array(
								'conditions' => array(
									'Groups.id' => $upgrade['Groups']['id']
								),
								'recursive' => 1
							)
						);
						Cache::write('_group_'.$upgrade['Groups']['id'], $options, 'options');
					}

					foreach($options as $k4 => $option) {
						$squads[$k]['Unit'][$k2]['Upgrade'][$k3]['Groups']['Option'][$k4] = $option['Option'];
						$squads[$k]['Unit'][$k2]['Upgrade'][$k3]['Groups']['Option'][$k4]['OptionUpgrades'] = $option['OptionUpgrades'];
					}

					$squads[$k]['Unit'][$k2]['Upgrade'][$k3]['SquadOption'] = $upgrade['SquadOption'];
				}
			}
			$squads[$k]['Unit_wargear'] = array_values(array_unique($wargear_list));
		}

		return $squads;
	}
}
