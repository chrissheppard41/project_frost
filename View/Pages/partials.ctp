<?php
	if($this->elementExists("partials/".$element)) {
		echo $this->element("partials/".$element);
	} else {
		echo "Internal error 500. No element found.";
	}
?>