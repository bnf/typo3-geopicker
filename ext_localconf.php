<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tce']['formevals'][\BIESIOR\Geopicker\Evaluation\LatEvaluator::class] = '';
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tce']['formevals'][\BIESIOR\Geopicker\Evaluation\LonEvaluator::class] = '';
