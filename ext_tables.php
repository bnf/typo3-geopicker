<?php
defined('TYPO3_MODE') or die();

// Register GeoPicker wizard
if (TYPO3_MODE === 'BE'){
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'wizard_geopicker',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/Wizards/GeopickerWizard/'
	);
}
