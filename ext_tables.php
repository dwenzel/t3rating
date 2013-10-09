<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Voting',
	'Voting (List, Detail)'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Voting',
	'Voting (Vote)'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Choice',
	'Choices (List, Detail)'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Rating');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_t3rating_domain_model_voting', 'EXT:t3rating/Resources/Private/Language/locallang_csh_tx_t3rating_domain_model_voting.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_t3rating_domain_model_voting');
$TCA['tx_t3rating_domain_model_voting'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:t3rating/Resources/Private/Language/locallang_db.xlf:tx_t3rating_domain_model_voting',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,type,votes_count,description,teaser,image,choices,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Voting.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_t3rating_domain_model_voting.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_t3rating_domain_model_choice', 'EXT:t3rating/Resources/Private/Language/locallang_csh_tx_t3rating_domain_model_choice.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_t3rating_domain_model_choice');
$TCA['tx_t3rating_domain_model_choice'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:t3rating/Resources/Private/Language/locallang_db.xlf:tx_t3rating_domain_model_choice',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,description,hint,collections,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Choice.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_t3rating_domain_model_choice.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_t3rating_domain_model_vote', 'EXT:t3rating/Resources/Private/Language/locallang_csh_tx_t3rating_domain_model_vote.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_t3rating_domain_model_vote');

$TCA['tx_t3rating_domain_model_vote'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:t3rating/Resources/Private/Language/locallang_db.xlf:tx_t3rating_domain_model_vote',
		'label' => 'choice',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'choice,user,voting,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Vote.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_t3rating_domain_model_vote.gif'
	),
);

/*
$tmp_t3rating_columns = array(

	'fe_user' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:t3rating/Resources/Private/Language/locallang_db.xlf:tx_t3rating_domain_model_collection.fe_user',
		'config' => array(
			'type' => 'select',
			'foreign_table' => 'fe_users',
			'minitems' => 0,
			'maxitems' => 1,
		),
	),
);

$tmp_t3rating_columns['choice'] = array(
	'config' => array(
		'type' => 'passthrough',
	)
);

t3lib_extMgm::addTCAcolumns('sys_file_collection',$tmp_t3rating_columns);

$TCA['sys_file_collection']['columns'][$TCA['sys_file_collection']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:t3rating/Resources/Private/Language/locallang_db.xlf:sys_file_collection.tx_extbase_type.Tx_T3rating_Collection','Tx_T3rating_Collection');

$TCA['sys_file_collection']['types']['Tx_T3rating_Collection']['showitem'] = $TCA['sys_file_collection']['types']['1']['showitem'];
$TCA['sys_file_collection']['types']['Tx_T3rating_Collection']['showitem'] .= ',--div--;LLL:EXT:t3rating/Resources/Private/Language/locallang_db.xlf:tx_t3rating_domain_model_collection,';
$TCA['sys_file_collection']['types']['Tx_T3rating_Collection']['showitem'] .= 'fe_user';
*/


## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder
// @FIXME dw 2013-09-20: generated config above fails  with DB type mismatch. 
//$TCA['sys_file_collection']['types']['static']['showitem'] .= ',--div--;LLL:EXT:t3rating/Resources/Private/Language/locallang_db.xlf:tx_t3rating_domain_model_collection,';
//$TCA['sys_file_collection']['types']['static']['showitem'] .= 'fe_user';
?>

