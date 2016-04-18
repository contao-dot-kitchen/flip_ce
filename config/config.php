<?php

/**
 * Content elements
 */
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

/**
 * jQuery
 */
$GLOBALS['TL_JQUERY']['flipJS'] = '<script src="system/modules/flip_ce/assets/js/jquery.flip.min.js"></script>
<script>
$(function($) {
  $(".flipCard").flip(); 
});
</script>
';

/**
 * Content wrappers
 **/
$GLOBALS['TL_WRAPPERS']['start'][] = 'flipStart';
$GLOBALS['TL_WRAPPERS']['stop'][]  = 'flipStop';
$GLOBALS['TL_WRAPPERS']['start'][] = 'flipFrontStart';
$GLOBALS['TL_WRAPPERS']['stop'][]  = 'flipFrontStop';
$GLOBALS['TL_WRAPPERS']['start'][] = 'flipBackStart';
$GLOBALS['TL_WRAPPERS']['stop'][]  = 'flipBackStop';

/**
 * Copyright information
 */
$GLOBALS['TL_HEAD']['PIXELSPREADDE'] = '<!--
    This Contao OpenSource CMS uses modules from pixelSpread.de
    Copyright (c)2012 - 2014 by Sascha Brandhoff :: Extensions of pixelSpread.de are copyright of their respective owners
    Visit our website at http://www.pixelSpread.de for more information
//-->';