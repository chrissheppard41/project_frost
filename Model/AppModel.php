<?php
App::uses('Model', 'Model');

class AppModel extends Model {

	/**
	 *	Accesses the current datasource and uses its getLog
	 *	function to return the SQL queries executed for the
	 *	current page. Especially useful for AJAX views or
	 *	REST API endpoint debugging.
	 *
	 *	@return array
	 */
	public function getCurrentQueries() {
		return $this->getDatasource()->getLog();
	}

}