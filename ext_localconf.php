<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Webfox.' . $_EXTKEY,
	'Voting',
	array(
		'Voting' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Vote' => 'create',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Webfox.' . $_EXTKEY,
	'Choice',
	array(
		'Choice' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Voting' => '',
		'Choice' => '',
		'Vote' => 'create',
		
	)
);

?>