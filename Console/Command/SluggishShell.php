<?php
/**
 * Sluggish Shell
 *
 * Set overwrite => true before running this in your $actsAs declaration!
 * This shell allows you to generate unique slugs for a database table ready for use 
 * with the sluggable behavior by Mariano Iglesias
 *
 *
 * Sluggish Shell : Make your table sluggable
 * Copyright 2009, Debuggable, Ltd. (http://debuggable.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2009, Debuggable, Ltd. (http://debuggable.com)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
class SluggishShell extends AppShell {

	public function main() {
    if (empty($this->args)) {
      return $this->out('You need to specify a modelname');
    }

    $model = $this->args[0];
    $force = isset($this->args[1]) ? $this->args[1] : false;

    $Model = ClassRegistry::init($model);
    $behavior = 'Sluggable';

    if (!is_object($Model)) {
      return $this->out('This model does not exist.');
    }

    if (!in_array($behavior, $Model->actsAs) && !array_key_exists($behavior, $Model->actsAs)) {
      return $this->out('The Sluggable Behavior is not yet linked to the model.');
    }

    $label = 'title';
    if (isset($Model->actsAs['Sluggable']['label'])) {
      $label = $Model->actsAs['Sluggable']['label'];
    }

    $Model->recursive = -1;
    $conditions = $force ? false : array('slug' => '');
    $rows = $Model->find('all', compact('conditions'));
    $count = count($rows);

    $i = 0;
    foreach ($rows as $row) {
      $Model->set(array(
        $Model->primaryKey => $row[$model][$Model->primaryKey],
        $label => $row[$model][$label]
      ));
      $Model->save(null, false);

      $row = $Model->find('first', array(
        'conditions' => array(
          $Model->primaryKey => $row[$model][$Model->primaryKey],
          'slug' => ''
        ),
        'contain' => false
      ));
      if (empty($row)) {
        $i++;
      } else {
        $this->out('Problem saving the slug for ' . $row[$model][$label]);
        $this->out($Model->validationErrors);
      }
    }

    $this->out('Added ' . $i . ' slugs for ' . $count . ' ' . Inflector::pluralize($model));
  }
/**
 * undocumented function
 *
 * @return void
 * @access public
 */
  function help() {
    $this->out('Debuggable Ltd. Sluggish Shell - http://debuggable.com');
    $this->hr();
    $this->out('Important: Configure your paths in the shell\'s initialize() function.');
    $this->hr();
    $this->out('This shell allows you to migrate a database table to use Mariano Iglesias\' Sluggable Behavior.');
    $this->out('Add a slug field to the table, download the sluggable behavior, add your $actsAs declaration and run this shell.');
    $this->out('');
    $this->hr();
    $this->out("Usage: cake sluggish ModelNameInCamelCase");
    $this->out('');
  }
}
?>