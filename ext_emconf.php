<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "t3rating".
 *
 * Auto generated 13-01-2015 14:35
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Rating',
	'description' => 'Versatile rating extension. 
Create and manage different votings. Use arbitrary content as voting option.',
	'category' => 'plugin',
	'author' => 'Dirk Wenzel, Michael Kasten',
	'author_email' => 'wenzel@webfox01.de, kasten@webfox01.de',
	'author_company' => 'Agentur Webfox, Agentur Webfox',
	'state' => 'beta',
	'uploadfolder' => '1',
	'createDirs' => '',
	'clearCacheOnLoad' => 0,
	'version' => '0.4.0',
	'constraints' => 
	array (
		'depends' => 
		array (
			'extbase' => '6.0',
			'fluid' => '6.0',
			'typo3' => '6.0',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
	'_md5_values_when_last_written' => 'a:85:{s:9:"ChangeLog";s:4:"6828";s:21:"ExtensionBuilder.json";s:4:"6ce5";s:7:"LICENSE";s:4:"bd01";s:9:"README.md";s:4:"1bb4";s:10:"Readme.rst";s:4:"8f1e";s:12:"ext_icon.gif";s:4:"e922";s:17:"ext_localconf.php";s:4:"12b5";s:14:"ext_tables.php";s:4:"cc73";s:14:"ext_tables.sql";s:4:"27f1";s:24:"ext_typoscript_setup.txt";s:4:"6aab";s:43:"Classes/Command/ChoiceCommandController.php";s:4:"af49";s:41:"Classes/Controller/AbstractController.php";s:4:"1e1b";s:39:"Classes/Controller/ChoiceController.php";s:4:"c054";s:37:"Classes/Controller/VoteController.php";s:4:"8ce3";s:39:"Classes/Controller/VotingController.php";s:4:"789b";s:31:"Classes/Domain/Model/Choice.php";s:4:"3f96";s:29:"Classes/Domain/Model/Vote.php";s:4:"a452";s:35:"Classes/Domain/Model/VoteDemand.php";s:4:"9f1a";s:31:"Classes/Domain/Model/Voting.php";s:4:"7e2b";s:46:"Classes/Domain/Repository/ChoiceRepository.php";s:4:"35eb";s:44:"Classes/Domain/Repository/VoteRepository.php";s:4:"55a1";s:46:"Classes/Domain/Repository/VotingRepository.php";s:4:"d8b0";s:40:"Classes/ViewHelpers/ChoiceViewHelper.php";s:4:"1a04";s:44:"Classes/ViewHelpers/CountVotesViewHelper.php";s:4:"b6f4";s:47:"Classes/ViewHelpers/IfCanUserVoteViewHelper.php";s:4:"9504";s:44:"Classes/ViewHelpers/IfIsChoiceViewHelper.php";s:4:"2996";s:40:"Classes/ViewHelpers/VotingViewHelper.php";s:4:"16dc";s:44:"Classes/ViewHelpers/User/VotesViewHelper.php";s:4:"ad2a";s:44:"Configuration/ExtensionBuilder/settings.yaml";s:4:"b645";s:43:"Configuration/FlexForms/flexform_voting.xml";s:4:"7d73";s:28:"Configuration/TCA/Choice.php";s:4:"e801";s:26:"Configuration/TCA/Vote.php";s:4:"a558";s:28:"Configuration/TCA/Voting.php";s:4:"9c9d";s:38:"Configuration/TypoScript/constants.txt";s:4:"a040";s:34:"Configuration/TypoScript/setup.txt";s:4:"4490";s:37:"Documentation/AdministratorManual.rst";s:4:"4dbb";s:33:"Documentation/DeveloperCorner.rst";s:4:"d094";s:23:"Documentation/Index.rst";s:4:"2b5d";s:36:"Documentation/ProjectInformation.rst";s:4:"8b3e";s:38:"Documentation/RestructuredtextHelp.rst";s:4:"8ea9";s:37:"Documentation/TyposcriptReference.rst";s:4:"dcfc";s:28:"Documentation/UserManual.rst";s:4:"30da";s:37:"Documentation/_IncludedDirectives.rst";s:4:"e589";s:44:"Documentation/Images/IntroductionPackage.png";s:4:"cdeb";s:30:"Documentation/Images/Typo3.png";s:4:"4fac";s:61:"Documentation/Images/AdministratorManual/ExtensionManager.png";s:4:"14fc";s:47:"Documentation/Images/UserManual/BackendView.png";s:4:"ba6c";s:32:"Documentation/_De/UserManual.rst";s:4:"685a";s:51:"Documentation/_De/Images/UserManual/BackendView.png";s:4:"ba6c";s:32:"Documentation/_Fr/UserManual.rst";s:4:"7a39";s:51:"Documentation/_Fr/Images/UserManual/BackendView.png";s:4:"ba6c";s:46:"Resources/Private/Language/de.locallang_db.xlf";s:4:"6688";s:40:"Resources/Private/Language/locallang.xlf";s:4:"cb39";s:76:"Resources/Private/Language/locallang_csh_tx_t3rating_domain_model_choice.xlf";s:4:"a39d";s:74:"Resources/Private/Language/locallang_csh_tx_t3rating_domain_model_vote.xlf";s:4:"8a4d";s:76:"Resources/Private/Language/locallang_csh_tx_t3rating_domain_model_voting.xlf";s:4:"eac2";s:43:"Resources/Private/Language/locallang_db.xlf";s:4:"04db";s:38:"Resources/Private/Layouts/Default.html";s:4:"edf1";s:42:"Resources/Private/Partials/FormErrors.html";s:4:"3800";s:49:"Resources/Private/Partials/Choice/Properties.html";s:4:"e4b4";s:47:"Resources/Private/Partials/Vote/FormFields.html";s:4:"d41d";s:47:"Resources/Private/Partials/Vote/Properties.html";s:4:"1efc";s:49:"Resources/Private/Partials/Voting/FormFields.html";s:4:"13d0";s:49:"Resources/Private/Partials/Voting/Properties.html";s:4:"f50e";s:44:"Resources/Private/Templates/Choice/List.html";s:4:"a1e3";s:44:"Resources/Private/Templates/Choice/Show.html";s:4:"13a8";s:42:"Resources/Private/Templates/Vote/List.html";s:4:"425c";s:41:"Resources/Private/Templates/Vote/New.html";s:4:"da19";s:42:"Resources/Private/Templates/Vote/Show.html";s:4:"4d95";s:44:"Resources/Private/Templates/Voting/Edit.html";s:4:"e62d";s:44:"Resources/Private/Templates/Voting/List.html";s:4:"6a83";s:43:"Resources/Private/Templates/Voting/New.html";s:4:"5574";s:44:"Resources/Private/Templates/Voting/Show.html";s:4:"e27b";s:44:"Resources/Private/Templates/Voting/Vote.html";s:4:"d41d";s:35:"Resources/Public/Icons/relation.gif";s:4:"e615";s:58:"Resources/Public/Icons/tx_t3rating_domain_model_choice.gif";s:4:"905a";s:56:"Resources/Public/Icons/tx_t3rating_domain_model_vote.gif";s:4:"905a";s:58:"Resources/Public/Icons/tx_t3rating_domain_model_voting.gif";s:4:"905a";s:46:"Tests/Unit/Controller/ChoiceControllerTest.php";s:4:"793a";s:44:"Tests/Unit/Controller/VoteControllerTest.php";s:4:"ee87";s:46:"Tests/Unit/Controller/VotingControllerTest.php";s:4:"6be6";s:38:"Tests/Unit/Domain/Model/ChoiceTest.php";s:4:"60be";s:36:"Tests/Unit/Domain/Model/VoteTest.php";s:4:"713f";s:38:"Tests/Unit/Domain/Model/VotingTest.php";s:4:"6752";s:14:"doc/manual.sxw";s:4:"8d2d";}',
);

