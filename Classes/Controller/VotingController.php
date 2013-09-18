<?php
namespace webfox\T3rating\Controller;

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

/**
 *
 *
 * @package t3rating
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class VotingController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * votingRepository
	 *
	 * @var \webfox\T3rating\Domain\Repository\VotingRepository
	 * @inject
	 */
	protected $votingRepository;

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
	 * @param \webfox\T3rating\Domain\Model\Voting $voting
	 * @return void
	 */
	public function showAction(\webfox\T3rating\Domain\Model\Voting $voting) {
		$this->view->assign('voting', $voting);
	}

	/**
	 * action new
	 *
	 * @param \webfox\T3rating\Domain\Model\Voting $newVoting
	 * @dontvalidate $newVoting
	 * @return void
	 */
	public function newAction(\webfox\T3rating\Domain\Model\Voting $newVoting = NULL) {
		$this->view->assign('newVoting', $newVoting);
	}

	/**
	 * action create
	 *
	 * @param \webfox\T3rating\Domain\Model\Voting $newVoting
	 * @return void
	 */
	public function createAction(\webfox\T3rating\Domain\Model\Voting $newVoting) {
		$this->votingRepository->add($newVoting);
		$this->flashMessageContainer->add('Your new Voting was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param \webfox\T3rating\Domain\Model\Voting $voting
	 * @return void
	 */
	public function editAction(\webfox\T3rating\Domain\Model\Voting $voting) {
		$this->view->assign('voting', $voting);
	}

	/**
	 * action update
	 *
	 * @param \webfox\T3rating\Domain\Model\Voting $voting
	 * @return void
	 */
	public function updateAction(\webfox\T3rating\Domain\Model\Voting $voting) {
		$this->votingRepository->update($voting);
		$this->flashMessageContainer->add('Your Voting was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param \webfox\T3rating\Domain\Model\Voting $voting
	 * @return void
	 */
	public function deleteAction(\webfox\T3rating\Domain\Model\Voting $voting) {
		$this->votingRepository->remove($voting);
		$this->flashMessageContainer->add('Your Voting was removed.');
		$this->redirect('list');
	}

}
?>