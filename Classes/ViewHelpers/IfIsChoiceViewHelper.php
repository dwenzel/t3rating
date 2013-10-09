<?php
namespace Webfox\T3rating\ViewHelpers;
/***************************************************************
*  Copyright notice
*
*  (c) 2013 Dirk Wenzel <wenzel@webfox01.de>, Agentur Webfox
*  Michael Kasten <kasten@webfox01.de>, Agentur Webfox
*  
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * View helper which tells whether a given record or object is a choice of a
 * given voting.
 *
 * @category    ViewHelpers
 * @package     t3rating
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 * @author      Dirk Wenzel <wenzel@webfox01.de>
 */
class IfIsChoiceViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractConditionViewHelper {

	/**
	 * Voting repository
	 *
	 * @var \Webfox\T3rating\Domain\Repository\VotingRepository
	 * @inject
	 */
	protected $votingRepository;

	/**
	 * Initialize arguments
	 */
	public function initializeArguments() {
		parent::initializeArguments();
		$this->registerArgument('tableName', 'string', 'lower case name of the table in database');
		$this->registerArgument('recordUid', 'integer', 'Uid of the record');
		$this->registerArgument('votingUid', 'integer', 'Uid of the voting',
						TRUE);
		$this->registerArgument('object', 'object', 'An extbase object. If this
						argument is given tableName and recordUid are not
						evaluated anymore ');
	}

	/**
	 * Tells whether a given record or object is a choice of given voting.
	 *
	 */
	public function render() {
		if($this->isChoice()) {
			return $this->renderThenChild();
		} else {
			return $this->renderElseChild();
		}
	}

	/**
	 * is choice
	 * @return boolean
	 */
	protected function isChoice() {
		$voting = $this->votingRepository->findByUid($this->arguments['votingUid']);
		$recordString = $this->arguments['tableName'] . '_' . $this->arguments['recordUid'];
		if ($voting) {
			if(is_object($this->arguments['object'])){
				//@todo get class name and uid from object
			} else {
				$recordString = $this->arguments['tableName'] . '_' . $this->arguments['recordUid'];
			}
			$choices = $voting->getChoices();
			foreach($choices as $choice) {
				if ($choice->getRecord() == $recordString) {
					return TRUE;
				}
			}
		}
		return FALSE;
	}
}

?>

