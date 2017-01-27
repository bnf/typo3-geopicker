<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$TYPO3_CONF_VARS['SC_OPTIONS']['tce']['formevals']['tx_geopicker_lat_eval'] = 'EXT:geopicker/tce_evals/class.tx_geopicker_lat_eval.php';
$TYPO3_CONF_VARS['SC_OPTIONS']['tce']['formevals']['tx_geopicker_lon_eval'] = 'EXT:geopicker/tce_evals/class.tx_geopicker_lon_eval.php';