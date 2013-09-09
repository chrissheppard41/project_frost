<?php
App::uses('Helper', 'View');

class AppHelper extends Helper {

	/**
	 *	Highlights a menu option based on path. The function compares the supplied path
	 *	to the internal current path using regular expression.
	 *
	 *	@param string $path - The path to attempt to match.
	 *	@param string $normal - The normal class to be returned.
	 *	@param string $selected - The class to use if paths match.
	 *	@return string - Returns the combination of normal and selected classes.
	 */
	public function highlight($path, $normal = '', $selected = 'active') {
		$class = $normal;
		$currentPath = substr($this->request->here, strlen($this->request->base));
		if (preg_match($path, $currentPath)) {
			$class .= ' ' . $selected;
		}
		return $class;
	}

}