<?php

ClassLoader::addNamespaces(array
(
	'Contao'
));

ClassLoader::addClasses(array
(
	'Contao\ContentFlipStart'      => 'system/modules/flip_ce/elements/ContentFlipStart.php',
	'Contao\ContentFlipStop'       => 'system/modules/flip_ce/elements/ContentFlipStop.php',
	'Contao\ContentFrontFlipStart' => 'system/modules/flip_ce/elements/ContentFrontFlipStart.php',
	'Contao\ContentFrontFlipStop'  => 'system/modules/flip_ce/elements/ContentFrontFlipStop.php',
	'Contao\ContentBackFlipStart'  => 'system/modules/flip_ce/elements/ContentBackFlipStart.php',
	'Contao\ContentBackFlipStop'   => 'system/modules/flip_ce/elements/ContentBackFlipStop.php'
));

TemplateLoader::addFiles(array
(
	'ce_flipStart'      => 'system/modules/flip_ce/templates/elements',
	'ce_flipStop'       => 'system/modules/flip_ce/templates/elements',
	'ce_flipFrontStart' => 'system/modules/flip_ce/templates/elements',
	'ce_flipFrontStop'  => 'system/modules/flip_ce/templates/elements',
	'ce_flipBackStart'  => 'system/modules/flip_ce/templates/elements',
	'ce_flipBackStop'   => 'system/modules/flip_ce/templates/elements'
));