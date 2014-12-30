<?php
namespace Webfox\T3rating\ViewHelpers\User;
use TYPO3\CMS\Core\Utility\GeneralUtility;

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
 * View helper which returns votes of a given frontend user
 *
 * @category    ViewHelpers
 * @package     t3rating
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 * @author      Dirk Wenzel <wenzel@webfox01.de>
 */
class VotesViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * Vote Repository
	 *
	 * @var \Webfox\T3rating\Domain\Repository\VoteRepository
	 * @inject
	 */
	protected $voteRepository;

	/**
	 * Frontend User Repository
	 * 
	 * @var \TYPO3\CMS\Extbase\Domain\Repository\FrontendUserRepository
	 * @inject
	 */
	protected $frontendUserRepository;

	/**
	* Frontend User
	* @var \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
	*/
	protected $frontendUser;
	
	/**
	* Initialize
	* @return void
	*/
	public function initialize() {
	    parent::initialize();
	    $user = $GLOBALS['TSFE']->fe_user->user;
	    if ($user) {
			$this->frontendUser = $this->frontendUserRepository->findByUid($user['uid']);
	    }
	}

	/**
	 * Initialize arguments
	 */
	public function initializeArguments() {
		parent::initializeArguments();
		$this->registerArgument('choice', '\Webfox\T3rating\Domain\Model\Choice', 'A choice, optional. If given only votes of the current frontend user for this choice are returned');
		$this->registerArgument('voting', '\Webfox\T3rating\Domain\Model\Voting', 'A voting, optional. If given only votes of the current frontend user for this voting are returned.');
	}

	/**
	 * Returns votes.
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\Generic\QueryResult
	 */
	public function render() {
		/** @var \Webfox\T3rating\Domain\Model\Voting $voting */
		$voting = $this->arguments['voting'];

		/** @var \Webfox\T3rating\Domain\Model\Choice $choice */
	    $choice = $this->arguments['choice'];

		$voteDemand = GeneralUtility::makeInstance('Webfox\\T3rating\\Domain\\Model\\VoteDemand');

	    if($voting) {
			$voteDemand->setVoting($voting->getUid());
			if($voting->requiresFrontendUser() AND $this->frontendUser) {
				$voteDemand->setUser($this->frontendUser->getUid());
			}
	    }
		if($choice) {
			$voteDemand->setChoice($choice->getUid());
		}
	    $votes = $this->voteRepository->findDemanded($voteDemand);
	    return $votes;
	}

}

?>

