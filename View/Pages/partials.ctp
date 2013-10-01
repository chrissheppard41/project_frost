<?php
	if($this->elementExists($element)) {
		echo $this->element($element);
	} else {
		echo "Internal error 500. No element found.";
	}
?>