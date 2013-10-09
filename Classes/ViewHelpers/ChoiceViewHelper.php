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
class ChoiceViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * Voting repository
	 *
	 * @var \Webfox\T3rating\Domain\Repository\ChoiceRepository
	 * @inject
	 */
	protected $choiceRepository;

	/**
	 * Initialize arguments
	 */
	public function initializeArguments() {
		parent::initializeArguments();
		$this->registerArgument('tableName', 'string', 'lower case name of the table in database');
		$this->registerArgument('recordUid', 'integer', 'Uid of the record');
	}

	/**
	 * Returns a choice.
	 *
	 * @return \Webfox\T3rating\Domain\Model\Choice
	 */
	public function render() { 
	    $recordString = $this->arguments['tableName'] . '_' . $this->arguments['recordUid'];
	    return $this->choiceRepository->findOneByRecord($recordString);
	}

}

?>

