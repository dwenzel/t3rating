<?php

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

class Tx_T3rating_ViewHelpers_If_CanUserVoteViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractConditionViewHelper {

	/**
	 * Voting repository
	 *
	 * @var \Webfox\T3rating\Domain\Repository\VotingRepository
	 * @inject
	 */
	protected $votingRepository;
	
	/**
	 * Vote repository
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
		$this->registerArgument('choice', 'Tx_T3rating_Domain_Model_Choice', 'a choice to vote on', TRUE);
		$this->registerArgument('votingUid', 'integer', 'Voting', TRUE);
	}

	/**
	 * Tells whether the current website user can vote for a given choice of a
	 * voting.
	 *
	 */
	public function render() {
		if($this->canUserVote()) {
			return $this->renderThenChild();
		} else {
			return $this->renderElseChild();
		}
	}

	/**
	 * is choice
	 * @return boolean
	 */
	protected function canUserVote() {
		$choice = $this->arguments['choice'];
		$voting = $this->votingRepository->findByUid($this->arguments['votingUid']);
		$demand = new \Webfox\T3rating\Domain\Model\VoteDemand;
		$demand->setUser($this->frontendUser->getUid());
		$demand->setVoting($this->arguments['votingUid']);
		$demand->setChoice($choice->getUid());
		$votes = $this->voteRepository->findDemanded($demand);

		var_dump('votes: ' . $votes->count());
		var_dump(' votes per user: ' . $voting->getVotesCount());

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

