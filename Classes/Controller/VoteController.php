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

/**
 *
 *
 * @package t3rating
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class VoteController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * voteRepository
	 *
	 * @var \Webfox\T3rating\Domain\Repository\VoteRepository
	 * @inject
	 */
	protected $voteRepository;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$votes = $this->voteRepository->findAll();
		$this->view->assign('votes', $votes);
	}

	/**
	 * action show
	 *
	 * @param \Webfox\T3rating\Domain\Model\Vote $vote
	 * @return void
	 */
	public function showAction(\Webfox\T3rating\Domain\Model\Vote $vote) {
		$this->view->assign('vote', $vote);
	}

	/**
	 * action new
	 *
	 * @param \Webfox\T3rating\Domain\Model\Vote $newVote
	 * @dontvalidate $newVote
	 * @return void
	 */
	public function newAction(\Webfox\T3rating\Domain\Model\Vote $newVote = NULL) {
		$this->view->assign('newVote', $newVote);
	}

	/**
	 * action create
	 *
	 * @param \Webfox\T3rating\Domain\Model\Vote $newVote
	 * @return void
	 */
	public function createAction(\Webfox\T3rating\Domain\Model\Vote $newVote) {
		$this->voteRepository->add($newVote);
		$this->flashMessageContainer->add('Your new Vote was created.');
		$this->redirect('list');
	}

}
?>