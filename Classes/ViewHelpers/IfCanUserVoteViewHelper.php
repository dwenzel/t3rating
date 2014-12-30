<?php
namespace Webfox\T3rating\ViewHelpers;
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
 * View helper which tells whether a given record or object is a choice of a
 * given voting.
 *
 * @category    ViewHelpers
 * @package     t3rating
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 * @author      Dirk Wenzel <wenzel@webfox01.de>
 */

class IfCanUserVoteViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractConditionViewHelper {

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
	 * can user vote
	 * @return boolean
	 */
	protected function canUserVote() {
		$userCanVote = FALSE;
		$choice = $this->arguments['choice'];
		/** @var \Webfox\T3rating\Domain\Model\Voting $voting */
		$voting = $this->votingRepository->findByUid($this->arguments['votingUid']);

		/** @var \Webfox\T3rating\Domain\Model\VoteDemand $totalVotesDemand */
		$totalVotesDemand = GeneralUtility::makeInstance('Webfox\\T3rating\\Domain\\Model\\VoteDemand');
		if($voting AND $choice){
			$maxVotes = $voting->getVotesCount();
			$totalVotesDemand->setVoting($this->arguments['votingUid']);

			if($voting->requiresFrontendUser()) {
				if($this->frontendUser) {
					//find votes of current frontend user
					$totalVotesDemand->setUser($this->frontendUser->getUid());
				}
			} else {
				// find votes of anonymous user by matching its IP address and user agent
				$totalVotesDemand->setVisitorHash(hash('md5', GeneralUtility::getIndpEnv('REMOTE_ADDR') . GeneralUtility::getIndpEnv('HTTP_USER_AGENT')));
			}

			/** @var \Webfox\T3rating\Domain\Model\VoteDemand $votesForChoiceDemand */
			$votesForChoiceDemand = clone($totalVotesDemand);
			$votesForChoiceDemand->setChoice($choice->getUid());

			$usersVotesTotal = count($this->voteRepository->findDemanded($totalVotesDemand)->toArray());
			$usersVotesForChoice = count($this->voteRepository->findDemanded($votesForChoiceDemand)->toArray());

			if(empty($usersVotesForChoice)) {
				// user may vote an unlimited number of times but only once per choice
				if(empty($maxVotes) OR (!empty($maxVotes) AND $usersVotesTotal < $maxVotes)){
					$userCanVote = TRUE;
				}
			}
		}
		return $userCanVote;
	}
}

?>

