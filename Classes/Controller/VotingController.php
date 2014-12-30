<?php
namespace Webfox\T3rating\Controller;

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
 *  the Free Software Foundation; either version 3 of the License, or
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
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 *
 *
 * @package t3rating
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class VotingController extends AbstractController {

	/**
	 * votingRepository
	 *
	 * @var \Webfox\T3rating\Domain\Repository\VotingRepository
	 * @inject
	 */
	protected $votingRepository;

	/**
	 * Choice Repository
	 *
	 * @var \Webfox\T3rating\Domain\Repository\ChoiceRepository
	 * @inject
	 */
	protected $choiceRepository;

	/**
	 * Vote Repository
	 *
	 * @var \Webfox\T3rating\Domain\Repository\VoteRepository
	 * @inject
	 */
	protected $voteRepository;

	/**
	 * Redirect Configuration
	 * @var \array 
	 */
	protected $redirectConfiguration;

	/**
	 * Initialize Action
	 */
	public function initializeAction() {
			parent::initializeAction();
		$requestArguments = $this->request->getArguments();
		if(key_exists('redirectConfiguration', $requestArguments)) {
			$this->redirectConfiguration = $requestArguments['redirectConfiguration'];
		}
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$votings = $this->votingRepository->findAll();
		$this->view->assign('votings', $votings);
	}

	/**
	 * action show
	 *
	 * @param \Webfox\T3rating\Domain\Model\Voting $voting
	 * @return void
	 */
	public function showAction(\Webfox\T3rating\Domain\Model\Voting $voting) {
		$this->view->assign('voting', $voting);
	}

	/**
	 * action vote
	 *
	 * @param \Webfox\T3rating\Domain\Model\Voting $voting
	 * @param \Webfox\T3rating\Domain\Model\Choice $choice
	 * @return void
	 */
	public function voteAction(\Webfox\T3rating\Domain\Model\Voting $voting = NULL, \Webfox\T3rating\Domain\Model\Choice $choice = NULL) {
		if ($voting AND $choice) {
			/** @var \Webfox\T3rating\Domain\Model\Vote $vote */
			$vote = GeneralUtility::makeInstance('Webfox\\T3rating\\Domain\\Model\\Vote');
			if ($this->frontendUser) $vote->setUser($this->frontendUser);
			$vote->setVisitorHash($this->visitorHash);
		    $vote->setVoting($voting);
		    $vote->setChoice($choice);
		    $this->voteRepository->add($vote);
		    $this->persistenceManager->persistAll();
			if($this->redirectConfiguration) {
				$this->redirect(
						$this->redirectConfiguration['action'],
						$this->redirectConfiguration['controllerName'],
						$this->redirectConfiguration['extensionName'],
						$this->redirectConfiguration['arguments']
								);
			}
		}
	}
}

?>
