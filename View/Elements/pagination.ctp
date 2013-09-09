<?php
	$params = $this->Paginator->params();
	if ($params['pageCount'] > 1):
?>
<div class="pagination">
	<?php echo $this->Paginator->pagination(); ?>
</div>
<?php
		echo $this->Paginator->counter(array('format' => 'Page %page% of %pages%'));
	endif;
?>