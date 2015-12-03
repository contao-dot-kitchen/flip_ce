<?php

array_insert($GLOBALS['TL_CTE'], 3, array
(
	'flip' => array
	(
		'flipStart'      => 'ContentFlipStart',
		'flipStop'       => 'ContentFlipStop',
		'flipFrontStart' => 'ContentFrontFlipStart',
		'flipFrontStop'  => 'ContentFrontFlipStop',
		'flipBackStart'  => 'ContentBackFlipStart',
		'flipBackStop'   => 'ContentBackFlipStop'
	)
));

$GLOBALS['TL_JQUERY']['flipJS'] = '<script src="system/modules/flip_ce/assets/js/jquery.flip.min.js"></script>
<script>
$(function($) {
  $(".flipCard").flip(); 
});
</script>
';

$GLOBALS['TL_WRAPPERS']['start'][] = 'flipStart';
$GLOBALS['TL_WRAPPERS']['stop'][]  = 'flipStop';
$GLOBALS['TL_WRAPPERS']['start'][] = 'flipFrontStart';
$GLOBALS['TL_WRAPPERS']['stop'][]  = 'flipFrontStop';
$GLOBALS['TL_WRAPPERS']['start'][] = 'flipBackStart';
$GLOBALS['TL_WRAPPERS']['stop'][]  = 'flipBackStop';